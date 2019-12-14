


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark" background="./img/logi" >

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login </div>
      <div class="card-body">
        <form action="checking.php" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="User ID" name="u_id" required autofocus="autofocus">
              <label for="inputEmail">User ID</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="Login">Login</button>
        </form>
        <p align="center" style="color:red;" > 

                                       <?php
                                       
                                            session_start();
                                            if(isset($_SESSION["error"]))
                                            {
                                                 echo $_SESSION["error"];
                                            }
                                        ?> 
                                      </p>

                                  <p align="center" style="color:red;" > 

                                       <?php
                                       
                                            
                                            if(isset($_SESSION["sessionexp"]))
                                            {
                                                 echo $_SESSION["sessionexp"];
                                            }
                                        ?> 
                                      </p>

                      
        <div class="text-center">
         <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->  
        </div>
      </div>
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
session_destroy();
?>
