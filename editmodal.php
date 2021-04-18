<?php
    //$id = $x['student_id'];
    //$info = $crud->getinfo($id);
    $subjects = $crud->getSubject();
?>


<div class="modal fade" id="editid<?php echo $x['student_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?php
//Checking if logged in or not
if(!isset($_SESSION['id'])){ ?>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-0">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <h3 class="text-danger">Only Logged in users can edit</h3>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <a href="login.php" type="button" class="btn btn-primary" >Login</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
<?php }else{ ?>
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title">Edit information</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
        <form action="update.php" method="POST" class="text-dark">
            <input type="hidden" name="id" value="<?php echo $x['student_id'] ?>">
            <div class="form-floating">
              <input type="text" class="form-control mb-3" value="<?php echo $info['first_name'] ?>" id="floatingfirstname" name="firstname" placeholder="First Name">
              <label for="floatingfirstname">First Name</label>
            </div>
            <div class="form-floating">
              <input type="text" class="form-control mb-3" value="<?php echo $info['last_name'] ?>" id="floatinglastname" name="lastname" placeholder="Last Name">
              <label for="floatinglastname">Last Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" value="<?php echo $info['email_address'] ?>" id="floatingEmail" name="email" placeholder="name@example.com">
              <label for="floatingEmail" aria-describedby="emailHelp">Email address</label>
            </div>
            <div class="form-floating my-3">
                <input type="text"  class="form-control mb-3" value="<?php echo $info['phone_number'] ?>" id="floatingNumber" name="phone_number" placeholder="Phone Number">
                <label for="floatingNumber">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date"  class="form-control mb-3" id="floatingDobdate" value="<?php echo date('Y-m-j', strtotime($info['date_of_birth'])) //this way html form gets date value ?>" name="dob">
                <label for="floatingDobdate">Date of Birth</label>
            </div>
            <select class="form-select form-select-md py-3"  value="<?php echo $info['subject_id'] ?>" aria-label=".form-select-lg example" name="subject_id">
            <?php while($x = $subjects->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $x['subjects_id']?>" <?php if($x['subjects_id'] == $info['subject_id'])echo "selected" ?> >
                    <?php echo $x['subject_name'] ?>
                </option>  
            <?php } //while ends?>  
            </select>

            <div class="form-floating my-3">
                <textarea class="form-control mb-3" id="floatingNumber" name="feedback" style="height: 100px" placeholder=" Feedback"><?php echo $info['feedback'] ?></textarea>
                <label for="floatingNumber">Feedback</label>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" value="Update" class="btn btn-warning">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
<?php }?>
</div>