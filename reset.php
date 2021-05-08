
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
            $ticket = $user->generateTicket($email);
            $msg = '
            <html>
            <h4 style="text-align:center">Hello There!</h4>
            <a href="https://webdevsk-test-phpform.herokuapp.com/updatepassword.php?ticket='.echo $ticket.'">Click here</a>
            </html>';
            mail("webdevz.sk@gmail.com","Reset Password",$msg);
        }


    }




?>














<?php require_once('snippets/footer.php') ?>