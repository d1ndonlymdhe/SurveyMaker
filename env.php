<?php
    $pageName = "Form Maker";
    $dbName = "surveyMaker";
    $username = "root";
    $password = "";
    $hostname = "localhost";
    $conn = new mysqli($hostname,$username,$password,$dbName);
    function underCase($string){
        $string = str_replace(" ","_",$string);
    $string = str_replace("/", "_", $string);
    $string = str_replace("?", "_", $string);
        return $string;
}