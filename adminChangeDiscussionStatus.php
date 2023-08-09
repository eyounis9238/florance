<?php
    require('db_conn.php');

    $error = null;
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    } else{
        $error = "<p>Error! Discussion Id or Status not found.</p>";
    }
        $status = $_GET['status'];
     

    if($error == null){
        $query="";
        if($status==1){
            $query="Update tblDiscussion set approved=0 where id ='$id';";

        }else if($status==0){
            $query="Update tblDiscussion set approved=1 where id ='$id';";
        }
        print($query);
        $result = mysqli_query($dbc, $query);
        
        if($result){
            header("Location: AdminDiscussions.php");
            exit;
        } else {
            echo "</br><p>Some error in updating the record</p>";
        }
    } else {
        echo $error;
    }