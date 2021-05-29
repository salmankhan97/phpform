<?php
    $id = $x['student_id'];
    $info = $crud->getinfo($id);
?>


<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title">View information</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body position-relative">
        <div class="spinner"></div>

          <div class="container-fluid" id="modalData">
              <div class="row row-cols-1 row-cols-md-2 gy-2 gy-md-3">
                  <div class="col user-select-none fw-bold">First Name:</div>
                  <div class="col" id="viewFname"></div>
                  <div class="col user-select-none fw-bold">Last Name:</div>
                  <div class="col" id="viewLname"></div>
                  <div class="col user-select-none fw-bold">Email:</div>
                  <div class="col" id="viewEmail"></div>
                  <div class="col user-select-none fw-bold">Phone Number:</div>
                  <div class="col" id="viewPhone"></div>
                  <div class="col user-select-none fw-bold">Date of Birth:</div>
                  <div class="col" id="viewDob"></div>
                  <div class="col user-select-none fw-bold">Subject:</div>
                  <div class="col" id="viewSubject"></div>
                  <div class="col user-select-none fw-bold">Joining Date:</div>
                  <div class="col" id="viewJoinDate"></div>
                  <div class="col user-select-none fw-bold mb-3">Feedback:</div>
                </div>
                <div class="col-12">
                  <p class="text-wrap" id="viewFeedback"></p>
                </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

