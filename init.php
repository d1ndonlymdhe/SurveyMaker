<?php
$username = "root";
$password = "";
$hostName = "localhost";
$adminConn = new mysqli($hostName, $username, $password);
$query = "CREATE Database surveyMaker";
$adminConn->query($query);
$conn = new mysqli($hostName, $username, $password, "surveymaker");
$query = "CREATE TABLE form_ids ( form_name TEXT(255) NOT NULL , id INT(11) NOT NULL , PRIMARY KEY (id))";
$conn->query($query);
header("Location: ./index.php");