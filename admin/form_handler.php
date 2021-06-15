<?php 
require "./include/connection.php";


if(isset($_POST['signup'])) {
   
            $name1 = $_POST['name1'];
            $name2 = $_POST['name2'];
            $email = $_POST['email'];
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];
            if ($pass1==$pass2) {
                $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`)
                VALUES ('$name1','$name2','$email','$pass2')";
            
                if($conn->query($sql)) {
                 
                        session_start();
                        $_SESSION['signtrue'] = true;
                        header('Location:./login.php');
                    }
                    


            }

            else {
                echo "password doesnot match";
            }
            
} else 


if (isset($_POST['login_submit'])) {

        $log_email = $_POST['email'];
        $passcode = $_POST['password'];


        $sql ="SELECT  `password` , `first_name` FROM `users`
         WHERE email = '$log_email'";

        $result = $conn->query($sql);
        
        $rows = $result->num_rows;

        if( $rows > 0 ) {
            //user existed
            $result_analyze = $result->fetch_assoc();
            $passmatch = $result_analyze['password'];
            $userName = $result_analyze['first_name'];
            if($passcode == $passmatch) {
                // TRUE uSER
                session_start();
                $_SESSION['logintrue'] =  $userName ;
                if(isset($_POST['remember'])){
                    $_SESSION['remember'] =  true ;
                }
                header('Location:index.php');

            }else {
                echo "Wrong Password";
            }

        } else {
            echo "USER DOESNOT EXIST";
        }

    }



    //  buttons handler ...of quotations..............................

    elseif(isset($_POST['refresh'])) {
            require'include/connection.php';
        header("Location:solar_quotations.php");
    }
    elseif(isset($_POST['delete'])) {
        require'include/connection.php';
        $del = "DELETE FROM `solarquotations`";
        mysqli_query($conn,$del);

        header("Location:solar_quotations.php");
    }


?>
        