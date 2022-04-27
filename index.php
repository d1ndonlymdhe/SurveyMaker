<!DOCTYPE html>
<?php
include("env.php");
?>

<head>
    <link href="global.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">

    <title>Home</title>
</head>

<body>
    <div id="root">
        <div id="heading">
            <div>
                <?php echo "$pageName" ?>
            </div>
        </div>
        <div id="content">
            <div id="yourForms">
                <div>All Forms</div>
                <div id="formLinks">
                    <?php
                    $getAllFormsQuery = "SELECT * FROM form_ids";
                    $allForms = $conn->query($getAllFormsQuery);
                    while ($result = $allForms->fetch_assoc()) {
                        $formName = $result['form_name'];
                        $id = $result['iid'];
                        echo "<span>";
                        echo "<a href='renderForm.php?id=$id'><button class='primaryBtn'>$formName</button></a>";
                        echo "</span>";
                    }
                    ?>
                </div>
                <button id="createForm" class='secondaryBtn'>
                    Create Form
                </button>
            </div>
            <div>
                <div id="formDeclare" class="hidden">
                    <div id="getFormName">
                        <label for="formName">Enter Form Name:</label>
                        <input id="formName">
                    </div>
                    <div id="addField">
                        <form name="addField">
                            <label for="newFieldLabel">Enter Label For New Field</label>
                            <input id="newFieldLabel" name="newFieldDisplayText" type="text">
                            <label for="newFieldName">Enter Name For The Field</label>
                            <input id="newFieldName" id="newFieldName" type="text">
                            <div id="submitAndResetButtons">
                                <button type="submit">Add Input</button>
                                <button type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <button id="sendToPhp">Submit</button>
                    </div>
                </div>
            </div>
            <div id="formDemo">
                <div id="title">Form Demo</div>
                <div id="showFormHere">
                    <form id="demoForm" name="demoForm">
                    </form>
                </div>
            </div>
            <style>
            .hidden {
                display: none !important;
            }
            </style>
            <script src="script.js"></script>
</body>

</html>