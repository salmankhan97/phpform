
<?php
//Enter page title here
$page_title = 'Forgot Password';

//importing header
require_once 'snippets/header.php';

?>
<div class="container">
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
                    <a href="login.php" class=" text-primary text-decoration-underline d-block mb-2">Remembered Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>












<?php require_once('snippets/footer.php') ?>