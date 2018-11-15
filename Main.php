<?php
require('CSV.php');
require('Affordability.php');
require('Utils.php');


$propertyCSV = new CSV("files/properties.csv");
$bankStatementCSV = new CSV("files/bank_statement.csv");

$propertiesArray = $propertyCSV->readPropertiesCSV();;
$bankStatementArray = $bankStatementCSV->readBankStatementCSV();

$monthlyRecurringExpenses = Utils::calculateMonthlyRecurringExpenses($bankStatementArray);
$monthlyRecurringIncome = Utils::calculateMonthlyRecurringIncome($bankStatementArray);

$affordability = new Affordability($monthlyRecurringIncome, $monthlyRecurringExpenses);

$affordableProperties = $affordability->calculateAffordability($propertiesArray);

echo "The customer can afford the following properties:" .PHP_EOL;
foreach ($affordableProperties as $each => $property) {
    echo "Property at address: " . $property['Address'] . ". Price: " . $property['Price (pcm)'] . PHP_EOL;
}



?>