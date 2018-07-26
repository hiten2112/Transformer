<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
  <div class="container">
    <p>hello <?=$userRow['userEmail'];?> </p>
  </div>
  <p>Energy table:</p>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Energy</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Solar</td>
          <td id="energy1"><?=?></td>
        </tr>
        <tr>
          <td>Wind</td>
          <td id="energy2"><?=?></td>
        </tr>
        <tr>
          <td>Non-Renewable</td>
          <td id="energy3"><?=?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <input type="text" id="energy" />
<a href="#" onclick="countForEnergy()" class="btn btn-primary">Purchase</a>
<a href="#" onclick="countForEnergy()" class="btn btn-primary">Sale</a>





    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
<script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="./index.js"></script>
</html>
<?php ob_end_flush(); ?>
