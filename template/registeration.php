<?php
// require('connection.php');
//     if(isset($_POST['register']))
//     { 
        print_r($_POST);
    //     $user_exist_query="SELECT * FROM `users` WHERE `username`='$_POST[useremail]'";
    //     $result =  mysqli_query($con,$user_exist_query);
    //     if($result)
    //     {
    //         #if user has username or email already exists
    //         if(mysqli_num_rows($result)>0)
    //         {
    //                 echo "<script> alert('Username already exists!'); 
    //                 window.location.href='register.php';
    //                 </script>";  
    //         }   
    //     }
    // else
    // {

              
        
        require('connection.php');
        
        if (isset($_POST['register'])) {
            $fullname = $_POST["username"];
            $email = $_POST["useremail"];
            $password = $_POST["password"];
            $experience = $_POST["experience"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $address = $_POST["address"];
        
            // Sanitize the input to prevent SQL injection
          
        
            // Create the SQL query
            $query = "INSERT INTO users (user_name, email, password, exp, city, state, address) 
                      VALUES ('$fullname', '$email', '$password', '$experience', '$city', '$state', '$address')";
        
            // Execute the query
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Registration done successfully!'); 
                        window.location.href='login.php';
                    </script>";

            } else {
                echo "Error: " . mysqli_error($con);
            }
        
            // Close the connection
            // mysqli_close($con);
        }
        ?>
        