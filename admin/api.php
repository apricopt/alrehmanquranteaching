<?php 
header('Access-Control-Allow-Origin: *');
header('Content-type:application/json');







if(isset($_GET['chart'])) {

       $month = date("m");
    $year = date("Y");

$servername = "127.0.0.1";
$user = "apriakoz_apricopt";
$pass = "hackerx143@";
$db = "apriakoz_solarimprovements";


$conn = new mysqli($servername, $user , $pass , $db);

if(!$conn) {
    die("connection failed");
}


     $sql = "SELECT *
                    FROM customer
                    ";

     $result = $conn->query($sql);

            $fetched = $result->fetch_all();


$merge ="hehehe";

exit(json_encode($fetched));


}



?>