<?php
include("env.php");
$tableName = "form_ids";
//creating connection to the DB
$formName = $_GET['formName'];
$formName = $formName;
//add the newly created for with its name and unique id to the DB
$addNewFormQuery = "INSERT INTO $tableName(form_name) VALUES('$formName')";
$result = $conn -> query($addNewFormQuery);
//fetching the lastID from the table of Ids;
$formIdsTableQuery = "SELECT * FROM form_ids";

$formIdsTable = $conn -> query($formIdsTableQuery);
echo $conn->error;

$lengthOfIds = $formIdsTable -> num_rows;
$lastID = 0;
$lastName = "";
while($result = $formIdsTable -> fetch_assoc()){
	$lastID = $result["iid"];
	$lastName = $result['form_name'];
}
$fields = $_GET['fields'];
$labels = $_GET['labels'];
$newTableName = underCase($lastName."_".$lastID);
$newFormDataTableName = underCase($lastName."_".$lastID."_data");
$createNewTableWithFieldsAndLabelNames = "CREATE TABLE $newTableName(
	SN INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	fields VARCHAR(100) NOT NULL,
	labels VARCHAR(100) NOT NULL)";
$columns = "";
$conn -> query($createNewTableWithFieldsAndLabelNames);
for($i=0;$i<count($fields);$i++){
	$field = underCase($fields[$i]);
	$label = $labels[$i];
	if($i == count($fields)-1){
	$columns = "$columns $field VARCHAR(100) NOT NULL";
	}else{
	$columns = "$columns $field VARCHAR(100) NOT NULL,";
	}	
	$addFieldAndLabelQuery = "INSERT INTO $newTableName(fields,labels) VALUES('$field','$label')";
	$result = $conn -> query($addFieldAndLabelQuery);
}
$newFormDataQuery = "CREATE TABLE $newFormDataTableName(SN INT NOT NULL PRIMARY KEY AUTO_INCREMENT, $columns)";
echo $newFormDataQuery;
$conn -> query($newFormDataQuery);
header("Location: ./renderForm.php?id=$lastID");
exit();
?>