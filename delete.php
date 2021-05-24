<?php 
    require_once 'db/conn.php';
    if(!$_GET['id']){
        echo 'error';
    } else{
        //Get id value
        $id = $_GET['id'];

        //Call function to delete
        $result = $crud->deleteinfo($id);

        if($result){
            header('Location: datalist.php?deleted=1');
            exit();
        }else{
            echo "error";
        }
    }
