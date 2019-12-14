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

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register new User</div>
      <div class="card-body">
        <form action="../checking.php" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="name" class="form-control" placeholder="Full Name" required="required" autofocus="autofocus">
                  <label for="firstName">User Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="User id" name="user_id" class="form-control" placeholder="Login ID" required="required">
                  <label for="lastName">User ID</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div> </div>
                
   <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required" minlength="8">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
            
          </div>



          </div>
          <div class="form-group">
            <div class="form-row">
               <div class="col-md-12">
                <div class="form-label-group">
                   <select class="form-control" type="list" name="segment" placeholder="dropdown">
                                      <option value="WLS">WLS</option>                                   
                                      <option value="TCP">TCP</option>
                                      <option value="SWT">SWT </option>
                                      <option value="CT">CT </option>
                                      <option value="TS">TS</option>
                                      <option value="MAG">MAG </option>
                                      <option value="STM">STM</option>
                                    </select>
                </div>
              </div>



          
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
               <div class="col-md-12">
                <div class="form-label-group">
                   <select class="form-control" type="list" name="company" placeholder="dropdown">
                                       <option value="IWLS">IWLS</option>
                                       <option value="WLE">WLE</option>
                                     
                                      </select>
                </div>
              </div>           
            </div>
          </div>


 <div class="form-group">
            <div class="form-row">
               <div class="col-md-12">
                <div class="form-label-group">
                     <input type="checkbox" name="usertype[]" value="0"> Admin
                    <input type="checkbox" name="usertype[]" value="1"> End User
                    <input type="checkbox" name="usertype[]" value="2" > Supervisor 
                    <input type="checkbox" name="usertype[]" value="3"> StoreKeeper
                    <input type="checkbox" name="usertype[]" value="4"> Manager 1(D)
                    <input type="checkbox" name="usertype[]" value="5" > Manager 2(M)
                     <input type="checkbox" name="usertype[]" value="6" > Manager 3(T)
                </div>
              </div>

                 
            </div>
          </div>










        <button class="btn btn-primary btn-block" type="submit" name="userregistration">Register</button>
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