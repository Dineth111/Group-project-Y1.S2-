<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auction lanka";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    // Perform basic validation
    if (empty($fullname) || empty($email) || empty($password) || empty($user_type)) {
        echo "Please fill in all fields.";
    } elseif ($password !== $_POST["confirm_password"]) {
        echo "Passwords do not match.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute SQL statement to insert data into the database
        $sql = "INSERT INTO users (fullname, email, password, user_type) VALUES ('$fullname', '$email', '$hashed_password', '$user_type')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
