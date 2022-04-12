<?php
	include("env.php");
	$whatToExpect = array();
	$recievedData = array();
	$formId = $_GET['formId'];
	$formName = $_GET['formName'];
	$fieldsTableName = underCase($formName."_".$formId);
	$formDataTableName = ($fieldsTableName."_data");
	$getFieldsTableQuery = "SELECT * FROM $fieldsTableName";
	$fieldsTable = $conn -> query($getFieldsTableQuery);
	$fields = "";
	$values = "";
	while($result = $fieldsTable-> fetch_assoc()){
		$fieldName = $result['fields'];
		$fieldData = $_GET[$fieldName];
		$fields = "$fields $fieldName,";
		$values = "$values '$fieldData',";
	}
	$fields = substr($fields, 1,strlen($fields)-2);
	$values = substr($values, 1,strlen($values)-2);
	var_dump($fields);
	var_dump($values);
	$insertDataQuery = "INSERT INTO $formDataTableName($fields) VALUES ($values)";
	var_dump($insertDataQuery);
	$conn -> query($insertDataQuery);
	header("Location: ./index.php")
?>