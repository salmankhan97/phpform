<?php
//Enter page title here
$page_title = 'Signup Successful';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';



if(isset($_POST['submit'])){
    //extract values from $_POST array
    $email = $_POST['email'];
    //checking for duplicate email
    $result = $user->getUsersByEmail($email);
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    
    if($result['num'] > 0){
        header('Location: signup.php?email='.$email.'&error=duplicate');
        exit();

    }else if($password !== $repassword){
        header('Location: signup.php?email='.$email.'&error=mispassword');
        exit();
    }else if(file_exists($_FILES['avatar']['tmp_name'])){
        $orig_file = $_FILES['avatar']['tmp_name'];
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $allowed_ext = array(
            'png',
            'jpg',
            'jpeg',
            'webp',
            'gif'
        );
        //checking if file extensions match
        if(!in_array($ext, $allowed_ext)){
            header('Location: signup.php?email='.$email.'&error=exterror');
            exit();
        }else if($_FILES['avatar']['size'] > 2000000){
            header('Location: signup.php?email='.$email.'&error=sizeerror');
            exit();
        }
    }
    $target_dir = 'uploads/';
    // $destination = $target_dir . basename($_FILES['avatar']['name']);
    $destination = "$target_dir$email.$ext";
    move_uploaded_file($orig_file, $destination);
    //call function to insert and check if success or not
    $isSuccess = $user->insertUser($email, $password, $destination);
    if($isSuccess){ ?>
        <div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto mt-5 text-center bg-dark">
            <h1 class='text-grad'>Successfully Signed Up.</h1>
            <span class="fs-3">Please</span>
            <a class=" fs-3 text-white" href="login.php">Login</a>
        </div>
    <?php }
}