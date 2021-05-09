<?php
require_once '../db/conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ticket = $_POST['ticket'];
    $password = $_POST['password'];
    $result = $user->updatePassword($ticket,$password);
    if($result){
        //header('Location: ../login.php?updatepass=1');
    }else{
        echo 'error';
    }
}