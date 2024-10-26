
   <?php
   require_once 'db_connect.php';
   ob_start();
   session_start();
   $sid = $_SESSION['sid'];

   require_once 'db_connect.php';
   $con = $connect;
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    
    $bname="";
    $bshop="";
    $dop="";
    $rqty="";
    $tprice="";
    $phone="";
    $bemail="";
    $baddress="";
    $item="";
    $price="";
    
    if(isset($_GET['sid']))
       $sid=$_GET['sid'];
    else 
      
    
     $sql = "SELECT * FROM `sale` INNER JOIN `managestock` ON sale.stock_id = managestock.sid WHERE sale.sid='$sid'";
     $search_result = mysqli_query($con, $sql);
    
    while($row=mysqli_fetch_array($search_result))
    {
    $sid=$row['sid'];
    $bname=$row['bname'];
     $dop=$row['dop'];
    $rqty=$row['rqty'];
    $tprice=$row['tprice'];
    $phone=$row['phone'];
    $bemail=$row['bemail'];
    $baddress=$row['baddress'];
    $item=$row['item'];
    $price=$row['price'];
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Brahmaputra Computers</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
        body{margin-top:20px;
background-color:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
    </style>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="invoice-title">
<h4 class="float-end font-size-15">Invoice <?php echo $sid; ?> <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
<div class="mb-4">
<h2 class="mb-1 text-muted">Brahmaputra Computer & Distributers</h2>
</div>
<div class="text-muted">
<p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
<p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfc7c6c5ff86878891dcd0d2">[email&#160;protected]</a></p>
<p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
</div>
</div>
<hr class="my-4">
<div class="row">
<div class="col-sm-6">
<div class="text-muted">
<h5 class="font-size-16 mb-3">Billed To:</h5>
<h5 class="font-size-15 mb-2"><?php echo $bname; ?></h5>
<p class="mb-1"><?php echo $baddress ?></p>
<p class="mb-1"><?php echo $bemail; ?></p>
<p><?php echo $phone; ?></p>
</div>
</div>

<div class="col-sm-6">
<div class="text-muted text-sm-end">
<div>
<h5 class="font-size-15 mb-1">Invoice No:</h5>
<p><?php echo $sid; ?></p>
</div>
<div class="mt-4">
<h5 class="font-size-15 mb-1">Invoice Date:</h5>
<p><?php echo $dop; ?></p>
</div>
</div>
</div>

</div>

<div class="py-2">
<h5 class="font-size-15">Order Summary</h5>
<div class="table-responsive">
<table class="table align-middle table-nowrap table-centered mb-0">
<thead>
<tr>
<th style="width: 70px;">No.</th>
<th>Item</th>
<th>Price</th>
<th>Quantity</th>
<th class="text-end" style="width: 120px;">Total</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">01</th>
<td>
<div>
<h5 class="text-truncate font-size-14 mb-1"><?php echo $item; ?></h5>
</div>
</td>
<td><?php echo $price; ?></td>
<td><?php echo $rqty; ?></td>
<td class="text-end"><?php echo $tprice; ?></td>
</tr>
<tr>
<th scope="row" colspan="4" class="border-0 text-end">Total</th>
<td class="border-0 text-end"><h4 class="m-0 fw-semibold"><?php echo $tprice; ?></h4></td>
</tr>

</tbody>
</table>
</div>
<div class="d-print-none mt-4">
<div class="float-end">
<a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
<a href="#" class="btn btn-primary w-md" data-bs-toggle="modal" data-bs-target="#emailModal">Send</a>
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emailModalLabel">Send Invoice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="emailForm">
          <div class="mb-3">
            <label for="emailInput" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailInput" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendEmailButton">Send</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    
</script>
<script type="text/javascript">
  document.getElementById('sendEmailButton').addEventListener('click', function() {
    if (email) {
      var subject = encodeURIComponent('Invoice ' + <?php echo json_encode($sid); ?>);
      var body = encodeURIComponent('Please find attached the invoice. You can download it from the following link: [PDF_LINK]');
      var mailtoLink = 'https://mail.google.com/mail/?view=cm&fs=1&to=' + email + '&su=' + subject + '&body=' + body;
      window.open(mailtoLink, '_blank');
    }
  });
</script>
</body>
</html>
