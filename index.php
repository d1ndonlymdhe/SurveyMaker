<!DOCTYPE html>
<?php
include("env.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="global.css" rel="stylesheet">
    <style>
    #content {
        height: 95%;
        width: 99%;
        display: grid;
        grid-template-columns: auto auto auto;
    }

    #content>div {
        display: grid;
        align-items: center;
        justify-items: center;
        margin: 5px;
    }

    #yourForms {
        background-color: red;
        height: 100%;
        border-radius: 0.5rem;
    }

    #formDeclare {
        background-color: purple;
        height: 100%;
        width: 100%;
        display: grid;
        align-items: center;
        justify-items: center;
        row-gap: 1rem;
        border-radius: 0.5rem;
        margin: 5px;
    }

    #addField>form {
        display: grid;
        align-items: center;
        justify-items: center;
        row-gap: 1rem;
    }

    #formLinks {
        display: grid;
        grid-template-columns: 100%;
        align-items: center;
        justify-items: center;
        row-gap: 0.5rem;
    }

    #formDemo {
        margin: 5px;
        background-color: green;
        border-radius: 0.5rem;
        align-items: center;
        justify-items: center;
        row-gap: 0.5rem;
    }
    </style>
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
                        <!-- <br> -->
                        <input id="formName">
                    </div>
                    <div id="addField">
                        <form name="addField">
                            <label for="newFieldLabel">Enter Label For New Field</label>
                            <!-- <br> -->
                            <input id="newFieldLabel" name="newFieldDisplayText" type="text">
                            <!-- <br> -->
                            <label for="newFieldName">Enter Name For The Field</label>
                            <!-- <br> -->
                            <input id="newFieldName" id="newFieldName" type="text">
                            <!-- <br> -->
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