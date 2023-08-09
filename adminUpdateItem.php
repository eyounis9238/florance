<?php
    require('db_conn.php');
    $errors = [];

    if(!empty($_POST['item_id'])){
        $item_id = $_POST['item_id'];
    } else {
        $item_id = null;
        $errors[] = "<p> Error!!!! Item ID is required!!</p>";
    }

    if(!empty($_POST['name'])){
        $name = $_POST['name'];  
    } else {
        $name = null;
        $errors[] = "<p> Error!!!! Name is required!!</p>";
    }
    if(!empty($_POST['price'])){
        $price = $_POST['price'];  
    } else {
        $price = null;
        $errors[] = "<p> Price is required!!</p>";
    }
    if(!empty($_POST['quantity'])){
        $quantity = $_POST['quantity'];  
    } else {
        $quantity = null;
        $errors[] = "<p> Quantity is required!!</p>";
    }

    if(count($errors) == 0){
        
        $item_id_clean = prepare_string($dbc, $item_id);
        $name_clean = prepare_string($dbc, $name);
        $price_clean = prepare_string($dbc, $price);
        $quantity_clean = prepare_string($dbc, $quantity);
        
        $query = "UPDATE items SET `item_name` = ?, item_price = ?, quantity = ? WHERE  item_id = ?;";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param(
            $stmt,
            'ssss',
            $name_clean,
            $price_clean,
            $quantity_clean,
            $item_id_clean
            
        );
        
        $result = mysqli_stmt_execute($stmt);
        
        if($result){
            header("Location: adminItemsList.php");
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