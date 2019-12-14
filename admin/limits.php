<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==0)
                          {          


$ct=time();
if($ct>$_SESSION["timer"])
{
session_start();
$_SESSION["sessionexp"]="Session Expired";
header("LOCATION:../index.php");
}
 ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Registration</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">


<?php                     

include('../config.php');
  $s="select * from limits";
  $q=mysqli_query($conn,$s); 

  $ro=mysqli_fetch_array($q);
  $lower=$ro["ist"];
  $middle=$ro["second"];
  $upper=$ro["third"];

  ?>











</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Set Purchase Limits for Managers</div>
      <div class="card-body">
        <form action="../checking.php" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="lower" class="form-control" placeholder="Full Name" required="required" value="<?php  echo $lower;  ?>" autofocus="autofocus">
                  <label for="firstName">Lower Limit</label>
                </div>
              </div>

            </div>
          </div>

                    <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="middle" class="form-control" placeholder="Full Name" value="<?php  echo $middle;  ?>" required="required" autofocus="autofocus">
                  <label for="firstName">Middle  Limit</label>
                </div>
              </div>
            </div>
          </div>

            <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="upper" class="form-control" placeholder="Full Name" required="required" value="<?php  echo $upper;  ?>" autofocus="autofocus">
                  <label for="firstName">Upper Limit</label>
                </div>
              </div>

            </div>
          </div>


        <button class="btn btn-primary btn-block" type="submit" name="limits">Set</button>
              <a class="btn btn-primary btn-block" href="adminpanel.php">Cancel</a>
        </form>
      </div>
                                      <p align="center" style="color:red;" > 
                                        <?php
                                            
                                            if(isset($_SESSION["email_exist"]))
                                            {
                                                 echo $_SESSION["email_exist"];
                                            }
                                        ?> </p>


    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
<?php  
unset($_SESSION["email_exist"]);
}
 ?>