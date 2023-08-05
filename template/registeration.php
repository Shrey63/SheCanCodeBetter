#for Registration
    if(isset($_POST['register']))
    {
        $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
        $result =  mysqli_query($con,$user_exist_query);


        if($result)
        {
            #if user has username or email already exists
            if(mysqli_num_rows($result)>0)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['username'] == $_POST['username'])
                {
                    #error for username already exixts
                    echo "<script> alert('Username already exists!'); 
                    window.location.href='signup.php';
                    </script>";  
                }

                else
                {
                     #error for email already exists
                 echo "<script>alert('Email already exists !'); 
                 window.location.href='signup.php';
                 </script>";
                }
            }

            #username and email are new so register the new user
            else
            {
                /*$emailvalidate = test_input($_POST['email']);
                if (!filter_var($emailvalidate, FILTER_VALIDATE_EMAIL)) 
                {
                    $emailErr = "Invalid email format";
                }*/
                $passwordvaidalidate = $_POST['password'];
 
                $number = preg_match('@[0-9]@', $passwordvaidalidate);
                $uppercase = preg_match('@[A-Z]@', $passwordvaidalidate);
                $lowercase = preg_match('@[a-z]@', $passwordvaidalidate);
                $specialChars = preg_match('@[^\w]@', $passwordvaidalidate);
                    
                if(strlen($passwordvaidalidate) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) 
                {
                    echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.'); 
                            window.location.href='signup.php'; 
                            </script>";      
                }
                else
                {

                
                $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
                $v_code = bin2hex(random_bytes(16));
                $query = "INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password', '$v_code', '0')";
                    if(mysqli_query($con, $query) && sendMail($_POST['email'],$v_code))
                    {
                        #if data is inserted successfully
                        echo "<script>alert('Registration successful! Please verify your email in order to login'); 
                                window.location.href='Login.php';
                            </script>";

                    }
                    else
                    {
                        #if data cannot be inserted
                        echo "<script>alert('Oops! Server Down'); 
                                window.location.href='signup.php';
                            </script>";
                    }
                }
            }
        }
        else
        {

            echo "<script>alert('Cannot run Query'); 
            window.location.href='signup.php';
            </script>";
        }
    }
?>