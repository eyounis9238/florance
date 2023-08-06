<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact_form";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to insert data into the database
    $sql = "INSERT INTO contact_form (first_name, f_email, f_message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // If data is inserted successfully, send a response to the client
        $response = array("message" => "Message sent successfully!");
        echo json_encode($response);
    } else {
        // If there is an error, send an error response to the client
        $response = array("message" => "Error: " . $sql . "<br>" . $conn->error);
        echo json_encode($response);
    }

    // Close the database connection
    $conn->close();
}
?>
