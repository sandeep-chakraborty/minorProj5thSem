<?php 
require_once 'db_connect.php';
ob_start();
session_start();
$x=$_GET['id'];
?>
<?php
$sid="";
$item="";
$dfrom="";
$doa="";
$qty="";
$price="";
$description="";
 $mysqli = new mysqli("localhost",'root','','stocks');
if(isset($_GET['x']))
       $x=$_GET['x'];
    else 

 $sql = "SELECT * FROM `managestock`WHERE id='$x'";

     $search_result = mysqli_query($mysqli, $sql);
    
    while($row=mysqli_fetch_array($search_result))
    {
                        $id=$row['id'];
                        $sid=$row['sid'];
                        $item=$row['item'];
                        $dfrom=$row['dfrom'];
                        $doa=$row['doa'];
                        $qty=$row['qty'];
                        $price=$row['price'];
                        $description=$row['description'];
                      }
                        
?>
<?php 

$n = 3;
function getRandomString($n)
{
  $characters = '0123456789';
  $randomString = 'S';

  for ($i = 0; $i < $n; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
  }

  return $randomString;
}
?>
<?php  
$result='';
  if(isset($_POST['insert'])){
    
    extract($_POST);
       
    $mysqli = new mysqli("localhost",'root','','stocks');
    $sql = "INSERT INTO `sale`(`sid`, `stock_id`, `bname`, `bshop`, `dop`, `rqty`, `tprice`, `phone`, `bemail`, `baddress`) VALUES ('$sid','$stock_id','$bname','$bshop','$dop','$rqty','$tprice','$phone','$bemail','$baddress')";
    $res = $mysqli->query($sql);
          header("location: invoice.php");
          $_SESSION['sid'] = $sid;
         //$result='<div class="alert alert-success">Item Sold Successfully</div>';   
}
?>
<?php 
if(isset($_POST['insert'])) 
    { 
 extract($_POST);
       
    $mysqli = new mysqli("localhost",'root','','stocks');

           $UpdateQuery="UPDATE `managestock` set qty='$_POST[left]' WHERE sid='$_POST[stock_id]'";
        $res1 = $mysqli->query($UpdateQuery);
       //header("location:stdhome.php");
    };

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Stocks Manage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Bramahputra Computers</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <a class="nav-link collapsed" href="stock.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manage Stocks</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="stock.php">
              <i class="bi bi-circle"></i><span>Add Stocks</span>
            </a>
          </li>
          <li>
            <a href="viewstocks.php">
              <i class="bi bi-circle"></i><span>Update Stocks</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="sale.php">
          <i class="bi bi-question-circle"></i>
          <span>Manage Sales</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="report.php">
          <i class="bi bi-question-circle"></i>
          <span>Sale Report</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-file-earmark"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sale Information</h1>
      <strong><?php echo $result; ?></strong>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Item Information</h5>
              <form action="" method="POST" onsubmit="return validateForm()">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Stock ID</label>
      <input type="text" readonly class="form-control" id="stock_id" name="stock_id" value="<?php echo $sid ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Item Name</label>
      <input type="text" class="form-control" id="item" name="item" value="<?php echo $item ?>"readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Dispatch From</label>
      <input type="text" class="form-control" id="dfrom" name="dfrom" value="<?php echo $dfrom ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date of Arrival</label>
      <input type="text" class="form-control" id="doa" name="doa" value="<?php echo $doa ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Quantity</label>
      <input type="text" class="form-control" id="qty" name="qty" value="<?php echo $qty ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Price</label>
      <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Description</label>
    <textarea class="form-control" readonly id="description" name="description"><?php echo $description; ?></textarea>
  </div>
  
<h5 class="card-title">Customer Information</h5>
<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Sale ID</label>
      <input type="text" readonly class="form-control" id="sid" name="sid" value="<?php echo getRandomString($n); ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Buyer Name</label>
      <input type="text" class="form-control" id="bname" name="bname">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Buyer's Shop Name</label>
      <input type="text" class="form-control" id="bshop" name="bshop">
    </div>
    <div class="form-group col-md-6">
    <label for="inputPassword4">Date of Purchase *</label>
      <input type="date" class="form-control" id="dop" name="dop" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputEmail4">Quantity Required *</label>
    <input type="number" class="form-control" id="rqty" name="rqty" onchange="calculate();" required min="1">
      <input type="hidden" name="left" id="left"> 
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total Price</label>
      <input type="text" readonly class="form-control" id="tprice" name="tprice">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputEmail4">Phone Number *</label>
    <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email"  class="form-control" id="bemail" name="bemail">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Buyer's Address</label>
    <textarea class="form-control" id="baddress" name="baddress"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="insert">Save</button>
</form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      <strong><span>Stocks Management System</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script>
    function calculate() {
        var myBox1 = document.getElementById('price').value; 
        var myBox2 = document.getElementById('rqty').value;
        var myBox3 = document.getElementById('qty').value; 
        var result = document.getElementById('result'); 
        var myResult = myBox1 * myBox2;
        document.getElementById('tprice').value = myResult;
        var myResult1 = myBox3 - myBox2;
        document.getElementById('left').value = myResult1;
    }

    function validateForm() {
        var dop = document.getElementById('dop').value;
        var rqty = document.getElementById('rqty').value;
        var phone = document.getElementById('phone').value;

        if (dop === "") {
            alert("Date of Purchase is required");
            return false;
        }

        if (rqty === "" || isNaN(rqty) || parseInt(rqty) <= 0) {
            alert("Quantity Required must be a positive number");
            return false;
        }

        if (phone === "" || !/^\d{10}$/.test(phone)) {
            alert("Phone Number must be a 10-digit number");
            return false;
        }

        return true;
    }
</script>
</body>

</html>