<?php

    $hostname = 'localhost';

    $username = 'root';

    $password = '';

    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=db_atomic_project", $username, $password);

    }
    catch(PDOException $e) {

        echo $e->getMessage();
    }

?>