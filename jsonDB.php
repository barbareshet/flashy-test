<?php

class jsonDB{
    private $data = []; // Store the database data
    private $databaseName;
    public function __construct($databaseName) {

        $this->databaseName = $databaseName;
        $this->loadDataFromFile();
    }

    private function loadDataFromFile() {
        // Check if the JSON file exists
        if (file_exists("$this->databaseName.json")) {
            $this->data = json_decode(file_get_contents("$this->databaseName.json"), true);
        } else {
            // If the file doesn't exist, create it with an empty array
            $this->data = [];
            $this->saveDataToFile();
        }
    }
    public function getAll($tableName) {
        // Retrieve all records from a table
        if (isset($this->data[$tableName])) {
            return $this->data[$tableName];
        } else {
            return [];
        }
    }

    public function getByName($tableName, $fieldName, $value) {
        // Retrieve records from a table by field name and value
        if (isset($this->data[$tableName])) {
            $filteredRecords = [];
            foreach ($this->data[$tableName] as $record) {
                if (isset($record[$fieldName]) && $record[$fieldName] === $value) {
                    $filteredRecords[] = $record;
                }
            }
            return $filteredRecords;
        } else {
            return [];
        }
    }

    public function update($tableName, $criteria, $updatedData) {
        // Update records in a table based on a set of criteria
        if (isset($this->data[$tableName])) {
            foreach ($this->data[$tableName] as &$record) {
                $match = true;
                foreach ($criteria as $field => $value) {
                    if (!isset($record[$field]) || $record[$field] !== $value) {
                        $match = false;
                        break;
                    }
                }
                if ($match) {
                    // Update the matching record with new data
                    $record = array_merge($record, $updatedData);
                }
            }
            $this->saveDataToFile();
        }
    }
    public function addOrUpdateParameter($tableName, $criteria, $paramName, $paramValue) {
        // Add or update a custom parameter for a specific user
        if (isset($this->data[$tableName])) {
            foreach ($this->data[$tableName] as &$record) {
                $match = true;
                foreach ($criteria as $field => $value) {
                    if (!isset($record[$field]) || $record[$field] !== $value) {
                        $match = false;
                        break;
                    }
                }
                if ($match) {
                    // Add or update the custom parameter for the matching user
                    $record[$paramName] = $paramValue;
                }
            }
            $this->saveDataToFile();
        }
    }
    public function insert($tableName, $record) {
        // Insert a new record into the table
        if (!isset($this->data[$tableName])) {
            $this->data[$tableName] = [];
        }
        $this->data[$tableName][] = $record;
        $this->saveDataToFile();
    }

    private function saveDataToFile() {
        // Save the data to a JSON file
        file_put_contents("$this->databaseName.json", json_encode($this->data, JSON_PRETTY_PRINT));
    }
}


