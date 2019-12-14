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

  <title> Update Record</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>
  <?php 

                                include('../config.php');
                                $s="select * from users";
                                $q=mysqli_query($conn,$s);
                                while($ro=mysqli_fetch_array($q)){
                                    if ($ro['User_Email_Address']==$_GET['update_profile'] ) {
                                    

                                         // $_SESSION["id"]


                                        $update_name=$ro['User_Name'];
                                        $update_id=$ro['User_Id'];
                                        $update_email=$ro['User_Email_Address'];
                                        $update_password=$ro['User_Password'];
                                        $update_type=$ro['User_Type'];
                                                    if ( $ro['User_Type']==0)
                                                        {$update_user_type="Admin";}
                                                    elseif ( $ro['User_Type']==1)
                                                        {$update_user_type="End User";}
                                                    elseif ( $ro['User_Type']==2)
                                                        {$update_user_type="Supervisor";}
                                                    elseif  ($ro['User_Type']==3)
                                                        {$update_user_type="Store Keeper";}
                                                    elseif  ($ro['User_Type']==4)
                                                        {$update_user_type="Level one Manager";}                  
                                                    elseif  ($ro['User_Type']==5)
                                                        {$update_user_type="2nd Level Manager";}
                                                    elseif  ($ro['User_Type']==6)
                                                        {$update_user_type="3rd Manager";}
                                        $update_segment=$ro['User_Segment'];

                                    }
                                        
                                }
                            ?>  











<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update Record</div>
      <div class="card-body">


        <form action="../checking.php?updateprofile=<?php echo  $_GET['update_profile'] ?>" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="name" class="form-control" placeholder="Full Name" value="<?php echo $update_name; ?>"  required autofocus="autofocus">
                  <label for="firstName">User Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="User id" name="user_id" class="form-control" placeholder="Login ID" value="<?php echo $update_id ?>" required="required">
                  <label for="lastName">User ID</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required="required" value="<?php echo $update_email ?>" >
              <label for="inputEmail">Email address</label>
            </div> </div>
                
   <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required" minlength="8" value="<?php echo $update_password ?>" >
                  <label for="inputPassword">Password</label>
                </div>
              </div>
            
          </div>



          </div>
          <div class="form-group">
            <div class="form-row">
               <div class="col-md-6">
                <div class="form-label-group">
                   <select class="form-control" type="list" name="segment" placeholder="dropdown" value="<?php echo $update_segment ?>" >
                                      <option value="WLS">WLS</option>
                                      <option value="TS">TS</option>
                                      <option value="TCP">TCP</option>
                                      <option value="SWT">SWT </option>
                                      <option value="CT">CT </option>
                                      <option value="MAG">MAG </option>
                                      <option value="STM">STM</option>
                                    </select>
                </div>
              </div>

                  <div class="col-md-6">
                <div class="form-label-group">
                  
                                   <select class="form-control" type="list" name="type" placeholder="dropdown" value="<?php echo $update_segment ?>" >
                                      <option value="0">Admin</option>
                                      <option value="1">End user</option>
                                      <option value="2">Supervisor</option>
                                      <option value="3">Store Keeper</option>
                                      <option value="4">First Manager </option>
                                      <option value="5">2nd Manager </option>
                                      <option value="6">Third Manager </option>
                                    </select>

                </div>
              </div>            
            </div>
          </div>

              <div class="form-group">
            <div class="form-row">
               <div class="col-md-6">
                <div class="form-label-group">
                   <select class="form-control" type="list" name="company" placeholder="dropdown">
                                      
                                      <option value="IWLS">IWLS</option>
                                      <option value="WLE">WLE</option>
                                      </select>
                </div>
              </div>           
            </div>
          </div>




        <button class="btn btn-primary btn-block" type="submit" name="profile_updation">Update</button>
              <a class="btn btn-primary btn-block" href="adminpanel.php">Cancel</a>
        </form>
      
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
}
 ?>