<?php
require('../fpdf17/fpdf.php');

//db connection
$po=$_GET['idd'];

include('../config.php');
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',22);

//Cell(width , height , text , border , end line , [align] )
$cn="SELECT * from orders WHERE fullpo = '".$po."'"; 

  $cnr=mysqli_query($conn,$cn); 
  $cnrs = mysqli_fetch_array($cnr);



$pdf->Cell(120  ,6,$cnrs['segment'],0,0);


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',9);
$pdf->Cell(39 ,5,'PURCHASE ORDER NO:',0,0);
$pdf->Cell(40  ,5,$po,0,1);
$pdf->Cell(162 ,5,'PURCHASE ORDER DATE:',0,0,'R');//end of line
$pdf->Cell(25 ,5,$cnrs['doo'],0,1);


$pdf->SetFont('Arial','B',12);
$pdf->Cell(190 ,6,'PURCHASE ORDER',1,1,'C');

if($cnrs['segment']=='IWLS'){


$vinfo="SELECT * from vendor WHERE company_name = '".$cnrs['vendor']."'"; 
  $vin=mysqli_query($conn,$vinfo); 
  $vendorin = mysqli_fetch_array($vin);



$contactno= $vendorin['contactno'];
$emailaddress=$vendorin['company_email'];;
$address=$vendorin['address'];;
$cpn=$vendorin['person_name'];

$pdf->SetFont('Arial','B',9);
$pdf->Cell(120 ,5,$cnrs['vendor'],0,1);




$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,$address,0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,'Phone :'.$contactno,0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,'Email:'.$emailaddress,0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,'Contact:'.$cpn,0,1);



$pdf->SetFont('Arial','B',9);
$pdf->Cell(120 ,5,'SOLD TO: ',0,0);
$pdf->Cell(98 ,5,"SHIP TO:",0,1);
$pdf->SetFont('Arial','B',9);





$pdf->Cell(120 ,3,'Integrated Wireline Logging Services',0,0);
$pdf->Cell(98 ,3,"Integrated Wireline Logging Services",0,1);            
          
            
$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Office No. 6, 2nd Floor, Al-Rehman Mall, G-11 Markaz ",0,0);
$pdf->Cell(98 ,3,"Ghaffar khan, Garden Road, Sarai Kharbooza,",0,1);



