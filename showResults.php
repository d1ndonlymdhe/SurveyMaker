<!DOCTYPE html>
<?php
	include("env.php");
	$formId = $_GET['formId'];
	// $formId = substr($formId, 1, strlen($formId)-2);
	$formName = $_GET['formName'];
	// $formName = substr($formName, 1, strlen($formName)-2);
	$fieldsTableName = underCase("$formName"."_"."$formId");
	$getAllFieldsQuery = "SELECT * FROM $fieldsTableName";
	$allFieldsAndLabels = $conn -> query($getAllFieldsQuery);
	$formDataTableName = $fieldsTableName."_data";
	$getAllDataQuery = "SELECT * FROM $formDataTableName";
	$formDataTable = $conn -> query($getAllDataQuery);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Results</title>
</head>
<body>
	<?php
	$fields = array();
	echo "<br>";
	while($result = $allFieldsAndLabels-> fetch_assoc()){
		$fieldName = $result['fields'];
		array_push($fields, $fieldName);
	}
	echo "<table border = '1'>";
	echo "<tr>";
	foreach($fields as $field){
		echo "<th>$field</th>";
	}
	echo "</tr>";
	while($formData = $formDataTable -> fetch_assoc()){
		echo "<tr>";
		foreach($fields as $field){
		$data = $formData[$field];
		echo "<th>$data</th>";
		}	
		echo "</tr>";
	}
	echo "</table>"
	?>

</body>
</html>