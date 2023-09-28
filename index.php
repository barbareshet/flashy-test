<?php
require_once ('jsonDB.php');
require_once ('JsonTableExporter.php');
// Usage:
$databaseName = "users_json_database";
$database = new jsonDB($databaseName);

// Insert a record into the "users" table
$userDataArr = [
    [

        "username" => "john_smith",
        "first_name" => "John",
    ],
    [

        "username" => "john_smith",
        "first_name" => "John",
    ],
    [

        "username" => "john_smith",
        "first_name" => "John",
    ],
    [

        "username" => "john_smith",
        "first_name" => "John",
    ],
    [

        "username" => "john_smith",
        "first_name" => "John",
    ]
];


/**
 * Insert Multiple Users to database
 */
//foreach ( $userDataArr as $key => $user ){
//    $user['Id'] = $key;
//
//    $database->insert("users", $user);
//}

/**
 * Insert single user to database
 */
//$database->insert("users", $userData);

/**
 * Retrieve all records from the "users" table
 */
//$users = $database->getAll("users");


/**
 * get single user by username
 */
//$usersByName = $database->getByName("users", "first_name", "Jane");

/**
 * update user
 */
// $criteria = ["Id" => 1];
// $updatedData = ["first_name" => "Updated Ido"];
// $database->update("users", $criteria, $updatedData);

/**
 * Retrieve the updated user data
 */
//$updatedUsers = $database->getAll("users");


/**
 * Add or update custom parameters for a specific user
 */
//$criteria = ["Id" => 1];
//$paramName = "email";
//$paramValue = "john@example.com";
//$database->addOrUpdateParameter("users", $criteria, $paramName, $paramValue);

/**
 * Retrieve the updated user data
 */
//$updatedUsers = $database->getAll("users");


/**
 * Create a JsonTableExporter instance
 */
//$exporter = new JsonTableExporter($database);

 /**
  * Export the "users" table with selected columns
  */
//$columnsToExport = ["Id", "email"];
//$exportedUsers = $exporter->exportTable("users", $columnsToExport);




// Export the "users" table with selected columns to a new database
//$targetDatabaseName = "my_emails_json_database";
//$exportedDatabase = $exporter->exportTableToNewDatabase($database, $targetDatabaseName, "users", ["Id", "email"]);










