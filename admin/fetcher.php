<?php 
header('Access-Control-Allow-Origin: *');
header('Content-type:application/json');

    require 'include/connection.php';

    $month = date("m");
    $year = date("Y");


    if(isset($_GET['chart'])) {
        // code to fetch data for chart1
            $sql = "SELECT COUNT(customer_id) 
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-01%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-02%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-03%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-04%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-05%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-06%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-07%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-08%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-09%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-10%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-11%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-12%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-13%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-14%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-15%'
                    UNION ALL
                    SELECT COUNT(customer_id) 
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-16%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-17%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-18%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-19%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-20%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-21%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-22%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-23%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-24%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-25%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-26%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-27%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-28%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-29%'
                    UNION ALL 
                    SELECT COUNT(customer_id)  
                    FROM customer
                    WHERE date_entered LIKE '".$year."-".$month."-30%'
                    
                    
                    



                    ";
            $result = $conn->query($sql);

            $fetched = $result->fetch_all();

            // ^ we used fetch all because it will fetch all rows not just one row

           
            $merge=array_merge($fetched[0],$fetched[1],$fetched[2],$fetched[3],$fetched[4],$fetched[5],$fetched[6],$fetched[7],$fetched[8],$fetched[9],$fetched[10],$fetched[11],$fetched[12],$fetched[13],$fetched[14],$fetched[15],$fetched[16],$fetched[17],$fetched[18],$fetched[19],$fetched[20],$fetched[21],$fetched[22],$fetched[23],$fetched[24],$fetched[25],$fetched[26],$fetched[27],$fetched[28],$fetched[29]);
           

           //print_r($merge) ;

       echo  json_encode([1,3,5,4,3,5]);



        // code to fetch data chart1 ends


    }

     if(isset($_GET['pie'])){

      $sql = "SELECT Count(state_name)
                FROM customer
                WHERE state_name = '1'
                UNION ALL
                SELECT Count(state_name)
                FROM customer
                WHERE state_name = '2'
                UNION ALL
                SELECT Count(state_name)
                FROM customer
                WHERE state_name = '3'
                UNION ALL
                SELECT Count(state_name)
                FROM customer
                WHERE state_name = '4'
                UNION ALL
                SELECT Count(state_name)
                FROM customer
                WHERE state_name = '5'
                UNION ALL
                SELECT Count(state_name)
                FROM customer
                WHERE state_name = '6'
                UNION ALL
                SELECT Count(state_name)
                FROM customer
                WHERE state_name = '7'
               
      " ;
    


      $result =  $conn->query($sql);

      $fetched = $result->fetch_all();

    //  print_r($fetched);

    //now encoding into json so it can be used in js
    echo json_encode($fetched);




     }





// now cards fetcher here 








?>