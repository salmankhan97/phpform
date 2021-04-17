<?php
//Enter page title here
$page_title = 'Signup Successful';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';



if(isset($_POST['submit'])){
    //extract values from $_POST array
    $username = $_POST['username'];
    //checking for duplicate usernames
    $result = $user->getUsersByUserName($username);
    
    if($result['num'] > 0){
        header('Location: signup.php?duplicate=1');
    }else{

        $password = $_POST['password'];

        $orig_file = $_FILES['avatar']['tmp_name'];
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        // $destination = $target_dir . basename($_FILES['avatar']['name']);
        $destination = "$target_dir$username.$ext";
        move_uploaded_file($orig_file, $destination);

        //call function to insert and check if success or not
        $isSuccess = $user->insertUser($username, $password, $destination);
        if($isSuccess){ ?>
            <div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto mt-5 text-center bg-dark">
                <h1 class='text-grad'>Successfully Signed Up.</h1>
                <span class="fs-3">Please</span>
                <a class=" fs-3 text-white" href="login.php">Login</a>
            </div>
<?php }}} ?>