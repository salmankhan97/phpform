
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
        $result = $user->getUsersByEmail($email);

        if(!$result['num'] > 0){
            header('Location: forgotpass.php?email='.$email);
        }else{
            $ticket = $user->generateTicket($email);
            $msg = '
            <html>
            <body>
            <h4 style="text-align:center">Hello There!</h4>
            <a href="https://webdevsk-test-phpform.herokuapp.com/updatepassword.php?ticket='.$ticket.'">Click here</a>
            </body>
            </html>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: websalman.com/phpform\r\n"."X-Mailer: php";
            if(mail("webdevz.sk@gmail.com","Reset Password",$msg, $headers)){
                echo "Password reset instructions have been mailed to you";
            }
        }


    }




?>














<?php require_once('snippets/footer.php') ?>