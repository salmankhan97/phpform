
<?php
//Enter page title here
$page_title = 'Reset Password';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        echo $email;
        $result = $user->getUsersByEmail($email);

        if(!$result['num'] > 0){
            header('Location: forgotpass.php?email='.$email);
        }else{
            $result = $user->generateTicket($email);
            echo $result;
        }


    }




?>














<?php require_once('snippets/footer.php') ?>