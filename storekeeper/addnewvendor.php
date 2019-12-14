<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==3)
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

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add new Vendor</div>
      <div class="card-body">
        <form action="../checking.php" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="cname" class="form-control" placeholder="Full Name" required="required" autofocus="autofocus">
                  <label for="firstName">Company Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="User id" name="pname" class="form-control" placeholder="Login ID" required="required">
                  <label for="lastName">Person Name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="cemail" placeholder="Email address" required="required">
              <label for="inputEmail">Email Address</label>
            </div> </div>
                
   <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="inputPassword" name="ccontact" class="form-control" placeholder="Password" required="required" minlength="8">
                  <label for="inputPassword">Contact #</label>
                </div>
              </div>
            
          </div>

          </div>
                    <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="caddress" class="form-control" placeholder="Full Name" required="required" autofocus="autofocus">
                  <label for="firstName">Address</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="User id" name="cdarea" class="form-control" placeholder="Login ID" required="required">
                  <label for="lastName">Dealing Area</label>
                </div>
              </div>
            </div>
          </div>





        <button class="btn btn-primary btn-block" type="submit" name="vendorregistration">Add </button>
              <a class="btn btn-primary btn-block" href="vendor.php">Cancel</a>
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