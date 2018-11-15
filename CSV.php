<?php
/**
 * Created by PhpStorm.
 * User: Snezhana
 * Date: 15/11/18
 * Time: 15:01
 */

class CSV {

    private $csvFilename;

    public function __construct($csvFilename) {

        $this->csvFilename = $csvFilename;
    }

    public function readPropertiesCSV() {

        $dataArray = array();
        if (($handle = fopen($this->csvFilename, "r")) !== FALSE) {
            $count = 0;
            $fieldName = array();
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $count ++;
                if ($count === 1) {
                    $numFields = sizeof($data);
                    for ($i = 0; $i < $numFields; $i++) {
                        $fieldName[$i] = $data[$i];
                    }
                } else if ($count > 1) {
                    for($i = 0; $i < sizeof($fieldName); $i++) {
                        $field = $fieldName[$i];
                        $dataArray[$count][$field] = $data[$i];
                    }

                }
            }
            fclose($handle);
        }

       return $dataArray;
    }


    public function readBankStatementCSV() {

        $dataArray = array();
        if (($handle = fopen($this->csvFilename, "r")) !== FALSE) {
            $count = 0;
            $fieldName = array();
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $count ++;
                if ($count === 10) {
                    $numFields = sizeof($data);
                    for ($i = 0; $i < $numFields; $i++) {
                        $fieldName[$i] = $data[$i];
                    }
                } else if ($count > 11) {
                    for($i = 0; $i < sizeof($fieldName); $i++) {
                        $field = $fieldName[$i];
                        $dataArray[$count][$field] = $data[$i];
                    }

                }
            }
            fclose($handle);
        }

        return $dataArray;
    }
}

