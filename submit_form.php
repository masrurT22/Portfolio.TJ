<?php
// Include the database connection
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and bind the SQL query
    $stmt = $conn->prepare("INSERT INTO portfolio (name, email, number, subject, message) VALUES (?, ?, ?, ?, ?)");
    
    // Bind the parameters to the SQL query ("ssi" stands for string, string, integer, string, string)
    $stmt->bind_param("ssiss", $name, $email, $number, $subject, $message);
    
    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
