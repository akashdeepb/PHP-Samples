<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'DatabaseConfigFile.php';
        $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
        if(mysqli_connect_errno()){
            die("500 - Internal Server Error");
        }
        else {
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $name = mysqli_real_escape_string($con,$_POST['name']);
            $phone = mysqli_real_escape_string($con,$_POST['phone']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            
            if(!empty($email) && !empty($name) && !empty($password)) {
                $insert_query = "INSERT INTO user_data (email,password,name,phone) VALUES ('$email','$password','$name','$phone')";
                $result = mysqli_query($con,$insert_query);
                if($result) {
                    // DO IF SAVED
                }
                else {
                    // DO IF NOTHING RETURNED
                }
            }
            else {
                echo "Credentials Missing";
            }
        }
    }
?>