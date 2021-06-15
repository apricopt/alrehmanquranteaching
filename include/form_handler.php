<?php

require './connection.php';

if($conn) {

    if(isset($_POST['contact'])) {
        $name= $_POST['txtName'];
        $email= $_POST["txtEmail"];
        $phone = $_POST["txtPhone"];
        $owner = $_POST["owner"];
        $since = $_POST["since"];
        $message= $_POST["txtMsg"];

        $sqlc ="INSERT INTO contactus(namee, emaill, phonee, ownerr , sincee , messagee )
    VALUES('$name', '$email' , '$phone', '$owner', '$since' , '$message')";


        if($conn->query($sqlc)) {

                 header("Location:../contact.php?success");
                 
        }else {
            echo "error occured while submission";
        }

    }
    
    
    
    
    
    else if(isset($_POST['submit']))     {
    
 	$name= $_POST['z_name'];
    $address= $_POST["z_address"];
    $state= $_POST['z_state'];
    $contact= $_POST["z_num"];
    $property= $_POST["z_property"];
    $shade= $_POST["z_shade"];
    $creditScore= $_POST["z_score"];
    $bill=$_POST["z_bill"];
    $time= $_POST["z_callback"];

    
     $sql ="INSERT INTO customer(customer_name, address, state_name, contact, property_type, shade, credit_score, electric_bill, callback)
    VALUES('$name', '$address' , '$state', '$contact' ,'$property', '$shade', '$creditScore', '$bill', '$time')";


        if($conn->query($sql)) {
             
                 session_start();
                $_SESSION['client_submitted']="yes"; 
                 header("Location:../community.php?success");
                 
        }else {
            echo "error occured while submission";
        }


    }




    




}else{
    echo "connection variable not found";
}

?>