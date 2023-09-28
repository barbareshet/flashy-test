<?php

class JsonTableExporter{
    public function exportTableToNewDatabase($sourceDatabase, $targetDatabaseName, $tableName, $columnsToExport) {
        // Export a certain table with selected columns from the source database
        $tableData = $sourceDatabase->getAll($tableName);
        $exportedData = [];

        foreach ($tableData as $record) {
            $exportedRecord = [];
            foreach ($columnsToExport as $column) {
                if (isset($record[$column])) {
                    $exportedRecord[$column] = $record[$column];
                }
            }
            $exportedData[] = $exportedRecord;
        }

        // Create a new JsonDatabase instance and insert the exported data
        $targetDatabase = new jsonDB($targetDatabaseName);
        $targetDatabase->insert($tableName, $exportedData);

        return $targetDatabase;
    }
}