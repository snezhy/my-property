# my-property

A command line tool that allows tenants to carry out an affordability check against a list of properties.

## Assumptions

This project assumes that there are two CSV files - properties.csv and bank_statement.csv within the files folder. 
It also assumes that those are valid CSV files.

## How to use

1. Checkout the repository
2. Navigate to the root folder of the project in Terminal
3. Run the following command <br>
   php Main.php

You should see a list of properties that the customer can afford.

## Future improvements

1. Add upload form for uploading the CSVs.
2. Add validation for uploaded files.
3. Modify CSV.php to have one function that reads CSV files independantly from the file structure.
4. Create a new CSV, containing the properties that the customer can afford.
5. Adding unit tests.
