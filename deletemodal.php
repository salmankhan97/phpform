


<div class="modal fade" id="deleteid<?php echo $x['student_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-0">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
            <h2>Are you sure?</h2>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <a href="delete.php?id=<?php echo $x['student_id'] ?>" type="button" class="btn btn-danger" >Delete</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

