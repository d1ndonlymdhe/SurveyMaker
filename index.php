<!DOCTYPE html>
<?php
    include("env.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "global.css" rel = "stylesheet">
    <style>
        
        #content{
            height: 95%;
            width: 99%;
            display: grid;
            grid-template-columns: auto auto auto;
        }
        #content > div{
            display: grid;
            align-items: center;
            justify-items: center;
        }
        #formDeclare{

        }
    </style>
    <title>Home</title>
</head>
<body>
    <div id="root">
        <div id="heading">
            <div>
            <?php echo "$pageName"?>
            </div>
            </div>
        <div id="content">
            <div id="yourForms">
                <div>All Forms</div>
                <div>
                <?php
                   $getAllFormsQuery = "SELECT * FROM form_ids";
                   $allForms = $conn -> query($getAllFormsQuery);
                   while($result = $allForms -> fetch_assoc()){
                    $formName = $result['form_name'];
                    $id = $result['iid'];
                    echo "<a href='renderForm.php?id=$id'><button class='primaryBtn'>$formName</button></a>";
                   } 
                ?>
                </div>
                <button id="createForm" class='secondaryBtn'>
                Create Form
                </button>
            </div>
            <div>
                <div id="formDeclare" class="hidden">
                    <label for="formName">Enter Form Name:</label>
                    <br>
                    <input id="formName">
                    <div id="addField"> 
                        <form name="addField">
                            <label for="newFieldLabel">Enter Label For New Field</label>
                            <br>
                            <input id ="newFieldLabel" name="newFieldDisplayText" type="text">
                            <br>
                            <label for="newFieldName">Enter Name For The Field</label>
                            <br>
                            <input id = "newFieldName" id="newFieldName" type="text">  
                            <br>                      
                            <button type="submit">Add Input</button>
                            <button type="reset">Reset</button>
                    </form>
                    <button id = "sendToPhp">Submit</button>
                <div>
            </div>
            
        </div>

    </div>
</div>
    <div id="formDemo">
                <div id="title">Form Demo</div>
                <div id="showFormHere">
                    <form id = "demoForm" name="demoForm">
                        
                    </form>
                </div>
            </div>
    <style>
        .hidden{
            display: none!important;
        }
    </style>
    <script src = "script.js"></script>
</body>
</html>