<?php
    $user = 'root';
    $password = 'krasniqi01';
    $dbname = 'mailer_template';
    $host = 'localhost';

    $connection = new mysqli($host, $user, $password);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    if(!$connection->select_db($dbname)){
        die('Error: Can not connect to database.');
    }
