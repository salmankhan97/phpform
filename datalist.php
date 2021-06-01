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
                    <button class="btn btn-sm col-12 col-lg-auto btn-primary mb-1 mb-lg-0" onclick="viewID(<?php echo $x['student_id'] ?>)" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                    <button class="btn btn-sm col-12 col-lg-auto btn-danger mb-1 mb-lg-0" onclick="deleteID(<?php echo $x['student_id'] ?>)" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    <button class="btn btn-sm col-12 col-lg-auto btn-warning" onclick="editID(<?php echo $x['student_id'] ?>)" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                </td>
            </tr>
        <?php } //while loop ends here?>
        </table>
    </div>
</div>

<?php include 'snippets/viewmodal.php' ?>
<?php include 'snippets/deletemodal.php' ?>
<?php include 'snippets/editmodal.php' ?>
    






<script>
    function viewID(x){
        const spinner = document.getElementsByClassName('spinner');
        const modalData = document.getElementById('modalData');
        for(i=0; i < spinner.length ; i++){
            spinner[i].hidden=false;
        }
        modalData.style.opacity = 0;
        // x.preventDefault();
        fetch('api/view.php?id='+x)
        .then((res) => res.json())
        .then((data) => {
            document.getElementById('viewFname').innerHTML = data.first_name;
            document.getElementById('viewLname').innerHTML = data.last_name;
            document.getElementById('viewEmail').innerHTML = data.email_address;
            document.getElementById('viewPhone').innerHTML = data.phone_number;
            document.getElementById('viewDob').innerHTML = data.date_of_birth;
            document.getElementById('viewSubject').innerHTML = data.subject_name;
            document.getElementById('viewJoinDate').innerHTML = data.joining_date;
            document.getElementById('viewFeedback').innerHTML = data.feedback;
            for(i=0; i < spinner.length ; i++){
                spinner[i].hidden=true;
            }
            modalData.style.opacity = 1;
        });
        return false;
    }

    function deleteID(x){
        document.getElementById('deleteConfirm').href=`delete.php?id=${x}`;
    }

    function editID(x){
        const spinner = document.getElementsByClassName('spinner');
        const modalData = document.getElementById('modalData2');
        for(i=0; i < spinner.length ; i++){
            spinner[i].hidden=false;
        }
        modalData.style.opacity = 0;
        // x.preventDefault();
        fetch('api/view.php?id='+x)
        .then((res) => res.json())
        .then((data) => {
            document.getElementById('editId').value = data.student_id;
            document.getElementById('editFname').value = data.first_name;
            document.getElementById('editLname').value = data.last_name;
            document.getElementById('editEmail').value = data.email_address;
            document.getElementById('editPhone').value = data.phone_number;
            document.getElementById('editDob').value = data.date_of_birth;
            document.getElementById('editFeedback').value = data.feedback;
            //selecting subject
            let chosen = data.subject_name;
            //console.log(chosen);
            let option = document.getElementsByClassName('subjectSelect');
            for(i=0; i < option.length ; i++){
                // console.log(option[i].text);
                // console.log(option[i].value);
                if(option[i].text == chosen){
                    option[i].selected = true;
                }
                
            }
            // console.log(option);
            for(i=0; i < spinner.length ; i++){
                spinner[i].hidden=true;
            }
            modalData.style.opacity = 1;
        });
        return false;
    }
</script>
<!-- Body ends here -->
<?php
//importing footer
require 'snippets/footer.php';
?>