$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Islamabad-Pakistan ",0,0);
$pdf->Cell(98 ,3,"Tarnol, Islamabad-Pakistan",0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Phone: +92 51 8733863 ",0,0);
$pdf->Cell(98 ,3,"Phone: +92 51 8733863 ",0,1);



$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Fax: +92 51 8733864 ",0,0);
$pdf->Cell(98 ,3,"Fax: +92 51 8733864  ",0,1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Email: rizwan@iwsas.com    ",0,0);
$pdf->Cell(98 ,3,"Email: khalid@iwsas.com",0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Contact: Muhammad Rizwan Akhlaq  ",0,0);
$pdf->Cell(98 ,3,"Contact: Mr. Mian Khalid Jan  ",0,1);

  }
          



if($cnrs['segment']=='WLE'){


$vinfo="SELECT * from vendor WHERE company_name = '".$cnrs['vendor']."'"; 
  $vin=mysqli_query($conn,$vinfo); 
  $vendorin = mysqli_fetch_array($vin);



$contactno= $vendorin['contactno'];
$emailaddress=$vendorin['company_email'];;
$address=$vendorin['address'];;
$cpn=$vendorin['person_name'];

$pdf->SetFont('Arial','B',9);
$pdf->Cell(120 ,5,$cnrs['vendor'],0,1);




$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,$address,0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,'Phone :'.$contactno,0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,'Email:'.$emailaddress,0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,'Contact:'.$cpn,0,1);



$pdf->SetFont('Arial','B',9);
$pdf->Cell(120 ,5,'SOLD TO: ',0,0);
$pdf->Cell(98 ,5,"SHIP TO:",0,1);
$pdf->SetFont('Arial','B',9);





$pdf->Cell(120 ,3,'Well Logging Energy Technology (Pvt) Ltd.',0,0);
$pdf->Cell(98 ,3,"Well Logging Energy Technology (Pvt) Ltd.",0,1);            
          
            
$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Office No. 6, 2nd Floor, Al-Rehman Mall, G-11 Markaz ",0,0);
$pdf->Cell(98 ,3,"Ghaffar khan, Garden Road, Sarai Kharbooza,",0,1);



$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Islamabad-Pakistan ",0,0);
$pdf->Cell(98 ,3,"Tarnol, Islamabad-Pakistan",0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Phone: +92 51 8733863 ",0,0);
$pdf->Cell(98 ,3,"Phone: +92 51 8733863 ",0,1);



$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Fax: +92 51 8733864 ",0,0);
$pdf->Cell(98 ,3,"Fax: +92 51 8733864  ",0,1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Email: rizwan@iwsas.com    ",0,0);
$pdf->Cell(98 ,3,"Email: khalid@iwsas.com",0,1);


$pdf->SetFont('Arial','',8);
$pdf->Cell(120 ,3,"Contact: Muhammad Rizwan Akhlaq  ",0,0);
$pdf->Cell(98 ,3,"Contact: Mr. Mian Khalid Jan  ",0,1);

  }
                                                        

                                                                         


if($cnrs['ordertype']=='local'){

$sqlq="SELECT * from order_item_detail WHERE order_no = '".$po."'"; 

  $result=mysqli_query($conn,$sqlq); 
  $row = mysqli_fetch_array($result);

$pdf->Cell(59 ,5,'',0,1);//end of line
//invoice contents
$pdf->SetFont('Arial','B',8);

$pdf->Cell(10 ,5,'Sr. #',1,0,'C');
$pdf->Cell( 23,5,'Item Name',1,0,'C');
$pdf->Cell(23 ,5,'Part #',1,0,'C');
$pdf->Cell(65 ,5,'Discription',1,0,'C');
$pdf->Cell(15 ,5,'QTY',1,0,'C');
$pdf->Cell(15 ,5,'UOM',1,0,'C');
$pdf->Cell( 20,5,'Unit PC.(Pkr)',1,0,'C');
$pdf->Cell( 20,5,'Total PC.(Pkr.) ',1,1,'C');


$pdf->SetFont('Arial','',8);
$sqlq="SELECT * from order_item_detail WHERE order_no = '".$po."' "; 

  $result=mysqli_query($conn,$sqlq); 
  $i=1;
  $sum=0;
  while($row = mysqli_fetch_array($result))
{

if($row['order_no']==$po){

  
  $dis="SELECT * from current_state WHERE item_code = '".$row['pcode']."' "; 
  $disr=mysqli_query($conn,$dis); 
  $dsr = mysqli_fetch_array($disr);





$pdf->Cell(10 ,4,$i,1,0,'C');
$pdf->Cell( 23,4,$row['pname'],1,0,'L');
$pdf->Cell(23 ,4,$row['pcode'],1,0,'L');
$pdf->SetFont('Arial','',6);
$pdf->Cell(65 ,4,$dsr['Discreption'],1,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 15,4,$row['pqty'],1,0,'C');
$pdf->Cell( 15,4,$row['unit'],1,0,'C');

$pdf->Cell(20 ,4,'Rs.',$row['unitprice'],1,0,'C');
$total=$row['pqty']*$row['unitprice'];
$pdf->Cell( 20,4,'Rs.'.$total,1,1,'C');
$sum=$sum+$total;
$i++;
}
}
 
//invoice contents


$pdf->Cell(151 ,5,'Total Amount in Pkr',1,0,'C');
$pdf->Cell(40 ,5,'Rs.'.$sum,1,0,'C');
}


if($cnrs['ordertype']=='International'){

$sqlq="SELECT * from order_item_detail WHERE order_no = '".$po."'"; 

  $result=mysqli_query($conn,$sqlq); 
  $row = mysqli_fetch_array($result);

$pdf->Cell(59 ,5,'',0,1);//end of line
//invoice contents
$pdf->SetFont('Arial','B',8);

$pdf->Cell(10 ,5,'Sr. #',1,0,'C');
$pdf->Cell( 23,5,'Item Name',1,0,'C');
$pdf->Cell(23 ,5,'Part #',1,0,'C');
$pdf->Cell(65 ,5,'Discription',1,0,'C');
$pdf->Cell(15 ,5,'QTY',1,0,'C');
$pdf->Cell(15 ,5,'UOM',1,0,'C');
$pdf->Cell( 20,5,'Unit PC.($)',1,0,'C');
$pdf->Cell( 20,5,'Total ($) ',1,1,'C');


$pdf->SetFont('Arial','',8);
$sqlq="SELECT * from order_item_detail WHERE order_no = '".$po."' "; 

  $result=mysqli_query($conn,$sqlq); 
  $i=1;
  $sum=0;
  while($row = mysqli_fetch_array($result))
{

if($row['order_no']==$po){

  
  $dis="SELECT * from current_state WHERE item_code = '".$row['pcode']."' "; 
  $disr=mysqli_query($conn,$dis); 
  $dsr = mysqli_fetch_array($disr);





$pdf->Cell(10 ,4,$i,1,0,'C');
$pdf->Cell( 23,4,$row['pname'],1,0,'L');
$pdf->Cell(23 ,4,$row['pcode'],1,0,'L');
$pdf->SetFont('Arial','',6);
$pdf->Cell(65 ,4,$dsr['Discreption'],1,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 15,4,$row['pqty'],1,0,'C');
$pdf->Cell( 15,4,$row['unit'],1,0,'C');

$pdf->Cell(20 ,4,'$ '.$row['unitprice'],1,0,'C');
$total=$row['pqty']*$row['unitprice'];
$pdf->Cell( 20,4,'$ '.$total,1,1,'C');
$sum=$sum+$total;
$i++;
}
}
 
//invoice contents


$pdf->Cell(151 ,5,'Total Amount in USD',1,0,'C');
$pdf->Cell(40 ,5,'$ '.$sum,1,0,'C');
}













$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','B',8);
$pdf->Cell(190 ,5,'PREFERRED TRANSPORT: ',0,1,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell( 75,4,$cnrs['ptr'],0,0);

$pdf->Cell( 75,4,'',0,0);

if($cnrs['ordertype']=='local'){
$pdf->Cell(75 ,4,'CURRENCY: PKR ',0,1);
 }
 if($cnrs['ordertype']=='International'){
$pdf->Cell(75 ,4,'CURRENCY: USD ',0,1);
 }



$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','B',8);
$pdf->Cell(190 ,5,'INVOICING INSTRUCTIONS: ',0,1,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 67,4,'1. Eight numeric digit "HS Code" of the Items',0,0);
$pdf->Cell(45 ,4,'2. Country of Origin',0,0);
$pdf->Cell( 60,4,'3. Delivery Terms: to be mentioned clearly.',0,1);
$pdf->Cell(67 ,4,'4. Payment Terms: "advance" or "as agreed"',0,0);
$pdf->Cell(45 ,4,'5. Complete banking details ',0,0);
$pdf->Cell(75 ,4,'6. Invoice "stamped" & "signed"   ',0,1);


$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','B',8);
$pdf->Cell(190 ,5,'DISTRIBUTION:  ',0,1,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 67,4,'1- Original PO to Supplier ',0,0);
$pdf->Cell(45 ,4,'2- PO Copy to Finance ',0,0);
$pdf->Cell( 60,4,'3- Dispatch original Shipping Invoice & Packing List to consignee ',0,1);
//$pdf->line(1,1,0,190);


$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','B',8);
$pdf->Cell(190 ,5,' COMMENTS :',0,1,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 90,4,'1-  Acknowledge the Purchase Order when received',0,0);
$pdf->Cell(90 ,4,'2- Dont send the material without GREEN LIGHT ',0,1);
$pdf->Cell( 90,4,'3- Inform before hand over the consignment to Freight Forwarder ',0,0);
$pdf->Cell(90 ,4,'4- Paste the INVOICE & PACKING LIST at each box of consignment ',0,1);
                                                

$pdf->Cell(59 ,5,'',0,1);//end of line
$ac="SELECT * from approval_chain WHERE order_no = '".$po."'"; 

  $apc=mysqli_query($conn,$ac); 
  $apcn = mysqli_fetch_array($apc);
  $m1=$apcn['m1'];
  $m2=$apcn['m2'];
  $m3=$apcn['m3'];




$pdf->SetFont('Arial','B',8);
$pdf->Cell(190 ,5,'APPROVED BY:  ',0,1,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 65,4,'1-Manager I :'.$m1 ,0,0);
if($m2!='0'){
$pdf->Cell(65 ,4,'2-Manager II :'.$m2,0,0);
}
if($m3!='0'){
$pdf->Cell( 65,4,'3-Manager III :'.$m3,0,1);
 }
//$pdf->line(1,1,0,190);










                                             
                                             
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','B',8);
$pdf->Cell(160 ,5,' DELIVERY SCHEDULE  :',0,0,'L');
$pdf->Cell(90 ,4,' PAYMENT TERMS:  :',0,1,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(160 ,5, $cnrs['ds'] ,0,0,'L');
$pdf->Cell(90 ,4,$cnrs['pterm'] ,0,1,'L');
                                                                      
                                       
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','B',6);
$pdf->Cell(17 ,5,' SERVICE LINE  :',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 100,5,'  Coiled Tubing  :',0,0,'L');

$pdf->SetFont('Arial','B',6);
$pdf->Cell(17 ,5,' REQUESTED BY: ',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell( 35,5, $cnrs['pterm'],0,1,'L');
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','',8);
$pdf->Cell( 35,3,'_________________________',0,1,'L');
$pdf->Cell( 35,5,'Khalid Jan(Country Manager)',0,1,'L');

            



                  
                                                                     
                                                                                                   
   
                                             
     
                                                    
                                                     














$pdf->SetFont('Arial','I',7);
$pdf->Cell(170  ,5,'*This is Computerized Generated Slip and no Need of Signature.',0,1,'C');





$pdf->Output();
?>
