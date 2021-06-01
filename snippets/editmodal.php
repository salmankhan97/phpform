<?php
    //$id = $x['student_id'];
    //$info = $crud->getinfo($id);
    $subjects = $crud->getSubject();
?>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <div class="spinner"></div>
          
        <form action="update.php" method="POST" id="modalData2" class="text-dark">
            <input type="hidden" id="editId" name="id">
            <div class="form-floating">
              <input type="text" class="form-control mb-3" id="editFname" name="firstname" placeholder="First Name">
              <label for="editFname">First Name</label>
            </div>
            <div class="form-floating">
              <input type="text" class="form-control mb-3" id="editLname" name="lastname" placeholder="Last Name">
              <label for="editLname">Last Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="editEmail" name="email" placeholder="name@example.com">
              <label for="editEmail" aria-describedby="emailHelp">Email address</label>
            </div>
            <div class="form-floating my-3">
                <input type="text"  class="form-control mb-3" id="editPhone" name="phone_number" placeholder="Phone Number">
                <label for="editNumber">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text"  class="form-control mb-3 custom-date" id="editDob" name="dob">
                <label for="editDob">Date of Birth</label>
            </div>
            <select class="form-select form-select-md py-3" aria-label=".form-select-lg example" name="subject_id">
            <?php while($x = $subjects->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $x['subjects_id']?>" class="subjectSelect">
                    <?php echo $x['subject_name'] ?>
                </option>
            <?php } //while ends?>  
            </select>

            <div class="form-floating my-3">
                <textarea class="form-control mb-3" id="editFeedback" name="feedback" style="height: 100px" placeholder=" Feedback"></textarea>
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