
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
            exit();
        }else{
            $ticket = $user->generateTicket($email);
            $linkstyle = '
            padding: 10px 30px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            text-decoration: none;
            box-shadow: 0 0 20px #292e33;
            border-radius: 6px;
            display: inline-block;
            border: 0px;
            font-weight: 600;
            color: #fff!important;
            background-image: linear-gradient(to right, #FF8008 0%, #FFC837 51%, #FF8008 100%);
            ';
            $msg = '
            <html>
            <body>
            <h3>Hello There!</h5>
            <br><br>
            <a style="'.$linkstyle.'" href="https://websalman.com/phpform/updatepassword.php?ticket='.$ticket.'">Click Here to update your password</a>
            </body>
            </html>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: websalman.com/phpform\r\n"."X-Mailer: php";
            if(mail($email,"Reset Password",$msg, $headers)){
                echo '<h3 class="text-center py-5 text-white">Password reset instructions have been mailed to you</h3>';
            }
        }


    }




?>














<?php require_once('snippets/footer.php') ?>