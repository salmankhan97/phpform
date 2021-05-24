
<?php
//Enter page title here
$page_title = 'User Login';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';

// $subjects = $crud->getSubject();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['updatepass'])){ ?>
        <div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto mt-5 text-center bg-dark">
            <h1 class='text-grad'>Password Updated Successfully</h1>
        </div>
    <?php }
}
//submit action

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $username = strtolower(trim($_POST['username']));
    $email = $_POST['email'];
    $password = $_POST['password'];
    $new_password = md5($password.$email);

    $result = $user->getUser($email,$new_password);

    if(!$result){
        echo '<p class="text-danger text-center">Username or Password is incorrect</p>';
    }else{

        $_SESSION['email'] = $email;
        $_SESSION['id'] = $result['id'];
        $_SESSION['avatar'] = $result['avatar'];
        header('Location: datalist.php');
        exit();
    }


}
?>
<!-- Body starts here -->

<div class="container" id="login">
    <div class="row my-3">
        <div class="offset-lg-3 col12 col-lg-6 align-self-center">
            <h1 class="text-center mt-4 text-grad">User Login</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="text-dark">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" required id="floatingEmail" name="email" placeholder="name@example.com">
                    <label for="floatingEmail" aria-describedby="emailHelp">Email address</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control mb-3" required id="floatingpassword" name="password" placeholder="Password">
                  <label for="floatingpassword">Password</label>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Submit" class="text-white btn-grad mb-2">
                </div>
            </form>
            <div class="text-center">
                <a href="signup.php" class=" text-light d-block mb-2">Sign Up</a>
                <button onclick="showForgotpassword()" class="btn text-primary mx-auto text-decoration-underline d-block mb-2">Forgot Password?</button>
            </div>
        </div>
    </div>
</div>

<div class="container d-none" id="forgotpassword">
    <div class="row my-3">
        <div class="offset-lg-3 col12 col-lg-6 align-self-center">
            <h1 class="text-center mt-4 text-grad">Forgot Password</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="reset.php" method="POST" class="text-dark">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" required id="floatingEmail" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>" placeholder="name@example.com">
                    <label for="floatingEmail" aria-describedby="emailHelp">Email address</label>
                    <?php if(isset($_GET['email'])) {?>
                       <h6 class=" text-danger ps-3">*Email not registered</h6>
                    <?php } ?>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Send Code" class="text-white btn-grad mb-2">
                    <button onclick="showLogin()" class="btn text-primary mx-auto text-decoration-underline d-block mb-2">Remembered Password?</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showForgotpassword(){
    let login = document.getElementById('login');
    let forgot = document.getElementById('forgotpassword');

    login.classList.add('d-none');
    forgot.classList.remove('d-none');
}
function showLogin(){
    let login = document.getElementById('login');
    let forgot = document.getElementById('forgotpassword');

    login.classList.remove('d-none');
    forgot.classList.add('d-none');
}
</script>

<!-- Body ends here -->
<?php
//importing footer
require_once 'snippets/footer.php';
?>