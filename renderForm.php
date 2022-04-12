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
    <style>
    #content {
        height: 95%;
        width: 99%;
        display: grid;
        grid-template-rows: 10% 90%;
        background-color: green;
        margin: 5px;
        border-radius: 0.5rem;
    }

    #content>div {
        display: grid;
        align-items: center;
        justify-items: center;
        margin: 5px;
    }

    #mainForm {
        display: grid;
        align-items: center;
        justify-items: center;
        margin: 5px;
        row-gap: 1rem;
    }
    </style>
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
					// echo "<br>";
					echo "<label for='$field'>$label</label>";
					// echo "<br>";
					echo "<input name='$field' id='$field'>";
					// echo "<br>";
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