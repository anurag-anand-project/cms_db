<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<?php include 'header.php' ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><?php echo $_SESSION['system']['name'] ?> - Update Password</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="" method="post" id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		<div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="upassword" class="btn btn-primary btn-block">Update Password</button>
          </div>
          <!-- /.col -->
        </div>
		<div class="row">
		  <div class="col-8">
        <a href="signup.php">Signup</a>
		</div>
		
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php 
$h="localhost";
$u="root";
$p="";
$db="cms_db";
$con=mysqli_connect($h,$u,$p,$db);
if(isset($_POST['upassword']))
{
$e=$_POST['email'];
$pa=$_POST['password'];

$q=mysqli_query($con,"update users set password='$pa' where email='$e'");
if($q)
{
	?>
<script>
alert("successful");
</script>
<?php
}
else
{
	?>
	<script>
	alert("try again");
	</script>
	<?php
}
}
include 'footer.php' ?>

</body>
</html>
