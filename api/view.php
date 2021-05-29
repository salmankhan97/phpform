<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include '../db/conn.php';
        try{
            $success = $crud->getinfo($id);
            //converting to json so that JS can read it
            echo json_encode($success);
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
