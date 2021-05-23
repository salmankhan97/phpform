
<?php
//Enter page title here
$page_title = 'Update Password';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';

// $subjects = $crud->getSubject();

//Check ticket
if(!isset($_GET['ticket']) || empty($_GET['ticket'])){
    header('location: login.php');
}
else{
    $ticket = $_GET['ticket'];
    $result = $user->checkTicket($ticket);
}

?>
<!-- Body starts here -->



<?php if(!$result){ ?>
<div class="container">
    <div class="row my-3">
        <div class="offset-lg-3 col12 col-lg-6 align-self-center">
            <h1 class="text-center mt-4 text-danger">Ticket Expired. Please try again later</h1>
        </div>
    </div>
</div>
<?php } else if($result){ 
    if($_GET['mispassword'] == 1){ ?>
        <div class="container">
            <div class="row my-3">
                <div class="offset-lg-3 col12 col-lg-6 align-self-center">
                    <h1 class="text-center mt-4 text-danger">Passwords Mismatch. Please try again.</h1>
                </div>
            </div>
        </div>
    <?php }?>

<div class="container">
    <div class="row my-3">
        <div class="offset-lg-3 col12 col-lg-6 align-self-center">
            <h1 class="text-center mt-4 text-grad">Update Password</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="operations/resetsuccess.php" method="POST" class="text-dark">
                <input type="hidden" name="ticket" value="<?php echo $_GET['ticket'] ?>">
                <div class="form-floating">
                  <input type="password" class="form-control mb-3" required id="floatingpassword" name="password" placeholder="Password">
                  <label for="floatingpassword">Password</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control mb-3" onkeyup="checkPass(this)" required id="retypepassword" name="repassword" placeholder="Password">
                  <label for="retypepassword">Re-type Password</label>
                </div>
                <p class="mb-3 text-center fw-bolder" id="message"></p>
                <div class="text-center">
                    <input type="submit" name="submit" disabled id="submit" value="Submit" class="text-white btn-grad mb-2" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<script>
function checkPass(a){
    let password = document.getElementById('floatingpassword').value;
    let repassword = document.getElementById('retypepassword').value;
    let bt = document.getElementById('submit');
    let msg = document.getElementById('message');

    if(password == repassword){
        bt.disabled = false;
        msg.innerHTML = 'Passwords Matched';
        msg.classList.remove('text-danger');
        msg.classList.add('text-success');
    } else{
        bt.disabled = true;
        msg.innerHTML = 'Passwords Mismatched';
        msg.classList.remove('text-success');
        msg.classList.add('text-danger');
    }
}

</script>
<!-- Body ends here -->
<?php
//importing footer
require_once 'snippets/footer.php';
?>