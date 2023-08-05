<?php

    require('connection.php');

    session_start();
   


    #for Login
    if(isset($_POST['login']))
    {
        print_r($_POST);
        $query = "SELECT * FROM `users` WHERE `user_name`='" . $_POST['email'] . "' && `password`= '" . $_POST['password'] . "'";
    
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
            $password = $row['password'];
            
                    
                        #if password matched
                        $_SESSION['logged_in']=true;
                        // $_SESSION['username']=$result_fetch['username'];
                        $_SESSION['email']=$email;
                        echo "<script>alert('Logged in successfully!'); 
                            window.location.href='index.php';
                            </script>";
                    
                    
              


            }
            else
            {
                echo "<script>alert('Email or Username Not Found!'); 
                        window.location.href='login.php';
                    </script>";
            }
        }
        else
        {
            echo "<script>alert('Cannot run Query'); 
            window.location.href='Login.php';
            </script>";
        }
    }



  