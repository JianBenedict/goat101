<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-user-report.xls");

include_once '../classes/class-employee.php';
include '../config/config.php';

$employee = new Employee();



echo '#' . "\t" . 'First Name' . "\t" . 'Last Name' . "\t" . 'Email' . "\t" . 'Contact Number' ."\t" . 'Address' ."\t" . 'Position' ."\n";

$count = 1;
if($employee->list_employee() != false){
    foreach($employee->list_employee() as $value){
        extract($value);
  
            echo $EmployeeId . "\t" . $firstname. "\t " .$lastname . "\t" . $email . "\t" . $contactnumber ."\t" . $address ."\t" . $type . "\n";
            
                $count++;
    }
}