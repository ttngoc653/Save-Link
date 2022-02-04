<?php
require 'include.php';

/**
 * 
 */
class GeneralQuery
{
	function CreateTable($tableName, $queryCreateTable)
	{
		try {
			$connection = (new Database())->connect();

			$connection->exec($queryCreateTable);
		} catch (Exception $e) {

		}
	}
}
?>