<?php
    //Connection to the database

    $host = 'localhost';
    $db = 'ssb_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        echo "lol";
    } catch(PDOException $error){
        throw new PDOException($error->getMessage());
        //echo "<h1 class='text-danger text-center'>Database error</h1>";
    }
?>