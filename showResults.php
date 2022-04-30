<!DOCTYPE html>
<?php
include("env.php");
$formId = $_GET['formId'];
$formName = $_GET['formName'];
$fieldsTableName = underCase("$formName" . "_" . "$formId");
$getAllFieldsQuery = "SELECT * FROM $fieldsTableName";
$allFieldsAndLabels = $conn->query($getAllFieldsQuery);
$formDataTableName = $fieldsTableName . "_data";
$getAllDataQuery = "SELECT * FROM $formDataTableName";
$formDataTable = $conn->query($getAllDataQuery);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="global.css">
    <title>
        <?php
        echo "Results of $formName";
        ?>
    </title>
    <style>
    #content {
        height: 100%;
        width: 100%;
        display: grid;
        align-items: center;
        justify-items: center;
        background-color: green;
        margin: 1rem;
        border-radius: 0.5rem;
    }
    </style>
</head>

<body>
    <div id="root">
        <div id="heading">
            <?php
            echo "Results of $formName";
            ?>
        </div>
        <div id="content">

            <?php
            $fields = array();
            while ($result = $allFieldsAndLabels->fetch_assoc()) {
                $fieldName = $result['fields'];
                array_push($fields, $fieldName);
            }
            echo "<table border = '2' height= '75%' width='50%'>";
            echo "<tr>";
            foreach ($fields as $field) {
                echo "<th>$field</th>";
            }
            echo "</tr>";
            while ($formData = $formDataTable->fetch_assoc()) {
                echo "<tr>";
                foreach ($fields as $field) {
                    $data = $formData[$field];
                    echo "<th>$data</th>";
                }
                echo "</tr>";
            }
            echo "</table>"
            ?>
        </div>
    </div>

</body>

</html>