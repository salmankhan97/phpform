<?php
    //Connection to the database

    $host = 'sql111.epizy.com';
    $db = 'epiz_28357306_phpform';
    $user = 'epiz_28357306';
    $pass = 'bDT6rk2AlkA';
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