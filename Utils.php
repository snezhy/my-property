<?php
/**
 * Created by PhpStorm.
 * User: Snezhana
 * Date: 15/11/18
 * Time: 17:12
 */

class Utils {

    public static function bankStatementByMonthArrays($bankStatementArray) {

        $monthlyStatementArray = array();

        foreach ($bankStatementArray as $key => $value) {
            $month = date('F',strtotime($value['Date']));
            $monthlyStatementArray[$month][$key] = $value;
        }

        return $monthlyStatementArray;

    }

    public static function convertCurrencyToFloat($currency) {

    /**
     CSV adds random char before the price. Therefore, we substring by 2 -
     one for the £sound and one for the strange char */

        $floatString = substr((str_replace(',', '', $currency)), 2);
        return floatval($floatString);

    }

    public static function calculateMonthlyRecurringExpenses($bankStatementArray) {

        $monthlyStatementArray = self::bankStatementByMonthArrays($bankStatementArray);

        $monthlyRecurringExpenses = 0;
        foreach ($monthlyStatementArray as $month => $details) {
            foreach ($details as $each => $detail) {
                if (($detail['Payment Type'] === "Direct Debit") || ($detail['Payment Type'] === "Standing Order")) {
                    $expense = self::convertCurrencyToFloat($detail['Money Out']);
                    $monthlyRecurringExpenses += $expense;
                }
            }
            return $monthlyRecurringExpenses;

        }
    }

    public static function calculateMonthlyRecurringIncome($bankStatementArray) {

        $monthlyStatementArray = self::bankStatementByMonthArrays($bankStatementArray);

        $monthlyRecurringIncome = 0;
        foreach ($monthlyStatementArray as $month => $details) {
            foreach ($details as $each => $detail) {
                if ($detail['Money In'] !== "") {
                    $income = self::convertCurrencyToFloat($detail['Money In']);
                    $monthlyRecurringIncome += $income;
                }
            }

            return $monthlyRecurringIncome;

        }
    }


}