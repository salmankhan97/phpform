
<?php
//Enter page title here
$page_title = 'Sign Up';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';

?>
<!-- Body starts here -->

<div class="container">
    <div class="row my-3">
        <div class="offset-lg-3 col12 col-lg-6 align-self-center">
            <h1 class="text-center mt-4 text-grad">Sign Up form</h1>
            <h3 class="text-center my-4">Please fill out the form below</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="success.php" method="POST" class="text-dark" enctype="multipart/form-data">
                <div class="form-floating">
                  <input type="text" class="form-control" required id="floatingusername" name="username" placeholder="Username">
                  <label for="floatingusername">Username</label>

                <?php if(isset($_GET['duplicate'])) {?>
                   <h6 class=" text-danger ps-3">*Username already exists</h6>
                <?php } ?>

                </div>
                <div class="form-floating mt-3">
                  <input type="password" class="form-control mb-3" required id="floatingpassword" name="password" placeholder="Password">
                  <label for="floatingpassword">Password</label>
                </div>
                <div class="form-group text-center">
                  <label class="text-white  mb-1" for="avatar">Choose Avatar</label>
                  <input type="file" accept="image/*"  class="form-control form-control mb-3" id="avatar" name="avatar">
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Sign Up" class="text-white btn-grad mb-3">
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