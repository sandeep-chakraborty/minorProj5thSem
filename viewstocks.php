<?php 
require_once 'db_connect.php';
$result=""; 
$host="localhost";
$user="root";
$password="";
$database="stocks";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
    $con=mysqli_connect($host, $user, $password, $database);
}catch (Exception $ex){
    echo'Error';
}

// Handle update operation
if(isset($_POST['update']))
{
    extract($_POST);
    $sql = "UPDATE `managestock` SET `item`='$item', `dfrom`='$dfrom', `doa`='$doa', `qty`='$qty', `price`='$price', `description`='$description' WHERE `sid`='$sid'";
    $res = $con->query($sql);
    if($res){
        // $result='<div class="alert alert-success">Data Updated Successfully</div>';
    } else {
        $result='<div class="alert alert-danger">Error updating data: ' . $con->error . '</div>';
    }
}

if(isset($_POST['delete']))

  {
      extract($_POST);  
    $sql = "DELETE FROM `managestock` WHERE id='$id'";
    $res = $con->query($sql);
    if($res){
      //$msg="Send Successful";
        //header("location: index.php");
        $result='<div class="alert alert-success">Data Deleted Succesfully</div>';
    }else{
      echo "Data not Inserted";;
    }
  }

  
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
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>

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
          <a class="nav-link collapsed" href="dashboard.php">
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
      <h1>Edit Stocks Statament</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Data</h5>
             
 <strong><?php echo $result; ?></strong>
              <!-- Table with stripped rows -->
              <table id="myTable" style="font-size:10px;">

                <thead>
                  <tr>
                    
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Dispatch From</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Date of Arrival</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action 1</th>
                    <th>Action 2</th>
                  </tr>

                </thead>
             
                <tbody>
                   <?php
             $host="localhost";
             $user="root";
             $password="";
             $database="stocks";
             mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
             try{
                 $con=mysqli_connect($host, $user, $password, $database);
             }catch (Exception $ex){
                 echo'Error';
             }
                     
                   
                    
                     $res="SELECT * FROM `managestock`";
                     $search_result = mysqli_query($con, $res);
                 ?>
                 <?php
       
      
           while($row=mysqli_fetch_array($search_result))
           {
               ?>
                  <tr>
                   <td><?php echo $row['sid']; ?></td>
                   <td><?php echo $row['item']; ?></td>
                   <td><?php echo $row['dfrom']; ?></td>
                   <td><?php echo $row['doa']; ?></td>
                   <td><?php echo $row['qty']; ?></td>
                   <td><?php echo $row['price']; ?></td>
                   <td><?php echo $row['description']; ?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?php echo $row['id'] ?>">
  Update
</button>
<div class="modal fade" id="exampleModal-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-<?php echo $row['id'] ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-<?php echo $row['id'] ?>">Update Stocks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="viewstocks.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
    
         
             <div class="form-group">
            <label for="in">Item ID</label><br>
            <input type="hidden" name="sid" id="sid-<?php echo $row['sid'] ?>" value="<?php echo $row['sid'] ?>">
            
       </div> <!-- /form-group-->            
          
      <div class="form-group">
            <label for="qty">Item Name: </label><br>
              <input type="text" class="form-control"  name="item" id="item-<?php echo $row['sid'] ?>" value="<?php echo $row['item'] ?>"><br>
      </div>
       <div class="form-group">
            <label for="qty">Dispatch From: </label><br>
              <input type="text" class="form-control"  name="dfrom" id="dfrom-<?php echo $row['sid'] ?>" value="<?php echo $row['dfrom'] ?>"><br>
      </div>
      <div class="form-group">
            <label for="qty">Date of Arrival: </label><br>
              <input type="date" class="form-control"  name="doa" id="doa-<?php echo $row['sid'] ?>" value="<?php echo $row['doa'] ?>"><br>
      </div>
      <div class="form-group">
            <label for="qty">Quantity: </label><br>
              <input type="text" class="form-control"  name="qty" id="qty-<?php echo $row['sid'] ?>" value="<?php echo $row['qty'] ?>"><br>
      </div>
      <div class="form-group">
            <label for="qty">Price: </label><br>
              <input type="text" class="form-control"  name="price" id="price-<?php echo $row['sid'] ?>" value="<?php echo $row['price'] ?>"><br>
      </div>
      
<div class="form-group">
            <label for="qty">Description: </label><br>
              <textarea name="description" class="form-control"  id="description-<?php echo $row['id'] ?>"><?php echo $row['description']; ?></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="update" class="btn btn-primary" value="Update">
    
      </div>
    </div>
  </form>
      </div>
     
   
</div>

 
              </div></td>
<form action="" method="POST"> 
<input type="hidden" class="form-control" name="id" id="id-<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>"> 
<td><button type="submit" class="btn btn-danger" name="delete" id="delete-<?php echo $row['id'] ?>">Delete</button></td>
</form>

                  </tr>
                  <?php } ?>
                </tbody>
              
              </table>
              <!-- End Table with stripped rows -->

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
  <script src="assets/js/main.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>

</html>