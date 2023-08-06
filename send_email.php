<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "purohitmanan44@gmail.com"; // Replace with your admin email address
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Subject of the email
    $subject = "New Contact Form Submission";

    // Email headers
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Attempt to send the email using the mail() function
    if (mail($to, $subject, $message, $headers)) {
        $response = array(
            "success" => true,
            "message" => "Your message has been sent successfully!",
        );
    } else {
        $response = array(
            "success" => false,
            "message" => "Failed to send email. Please try again later.",
        );
    }

    // Return the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // If accessed directly, return an error message
    $response = array(
        "success" => false,
        "message" => "Invalid request. Please submit the form.",
    );

    // Return the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>

