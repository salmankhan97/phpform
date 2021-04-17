<?php
//Enter page title here
$page_title = 'Submitted Data';

//importing header
require_once 'snippets/header.php';
//Checking if logged in
// require_once 'snippets/auth_check.php';
//importing database connection
require_once 'db/conn.php';



if(isset($_POST['submit'])){
    //extract values from $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $feedback = $_POST['feedback'];
    $subject_id = $_POST['subject_id'];

    //call function to insert and check if success or not
    $isSuccess = $crud->insert($fname, $lname, $email, $phone_number, $dob, $feedback, $subject_id);
    if($isSuccess){ ?>
        <div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto mt-5 text-center bg-dark">
            <h1 class='text-grad'>Submitted Successfully</h1>
        </div>
    <?php }
 
    
    } else if(isset($_GET['updated'])){ ?>
        <div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto mt-5 text-center bg-dark">
            <h1 class='text-grad'>Updated Successfully</h1>
        </div>
<?php } else if(isset($_GET['deleted'])){ ?>
        <div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto mt-5 text-center bg-dark">
            <h1 class='text-grad'>Deleted Successfully</h1>
        </div>
<?php }


//Get data from database
$results = $crud->getdata();
?>



<h3 class="text-center my-5">You can view or edit your data below</h3>

<div class="container-fluid col-11 py-5 px-3 rounded-3 border border-light mx-auto bg-dark">
    <div class="table-responsive">
        <table class="table table-striped table-dark ">
            <tr class="table-active">
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        <?php while($x = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $x['first_name']." ".$x['last_name']?></td>
                <td><?php echo $x['email_address']?></td>
                <td><?php echo $x['phone_number']?></td>
                <td><?php echo $x['subject_name']?></td>
                <td class="">
                    <button class="btn btn-sm col-12 col-lg-auto btn-primary mb-1 mb-lg-0" data-bs-toggle="modal" data-bs-target="#viewid<?php echo $x['student_id'] ?>">View</button>
                    <?php include 'viewmodal.php' ?>
                    <button class="btn btn-sm col-12 col-lg-auto btn-danger mb-1 mb-lg-0" data-bs-toggle="modal" data-bs-target="#deleteid<?php echo $x['student_id'] ?>">Delete</button>
                    <?php include 'deletemodal.php' ?>
                    <button class="btn btn-sm col-12 col-lg-auto btn-warning" data-bs-toggle="modal" data-bs-target="#editid<?php echo $x['student_id'] ?>">Edit</button>
                    <?php include 'editmodal.php' ?>
                </td>
            </tr>
        <?php } //while loop ends here?>
        </table>
    </div>
</div>
        
    







<!-- Body ends here -->
<?php
//importing footer
require 'snippets/footer.php';
?>