<?php
    //Connection to the database

    $host = 'remotemysql.com';
    $db = '1Vlo3X8QkC';
    $user = '1Vlo3X8QkC';
    $pass = 'HiUkQaHIZd';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $error){
        throw new PDOException($error->getMessage());
        //echo "<h1 class='text-danger text-center'>Database error</h1>";
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>