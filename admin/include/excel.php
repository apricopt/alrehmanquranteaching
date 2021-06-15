<?php


require 'connection.php';
require '../phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['excel'])) {
  


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();


$sheet->setCellValue('A1', 'Customer_ID');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Address');
$sheet->setCellValue('D1', 'State');
$sheet->setCellValue('E1', 'Contact');
$sheet->setCellValue('F1', 'Property');
$sheet->setCellValue('G1', 'Shade');
$sheet->setCellValue('H1', 'Credit Score');
$sheet->setCellValue('I1', 'Electric Bill');
$sheet->setCellValue('J1', 'Call back');
$sheet->setCellValue('K1', 'Date Entered');





$sql = "SELECT customer.customer_id ,customer.customer_name, customer.address , states.state_name , customer.contact , customer.property_type , customer.shade , customer.credit_score , customer.electric_bill , customer.callback, date_entered
                   FROM customer
                   JOIN states
                   ON customer.state_name = states.state_id  
                   ";
                  if($result = $conn->query($sql)) {
                    // echo "executing";
                  }else {
                    // echo "error";
                  }
                  $rows = $result->num_rows;
                  if( $rows > 0 ) {                  
                   
                  $i=2;


                   while ( $result_analyze = $result->fetch_array()) {
                        
                    $sheet->setCellValue('A'.($i+2), $result_analyze[0]);
                    $sheet->setCellValue('B'.($i+2), $result_analyze[1]);
                    $sheet->setCellValue('C'.($i+2), $result_analyze[2]);
                    $sheet->setCellValue('D'.($i+2), $result_analyze[3]);
                    $sheet->setCellValue('E'.($i+2), $result_analyze[4]);
                    $sheet->setCellValue('F'.($i+2), $result_analyze[5]);
                    $sheet->setCellValue('G'.($i+2), $result_analyze[6]);
                    $sheet->setCellValue('H'.($i+2), $result_analyze[7]);
                    $sheet->setCellValue('I'.($i+2), $result_analyze[8]);
                    $sheet->setCellValue('J'.($i+2), $result_analyze[9]);
                    $sheet->setCellValue('K'.($i+2), $result_analyze[10]);
                   

                    
                    $i=$i+1;
                  }
                 
                  
                }











$filename = 'SolarImprovements-'.time().'.xlsx';


// Redirect output to a client's web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');



// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');


              }



                //  buttons handler ...of quotations..............................

    elseif(isset($_POST['refresh'])) {
            require'connection.php';
        header("Location:../tables.php");
    }
    elseif(isset($_POST['delete'])) {
        require'connection.php';
        $del = "DELETE FROM `customer`";
        $conn->query($del);

        header("Location:../tables.php");
    }



?>