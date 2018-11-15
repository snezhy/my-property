<?php
/**
 * Created by PhpStorm.
 * User: Snezhana
 * Date: 15/11/18
 * Time: 13:44
 */


class Affordability {

    private $recurringIncome;
    private $recurringExpenses;


    public function __construct($recurringIncome, $recurringExpenses) {
        $this->recurringIncome = $recurringIncome;
        $this->recurringExpenses = $recurringExpenses;
    }

    public function getUserMonthlyExcess() {

        return ($this->recurringIncome - $this->recurringExpenses);
    }

    public function calculateAffordability($propertiesList) {

        $affordableProperties = array();
        $userExcess = $this->getUserMonthlyExcess();

        foreach ($propertiesList as $each => $property) {
            if ($userExcess > (floatval($property['Price (pcm)']) * 125/100)) {
                $affordableProperties[] = $property;
            }
        }

        return $affordableProperties;

    }

}



