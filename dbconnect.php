<?php

    $servname = "localhost";
    $dbname = "pizzeria";
    $user = "root";
    $pass = "";

    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    