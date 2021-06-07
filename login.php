<?php
    if($_SERVER['REQUEST_METHOD']) {
        include 'DatabaseConfigFile.php';

        // All the Args are imported from DatabaseConfigFile.php, refer file
        $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
        
        // If some error occurs connecting
        if(mysqli_connect_errno()) {
            die ("500 - Internal Server Error");
        }
        else {
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            if(!empty($email) && !empty($password)) {
                $check_email_query = "SELECT * FROM user_data WHERE email='$email'";
                $result = mysqli_query($con,$check_email_query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)){

                        // Please Refer Hashing, here only simple user:pass match is used
                        if($password == $row['password']){
                            // Matched User's Data can be accessed using $row. Example $name=$row['name'];
                            // DO WHEN user:pass matched
                        }
                        else {
                            echo 'Invalid Password';
                        }
                    }
                }
                else {
                    echo 'User Not Found';
                }

            }
            else {
                echo 'Credentials Missing';
            }
        }
    }
?>