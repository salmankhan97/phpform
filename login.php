
<?php
//Enter page title here
$page_title = 'User Login';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';

// $subjects = $crud->getSubject();

//submit action

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

    $result = $user->getUser($username,$new_password);

    if(!$result){
        echo '<p class="text-danger text-center">Username or Password is incorrect</p>';
    }else{

        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result['id'];
        $_SESSION['avatar'] = $result['avatar'];
        
        header("Location: datalist.php");
    }


}
?>
<!-- Body starts here -->

<div class="container">
    <div class="row my-3">
        <div class="offset-lg-3 col12 col-lg-6 align-self-center">
            <h1 class="text-center mt-4 text-grad">User Login</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="text-dark">
                <div class="form-floating">
                  <input type="text" class="form-control mb-3" required id="floatingusername" name="username" placeholder="Username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                  <label for="floatingusername">Username</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control mb-3" required id="floatingpassword" name="password" placeholder="Password">
                  <label for="floatingpassword">Password</label>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Submit" class="text-white btn-grad mb-2">
                    <a href="signup.php" class=" text-light d-block">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Body ends here -->
<?php
//importing footer
require_once 'snippets/footer.php';
?>