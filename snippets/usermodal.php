<div class="modal fade" id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-0">
        <h5 class="modal-title">User Information</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">

        <div class="card border-light mb-3 bg-dark" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img class="mw-100" src="<?php echo empty($_SESSION['avatar']) ?  'images/avatar_placeholder.png' : $_SESSION['avatar'] ?>" alt="useravatar">
            </div>
            <div class="col-md-8 d-flex">
              <div class="card-body align-self-center">
                <h5 class="card-title"><?php echo $_SESSION['email']?></h5>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- <div class="modal-footer border-0 justify-content-center">
        <a href="login.php" type="button" class="btn btn-primary" >Login</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>