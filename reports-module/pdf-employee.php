<?php
include_once '../classes/class-employee.php';
include '../config/config.php';
require('../fpdf185/fpdf.php');

$employee = new Employee();

class PDF extends FPDF
{
//Page header
function Header(){
	 
	//Arial 12
	$this->SetFont('Arial','',12);
	//Background color
	$this->SetFillColor(200,220,255);
	//Title
	$this->Cell(0,6,"System Users",0,1,'L',1);
	$this->SetFont('Arial','BIU',10);
	$this->Cell(0,6,"Date Generated ".date("Y-m-d h:i:s A")." ",0,1,'L',1);
	$this->SetFont('Arial','',12);
    
   
    //Line break
    $this->Ln(4);
}
function BasicTable($header){
    //Header
    foreach($header as $col)
        $this->Cell(47,7,$col,0,0,'C');
	$this->Ln();
}
//Page footer
function Footer(){
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
// Default Header
//$header=array('Nbr','Name','Access Level','E-Mail');
//$pdf->BasicTable($header);
// Custom Header
$pdf->Cell(10,12,"#",1,0,'C');
$pdf->Cell(30,12,"Full Name",1,0,'C');
$pdf->Cell(35,12,"Email",1,0,'C');
$pdf->Cell(26,12,"Contact No.",1,0,'C');    
$pdf->Cell(58,12,"Address",1,0,'C');
$pdf->Cell(30,12,"type",1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',7);
$count = 1;
if($employee->list_employee() != false){
    foreach($employee->list_employee() as $value){
        extract($value);
        {
                $pdf->Cell(10,12,"  ".$count,0,0,'L');
                $pdf->Cell(30,12,$lastname.', '.$firstname,0,0,'L');
                $pdf->Cell(35,12,$email,0,0,'L');
                $pdf->Cell(35,12,$contactnumber,0,0,'L');
                $pdf->Cell(58,12,$address,0,0,'L');
                $pdf->Cell(50,12,$type,0,0,'L');
                $pdf->Ln(6);
                $count++;
        }
    }
}	

$pdf->SetFont('Arial','I',12);
$pdf->Cell(176,12,"--Nothing Follows--",0,0,'C');
$pdf->Output();
?>