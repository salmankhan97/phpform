
<?php
//Enter page title here
$page_title = 'Sign Up';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';

?>
<!-- Body starts here -->

<?php if(isset($_GET['error']) && $_GET['error'] == 'mispassword'){ ?>
        <div class="container">
            <div class="row my-3">
                <div class="offset-lg-3 col12 col-lg-6 align-self-center">
                    <h6 class="text-center mt-4 text-danger">Passwords Mismatch. Please try again.</h6>
                </div>
            </div>
        </div>
<?php } ?>
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
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" required value="<?php if(isset($_GET['email']))echo $_GET['email']; ?>" id="floatingEmail" name="email" placeholder="name@example.com">
                    <label for="floatingEmail" aria-describedby="emailHelp">Email address</label>
                    <?php if(isset($_GET['error']) && $_GET['error'] == 'duplicate') {?>
                       <h6 class=" text-danger ps-3">*Invalid Email</h6>
                    <?php } ?>
                </div>
                <div class="form-floating mt-3">
                  <input type="password" class="form-control mb-3" required id="floatingpassword" name="password" placeholder="Password">
                  <label for="floatingpassword">Password</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control mb-3" onkeyup="checkPass(this)" required id="retypepassword" name="repassword" placeholder="Password">
                  <label for="retypepassword">Re-type Password</label>
                </div>
                <p class="mb-3 text-center fw-bolder" id="message"></p>
                <div class="form-group text-center">
                  <label class="text-white  mb-1" for="avatar">Choose Avatar</label>
                  <input type="file" accept="image/*" onchange="fileSizeValid()" class="form-control form-control mb-1" id="avatar" name="avatar">
                  <h6 id="avatarerror" class="text-white mb-3">File size (<span id="showfsize">0</span>KB/2048KB)</h6>
                  
                  <?php
                    //error print
                    if(isset($_GET['error']) && $_GET['error'] == 'exterror'){ ?>
                        <h6 class="text-danger mb-3">Allowed File extensions: png jpg jpeg webp gif</h6>
                    <?php }
                    else if(isset($_GET['error']) && $_GET['error'] == 'sizeerror'){ ?>
                        <h6 class="text-danger mb-3">File size is too big. Please select a photo less than 2 MegaBytes</h6>
                    <?php } ?>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" id="signupbtn" value="Sign Up" class="text-white btn-grad mb-3">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function fileSizeValid(){
        const fi = document.getElementById('avatar');
        const errmsg = document.getElementById('avatarerror');
        const sbtn = document.getElementById('signupbtn');
        const showsize = document.getElementById('showfsize');
        if(fi.files.length>0){
            const fsize = fi.files[0].size;
            const file = Math.round((fsize/1024));
            showsize.innerHTML = file;
            if(file>2048){
                errmsg.classList.remove('text-white');
                errmsg.classList.remove('text-success');
                errmsg.classList.add('text-danger');
                //errmsg.innerHTML = 'File size is too big. Please select a photo less than 2 MegaBytes';
                sbtn.disabled = true;
            }else{
                errmsg.classList.remove('text-white');
                errmsg.classList.remove('text-danger');
                errmsg.classList.add('text-success');
                //errmsg.innerHTML = '';
                sbtn.disabled = false;
            }
        }
    }
</script>
<script>
function checkPass(a){
    let passwordField = document.getElementById('floatingpassword');
    let repasswordField = document.getElementById('retypepassword');
    let password = document.getElementById('floatingpassword').value;
    let repassword = document.getElementById('retypepassword').value;
    let bt = document.getElementById('signupbtn');
    let msg = document.getElementById('message');
    if(password == repassword){
        bt.disabled = false;
        msg.innerHTML = 'Passwords Matched';
        msg.classList.remove('text-danger');
        msg.classList.add('text-success');
        passwordField.classList.remove('border-danger');
        repasswordField.classList.remove('border-danger');
    } else{
        bt.disabled = true;
        msg.innerHTML = 'Passwords Mismatched';
        msg.classList.remove('text-success');
        msg.classList.add('text-danger');
        passwordField.classList.add('border-danger');
        repasswordField.classList.add('border-danger');
    }
}

</script>








<!-- Body ends here -->
<?php
//importing footer
require_once 'snippets/footer.php';
?>