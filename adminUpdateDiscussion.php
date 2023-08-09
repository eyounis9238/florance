<?php
    require('db_conn.php');
    $errors = [];

    if(!empty($_POST['id'])){
        $id = $_POST['id'];
    } else {
        $discussionId = null;
        $errors[] = "<p> Error!!!! discussion Id is required!!</p>";
    }

    if(!empty($_POST['title'])){
        $title = $_POST['title'];  
    } else {
        $title = null;
        $errors[] = "<p> Error!!!! title is required!!</p>";
    }
    if(!empty($_POST['content'])){
        $content = $_POST['content'];  
    } else {
        $content = null;
        $errors[] = "<p> content is required!!</p>";
    }
    // if(!empty($_POST['phone'])){
    //     $phone = $_POST['phone'];  
    // } else {
    //     $phone = null;
    //     $errors[] = "<p> Phone is required!!</p>";
    // }
    // if(!empty($_POST['province'])){
    //     $province = $_POST['province'];  
    // } else {
    //     $province = null;
    //     $errors[] = "<p> Province is required!!</p>";
    // }

    if(count($errors) == 0){
        
        $discussionId_clean = prepare_string($dbc, $id);
        $title_clean = prepare_string($dbc, $title);
        $content_clean = prepare_string($dbc, $content);
        // $phone_clean = prepare_string($dbc, $phone);
        // $province_clean = prepare_string($dbc, $province);
        
        $query = "UPDATE tblDiscussion SET title = ?, content = ? WHERE  id = ?;";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param(
            $stmt,
            'sss',
            $title_clean,
            $content_clean,
            $discussionId_clean
        );
        
        $result = mysqli_stmt_execute($stmt);
        
        if($result){
            header("Location: adminDiscussions.php");
            exit;
        } else {
            echo "</br>Some error in Saving the data";
        }
        
    } else {
        foreach($errors as $error){
            echo $error;
        }
    }
?>