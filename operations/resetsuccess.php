<?php
require_once '../db/conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ticket = $_POST['ticket'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if($password !== $repassword){
        header('Location: ../updatepassword.php?ticket='.$ticket.'&mispassword=1');
    }else{
        $result = $user->updatePassword($ticket,$password);
        if($result){
            header('Location: ../login.php?updatepass=1');
        }else{
            echo 'error';
        }
    }
}