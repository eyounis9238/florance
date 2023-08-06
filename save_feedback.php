<?php

require_once 'db_Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cellNumber = $_POST['cell_number'];
    $feedback = $_POST['feedback'];


    saveFeedbackToDatabase($name, $email, $cellNumber, $feedback);

    // Displaying success message
    echo "Feedback Saved. Thanks!";
}
