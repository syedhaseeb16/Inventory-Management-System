<?php
require('../fpdf17/fpdf.php');

//db connection

include('../config.php');


$sqlq="SELECT * from users_requests WHERE ReqNo = '".$_GET['id']."'"; 

	$result=mysqli_query($conn,$sqlq); 
	$row = mysqli_fetch_array($result);
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,$row['ReqCompany'],0,1);
$pdf->Cell(59	,5,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',11);
$pdf->Cell(20	,5,'Request #',0,0);
$pdf->Cell(110	,5,$_GET['id'],0,0);
$pdf->Cell(26	,5,'Request Date:',0,0);//end of line
$pdf->Cell(24	,5,$_GET['dor'],0,1);


$pdf->Cell(32	,5,'Requester Name:',0,0);
$pdf->Cell(98	,5,$_GET['name'],0,0);
$pdf->Cell(25	,5,'Dead Line',0,0);
$pdf->Cell(24	,5,$_GET['dod'],0,1);




$pdf->Cell(20	,5,'Segment :',0,0);
$pdf->Cell(110	,5,$row['ReqSegment'],0,0);
$pdf->Cell(29	,5,'Request Status:',0,0);//end of line
$pdf->Cell(22	,5,'Pending',0,1);
$pdf->Cell(19	,5,'Project:',0,0);
$pdf->Cell(110	,5,$row['Project'],0,1);
$pdf->Cell(24	,5,'',0,1);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(180	,5,'Requesiton Slip',0,1,'C');
$pdf->Cell(59	,5,'',0,1);//end of line





//invoice contents
$pdf->SetFont('Arial','B',10);

$pdf->Cell(16	,5,'Sr. #',1,0,'C');
$pdf->Cell(	63,5,'Item Name',1,0,'C');
$pdf->Cell(63	,5,'Item Code',1,0,'C');
$pdf->Cell(45	,5,'Req. QTY/Unit',1,1,'C');
//$pdf->Cell(	32,5,'Rec. QTY',1,1,'C');


$pdf->SetFont('Arial','',9);
$sqlq="SELECT * from user_request_item WHERE ReqNo = '".$_GET['id']."'"; 

	$result=mysqli_query($conn,$sqlq); 
	$i=1;
	while($row = mysqli_fetch_array($result))
{


$pdf->Cell(16	,4,$i,1,0,'C');
$pdf->Cell(	63,4,$row['ProductName'],1,0,'C');
$pdf->Cell(63	,4,$row['ProductCode'],1,0,'C');
$pdf->Cell(45	,4,$row['ProductQty']." ".$row['ProductUnit'],1,1,'C'); 
//$pdf->Cell(	32,4,$row['remaining'],1,1,'C');
$i++;

}
$pdf->Cell(59	,10,'',0,1);//end of line


$pdf->Cell(59	,10,'',0,1);//end of line

$pdf->SetFont('Arial','',11);
$pdf->Cell(120	,5,'Issued By:__________________ ',0,0);
$pdf->Cell(26	,5,'Recieved By:__________________',0,1);
$pdf->SetFont('Arial','I',9);
$pdf->Cell(170	,5,'',0,1,'C');
$pdf->Cell(170	,5,'*The purpose of this slip is to check or review your requested items..',0,1,'C');

$pdf->Output();
?>
