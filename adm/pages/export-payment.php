<?php
session_start();
include_once '../cms/connect.php' ;
include_once('../PhpExcel/PHPExcel.php');



$mysqli_quotation = $mysqli->query("SELECT payment.*,member.*,plan.*,payment.id AS pid,member.username AS username,
                                    member.email AS email,member.phone AS phone,plan.name AS pname,payment.payment_method AS method,plan.price AS price
                                    FROM $payment join $member on payment.member = member.id
                                    join $plan on payment.plan = plan.id WHERE payment.trash != '1'") ;

// check quotation
if ($mysqli_quotation->num_rows > 0) {
    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();
    
    // Set document properties
    $objPHPExcel->getProperties()->setCreator("SweatLab")
                                 ->setTitle("Payment List")
                                 ->setDescription("Order details exported from the system");
    
    // Set header row
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Name')
                ->setCellValue('B1', 'Email')
                ->setCellValue('C1', 'Phone')
                ->setCellValue('D1', 'Plan')
                ->setCellValue('E1', 'Method')
                ->setCellValue('F1', 'Price');
    
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    // Initialize row counter
    $row = 2;
    
    // Fetch and loop through the data
    while ($row_quotation = $mysqli_quotation->fetch_assoc()) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $row_quotation['username']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $row_quotation['email']);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $row_quotation['phone']);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $row_quotation['pname']);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $row_quotation['method']);
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $row_quotation['price']);
        
        $row++;
    }
    
    // Set active sheet index to the first sheet
    $objPHPExcel->setActiveSheetIndex(0);
    
    // Set filename
    $fileName = 'payment-' . date('Ymd', time());
    
    // Save Excel 2007 file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    
    // Setting the header type
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Save to output
    $objWriter->save('php://output');
    
    exit;
}

?>