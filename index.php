
<?php
//Enter page title here
$page_title = 'Welcome';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';

$subjects = $crud->getSubject();
?>
<!-- Body starts here -->

<div class="container">
    <div class="row my-3">
        <div class="offset-lg-3 col12 col-lg-6 align-self-center">
            <h1 class="text-center mt-4 text-grad">Welcome</h1>
            <h3 class="text-center my-4">Please fill out the form below</h3>
        </div>
        <div class="col-lg-3 d-none d-lg-flex justify-content-end pr-5">
            <div class="clock">
              <div class="hour">
                <div class="hr" id="hr">
                </div>
              </div>
              <div class="min">
                <div class="mn" id="mn">
                </div>
              </div>
              <div class="sec">
                <div class="sc" id="sc">
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="datalist.php" method="POST" class="text-dark">
                <div class="form-floating">
                  <input type="text" class="form-control mb-3" required id="floatingfirstname" name="firstname" placeholder="First Name">
                  <label for="floatingfirstname">First Name</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control mb-3" id="floatinglastname" name="lastname" placeholder="Last Name">
                  <label for="floatinglastname">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" required id="floatingEmail" name="email" placeholder="name@example.com">
                  <label for="floatingEmail" aria-describedby="emailHelp">Email address</label>
                  <button type="button" class="btn btn-sm btn-dark" id="emailHelp" class="d-inline form-text ml-3" data-bs-toggle="tooltip" data-bs-placement="right" title="For your own security you shouldn't type in your Email Address in random sites">
                      Please enter any dummy email
                       <!--Question Mark icon  -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                      </svg>
                    </button>
                  
                </div>
                <div class="form-floating my-3">
                    <input type="text"  class="form-control mb-3" required id="floatingNumber" name="phone_number" placeholder="Phone Number">
                    <label for="floatingNumber">Phone Number</label>
                </div>
                <div class="form-floating">
                    <input type="text"  class="form-control mb-3" name="dob" id="floatingDob">
                    <label for="floatingDob">Date of Birth</label>
                </div>
                
                <select class="form-select form-select-md py-3 mb-3" required aria-label=".form-select-lg example" name="subject_id">
                  <option disabled selected>Select Subject</option>
                <?php while($x = $subjects->fetch(PDO::FETCH_ASSOC)){ ?>
                  <option value="<?php echo $x['subjects_id']?>"><?php echo $x['subject_name'] ?></option>  
                <?php } //while ends?>  
                </select>

                <div class="form-floating my-3">
                    <textarea class="form-control mb-3" id="floatingNumber" name="feedback" style="height: 100px" placeholder=" Feedback"></textarea>
                    <label for="floatingNumber">Feedback</label>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Submit" class="text-white btn-grad mb-3">
                </div>

                
            </form>
        </div>
    </div>
</div>










<script src="js/clock.js"></script>

<!-- Body ends here -->
<?php
//importing footer
require_once 'snippets/footer.php';
?>