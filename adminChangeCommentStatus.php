<?php
    require('db_conn.php');

    $error = null;
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    } else{
        $error = "<p>Error! Comment Id or Status not found.</p>";
    }
        $status = $_GET['status'];
     

    if($error == null){
        $query="";
        if($status==1){
            $query="Update tblComments set status=0 where commentID ='$id';";

        }else if($status==0){
            $query="Update tblComments set status=1 where commentID ='$id';";
        }
        print($query);
        $result = mysqli_query($dbc, $query);
        
        if($result){
            header("Location: AdminComments.php");
            exit;
        } else {
            echo "</br><p>Some error in updating the record</p>";
        }
    } else {
        echo $error;
    }