<?php  
session_start();
if(isset($_SESSION["id"])&&isset($_SESSION["type"])==3)
                   {
 
include('../config.php');





if(isset($_POST['Issue'])){
  $rn=$_GET['rqn'];
  $arno  =$_GET['arno'];
  $remarks=$_POST['sremarks'];

 
  
      include('../config.php');
      $s="SELECT * FROM users_requests WHERE ActualReqNo='$arno';";
      $q=mysqli_query($conn,$s); 
      $ro=mysqli_fetch_array($q);  
      $ReqCompany=$ro['ReqCompany'];
                    

                        



$l=0;
$is=0;
$pa=0;
$ni=0;
while ($l < sizeof($_POST['aqty'])) {
  $sqll="UPDATE user_request_item SET IssuedQty='".$_POST['aqty'][$l]."'  WHERE ReqNo = '".$rn."' and ( ProductName = '".$_POST['pname'][$l]."' or  ProductCode = '".$_POST['pcode'][$l]."') "; 
  $conn->query($sqll);

  $pname = $_POST['pname'][$l];
  $pcode = $_POST['pcode'][$l];
  $pqty = $_POST['aqty'][$l];
  $dateofissue =  date("d-m-Y") ;
  $sqls = "INSERT INTO store_outward (doi,product_name,product_code,request_no,qty,remarks,company)
  VALUES ('$dateofissue','$pname','$pcode','$rn','$pqty','$remarks','$ReqCompany')";
  $conn->multi_query($sqls); 

  if($ReqCompany="WLE"){
  $sqlq="SELECT * from current_state_wle WHERE item_name = '".$pname."' or  item_code = '".$_POST['pcode'][$l]."' "  ; 
  $result=mysqli_query($conn,$sqlq); 
  $row = mysqli_fetch_array($result);


    $updatedqty=$row['qty']-$_POST['aqty'][$l];
    $sqlup="UPDATE current_state_wle SET qty='".$updatedqty."' WHERE item_name = '".$_POST['pname'][$l]."' or  item_code = '".$_POST['pcode'][$l]."'" ; 
    $conn->query($sqlup);
    echo $_POST['aqty'][$l];
     $sqlup="UPDATE current_state SET qty='".$updatedqty."' WHERE item_name = '".$_POST['pname'][$l]."' or  item_code = '".$_POST['pcode'][$l]."'" ; 
    $conn->query($sqlup);
    echo $_POST['aqty'][$l];

  }
  elseif ($ReqCompany="IWLS") {
    $sqlq="SELECT * from current_state_iwls WHERE item_name = '".$pname."' or  item_code = '".$_POST['pcode'][$l]."' "  ; 
  $result=mysqli_query($conn,$sqlq); 
  $row = mysqli_fetch_array($result);


    $updatedqty=$row['qty']-$_POST['aqty'][$l];
    $sqlup="UPDATE current_state_iwls SET qty='".$updatedqty."' WHERE item_name = '".$_POST['pname'][$l]."' or  item_code = '".$_POST['pcode'][$l]."'" ; 
    $conn->query($sqlup);
    echo $_POST['aqty'][$l];

    $updatedqty=$row['qty']-$_POST['aqty'][$l];
    $sqlup="UPDATE current_state SET qty='".$updatedqty."' WHERE item_name = '".$_POST['pname'][$l]."' or  item_code = '".$_POST['pcode'][$l]."'" ; 
    $conn->query($sqlup);
    echo $_POST['aqty'][$l];


}





$l++;
  
}





//update user request

$sql="UPDATE users_requests SET FStatus='Issued',DOI='".$dateofissue."',StoreKeeperRemarks='".$remarks."'  WHERE ReqNo = '".$rn."'" ; 
  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully in ussssssssssssssssss";
     // header("LOCATION:place_order.php");

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }




   session_start();
     $_SESSION['isssus'] = "Request processed.";
  header("LOCATION:storekeeper.php");
}
else
{
    $dateofissue =  date("d-m-Y") ;
     $remarks=$_POST['sremarks'];
     $rn=$_GET['rqn'];



$sql="UPDATE users_requests SET FStatus='Closed',DOI='".$dateofissue."',StoreKeeperRemarks='".$remarks."'  WHERE ReqNo = '".$rn."'" ; 
  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully in ussssssssssssssssss";
     // header("LOCATION:place_order.php");

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

 $sqll="UPDATE user_request_item SET IssuedQty='0' WHERE ReqNo = '".$rn."'"; 
  $conn->query($sqll);







      session_start();
     $_SESSION['isssus'] = "Request has been closed";
      header("LOCATION:storekeeper.php");
}



}

      




 ?>

