<?php
// Database configuration
$servername = "localhost";   // Database server (e.g., 'localhost' if on the same server)
$username = "root";          // Database username
$password = "";              // Database password
$dbname = "booking";   // Database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $package = $conn->real_escape_string($_POST['package']);
    $date = $conn->real_escape_string($_POST['date']);
    
    // Insert the data into the 'bookings' table
    $sql = "INSERT INTO booking (name, email, package, travel_date) VALUES ('$name', '$email', '$package', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Booking successful! Thank you for booking a tour with us.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
