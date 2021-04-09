<?php
//Enter page title here
$page_title = 'Sucess';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';


if(isset($_POST['submit'])){
    //extract values from $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $subject_id = $_POST['subject_id'];

    //call function to insert and check if success or not
    $isSuccess = $crud->insert($fname, $lname, $email, $phone_number, $dob, $subject_id);
 
}

    //Get data from database
    $results = $crud->getdata();
?>

<div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto my-5 text-center bg-dark">
    <?php
        if($isSuccess){
            echo "<h1 class='text-grad'>Submitted Successfully</h1>";
        }else{
            echo "<h1 class='text-danger'>There was an error</h1>";
        }
    ?>
</div>

<h3 class="text-center my-3">You can view or edit your data below</h3>

<div class="container-fluid col-11 py-5 px-3 rounded-3 border border-light mx-auto my-5 bg-dark">
    <div class="table-responsive">
        <table class="table table-striped table-dark ">
            <tr class="table-active">
                <th>Full Name</th>
                <th>Email</th>
                <!-- <th>Phone Number</th> -->
                <!-- <th>Date of Birth</th> -->
                <th>Subject</th>
                <!-- <th>Joining Date</th> -->
                <th>Actions</th>
            </tr>
        <?php while($x = $results->fetch(PDO::FETCH_ASSOC)) { ?>

            <tr>
                <td><?php echo $x['first_name']." ".$x['last_name']?></td>
                <td><?php echo $x['email_address']?></td>
                <!-- <td><?php //echo $x['phone_number']?></td> -->
                <!-- <td><?php //echo $x['date_of_birth']?></td> -->
                <td><?php echo $x['subject_name']?></td>
                <!-- <td><?php //echo date('d-m-y', strtotime($x['joining_date'])); ?></td> -->
                <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewid<?php echo $x['student_id'] ?>">View</button>
                <?php include'viewmodal.php' //INcluding view data modal ?>  
                </td>
            </tr>

        <?php } //while loop ends here?>
        </table>
    </div>
</div>
        
    







<!-- Body ends here -->
<?php
//importing footer
require_once 'snippets/footer.php';
?>