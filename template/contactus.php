<?php
session_start();
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get form data

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        require('connection.php');
        // Connect to the database (replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your database credentials)
    
        // Check the connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
    
        // Prepare the SQL query to insert the data into the "contact" table
        $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    
        // Execute the query
        if ($con->query($sql) === TRUE) {
            // Data inserted successfully
            echo "<script>alert('We will reach out to you soon'); 
            window.location.href='index.php';
        </script>";
            
        } else {
            // Error occurred while inserting data
            echo "Error: " . $con->error;
        }
    
        // Close the database connection
        $con->close();
    }
    else{
        header("Location: contact.php" );
    }
    ?>
    