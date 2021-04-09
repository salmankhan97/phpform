<?php
    $id = $x['student_id'];
    $info = $crud->getinfo($id);
?>


<div class="modal fade" id="viewid<?php echo $x['student_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title">View information</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="">
              <table class="table table-dark table-borderless">
                  <tr>
                      <th class="user-select-none">First Name:</th>
                      <td><?php echo $info['first_name'] ?></td>
                  </tr>
                  <tr>
                      <th class="user-select-none">Last Name:</th>
                      <td><?php echo $info['last_name'] ?></td>
                  </tr>
                  <tr>
                      <th class="user-select-none">Email:</th>
                      <td><?php echo $info['email_address'] ?></td>
                  </tr>
                  <tr>
                      <th class="user-select-none">Phone Number:</th>
                      <td><?php echo $info['phone_number'] ?></td>
                  </tr>
                  <tr>
                      <th class="user-select-none">Date of Birth:</th>
                      <td><?php echo date('jS F Y', strtotime($info['date_of_birth'])) ?></td>
                  </tr>
                  <tr>
                      <th class="user-select-none">Subject:</th>
                      <td><?php echo $info['subject_name'] ?></td>
                  </tr>
                  <tr>
                      <th class="user-select-none">Joining Date:</th>
                      <td><?php echo $info['joining_date'] ?></td>
                  </tr>
              </table>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

