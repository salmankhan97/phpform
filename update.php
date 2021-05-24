
<?php
//Enter page title here
$page_title = 'Updated Data';

//importing header
require_once 'snippets/header.php';
//importing database connection
require_once 'db/conn.php';


if(isset($_POST['submit'])){
    //extract values from $_POST array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $feedback = $_POST['feedback'];
    $subject_id = $_POST['subject_id'];

    //call function to update and check if success or not
    $result = $crud->update($id, $fname, $lname, $email, $phone_number, $dob, $feedback, $subject_id);



    if($result){
        header("Location: datalist.php?updated=1");
        exit();
    }else{ ?>
        <div class="msgboard col-11 py-5 rounded-3 border border-light mx-auto mt-5 text-center bg-dark">
            <h1 class='text-grad'><?php echo "error"; ?></h1>
        </div>
    <?php } 
 
    
}else{
    echo "error";
}


require 'snippets/footer.php';
?>