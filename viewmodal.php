<?php
    $id = $x['student_id'];
    $info = $crud->getinfo($id);
?>


<div class="modal fade" id="viewid<?php echo $x['student_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title">View information</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <div class="container-fluid">
              <div class="row row-cols-1 row-cols-md-2 gy-2 gy-md-3">
                  <div class="col user-select-none fw-bold">First Name:</div>
                  <div class="col"><?php echo $info['first_name'] ?></div>
                  <div class="col user-select-none fw-bold">Last Name:</div>
                  <div class="col"><?php echo $info['last_name'] ?></div>
                  <div class="col user-select-none fw-bold">Email:</div>
                  <div class="col"><?php echo $info['email_address'] ?></div>
                  <div class="col user-select-none fw-bold">Phone Number:</div>
                  <div class="col"><?php echo $info['phone_number'] ?></div>
                  <div class="col user-select-none fw-bold">Date of Birth:</div>
                  <div class="col"><?php echo date('jS F Y', strtotime($info['date_of_birth'])) ?></div>
                  <div class="col user-select-none fw-bold">Subject:</div>
                  <div class="col"><?php echo $info['subject_name'] ?></div>
                  <div class="col user-select-none fw-bold">Joining Date:</div>
                  <div class="col"><?php echo date('jS F Y', strtotime($info['joining_date'])) ?></div>
                  <div class="col user-select-none fw-bold mb-3">Feedback:</div>
                </div>
                <div class="col-12">
                  <p class="text-wrap"><?php echo $info['feedback'] ?></p>
                </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-target="#editid<?php echo $x['student_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Edit</button>
        <button type="button" class="btn btn-danger" data-bs-target="#deleteid<?php echo $x['student_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

