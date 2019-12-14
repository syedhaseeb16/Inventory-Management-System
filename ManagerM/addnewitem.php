<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==5)
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
     
                                            <?php
                                          
                                            if(isset($_SESSION["userAdded"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["userAdded"]; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>
  <title> Add new Item</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add new Item</div>
      <div class="card-body">
        <form action="../checking.php" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="pname" class="form-control" placeholder="Item Name" required="required" autofocus="autofocus">
                  <label for="firstName">Product Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="User id" name="pcode" class="form-control" placeholder="Prodcut Code" required="required">
                  <label for="lastName">Prodcut Code</label>
                </div>
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="punit" class="form-control" placeholder="Product Unit" required="required" autofocus="autofocus">
                  <label for="firstName">Product Unit</label>
                </div>
              </div>
 
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="pdis" class="form-control" placeholder="Product Discription" required="required" autofocus="autofocus">
                  <label for="firstName">Product Discription</label>
                </div>
              </div>





            </div>
          </div>


          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="User id" name="ploc" class="form-control" placeholder="Location in Store" required="required">
                  <label for="lastName">Location in Store</label>
                </div>
              </div>
                <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="minl" class="form-control" placeholder="Min. Limit" required="required" autofocus="autofocus">
                  <label for="firstName">Min. Limit</label>
                </div>
              </div>      


            </div>

                </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="User id" name="maxl" class="form-control" placeholder="Max. Limit" required="required">
                  <label for="lastName">Max. Limit</label>
                </div>
              </div>
            </div>
          </div>











        <button class="btn btn-primary btn-block" type="submit" name="addnewitem">Add new Item</button>
              <a class="btn btn-primary btn-block" href="inventory.php">Cancel</a>
        </form>
      
      </div>
                                      <p align="center" style="color:red;" > 
                                        <?php
                                            
                                            if(isset($_SESSION["item_exist"]))
                                            {
                                                 echo $_SESSION["item_exist"];
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
unset($_SESSION["item_exist"]);
}
 ?>