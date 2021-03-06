<?php
include("env.php");
$formId = $_GET['id'];
$getFormNameQuery = "SELECT * FROM form_ids WHERE iid = $formId";
$formIdAndName = $conn->query($getFormNameQuery);
$formName = ($formIdAndName->fetch_assoc())['form_name'];
$fieldsTableName = underCase("$formName" . "_" . "$formId");
$getAllFieldsQuery = "SELECT * FROM $fieldsTableName";
$allFieldsAndLabels = $conn->query($getAllFieldsQuery);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        echo $formName;
        ?>
    </title>
    <link href="global.css" rel="stylesheet">
    <link href="renderForm.css" rel="stylesheet">

</head>

<body>
    <div id="root">
        <div id="heading">
            <?php
            echo $formName;
            ?>
        </div>
        <div id="content">
            <div>
                <?php
                echo "<a href = \"showResults.php?formId=$formId&formName=$formName\"> <button class='primaryBtn'>Show Results</button> </a>";
                ?>
            </div>
            <?php
            echo "<form name='$formName' method='GET' action='handleFormData.php'>";
            ?>
            <div id="mainForm">
                <?php
                echo "<input name='formId' class = 'hidden' value='$formId'>";
                echo "<input name='formName' class = 'hidden' value='$formName'>";
                while ($result = $allFieldsAndLabels->fetch_assoc()) {
                    $label = $result['labels'];
                    $field = $result['fields'];
                    echo "<label for='$field'>$label</label>";
                    echo "<input name='$field' id='$field'>";
                }
                echo "<button type='submit' name='submit' >Submit</button>";
                ?>
            </div>
            <?php
            echo "</form>";
            ?>
        </div>
    </div>
    <style type="text/css">
    .hidden {
        display: none;
    }
    </style>
</body>

</html>