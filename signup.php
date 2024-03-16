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
    <a href="#"><b><?php echo $_SESSION['system']['name'] ?> - User Sign Up</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="signups.php" method="post">
      <!--<form action="" method="post" onsubmit="return signup()">-->
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="fname" name="fname" onkeypress="myfunction(event)"  required placeholder="First Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		 <div class="input-group mb-3">
          <input type="text" class="form-control" id="lname" name="lname"onkeypress="myfunction(event)" required placeholder="Last Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" required placeholder="Email" pattern="^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pass" name="password" onkeypress="myfunction2(event)" required placeholder="Password">
		
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
         
		<span id="err1"></span>
         
        </div>
		<div class="input-group mb-3">
          <input type="password" class="form-control" id="re_pass" onkeydown="myfunction22()" name="repassword"onkeypress="myfunction1(event)" required placeholder="Re-Password">
		  
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
         
		<span id="err"></span>
         
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="singup" id="but" disabled class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
		<div class="row">
		  <div class="col-8">
        <a href="user_login.php">Signin</a>
		</div>
		</div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
function myfunction(e)
{
var c=String.fromCharCode(e.which);
	
	if(!(/^[A-Za-z]+$/.test(c)))
	{
	
		e.preventDefault();
	}

}
function myfunction1(e)
{
var c=String.fromCharCode(e.which);
	if((document.getElementById('re_pass').value).length>=12)
	{
		e.preventDefault();
	}
	
	if((document.getElementById('re_pass').value).length<8)
	{
		document.getElementById('err').innerHTML="Password should be mim 8 and max 12";
	}
	else
	{
				document.getElementById('err').innerHTML="";

	}
	
	var rp=document.getElementById('re_pass').value;
	var p=document.getElementById('pass').value;
	if((rp+c)==p)
	{
		
		document.getElementById('but').disabled=false;
	}
	else
	{
		document.getElementById('but').disabled=true;
	}	
}

function myfunction22()
{
	
		document.getElementById('but').disabled=true;
	
	
}
function myfunction2(e)
{
var c=String.fromCharCode(e.which);
	if((document.getElementById('pass').value).length>=12)
	{
		e.preventDefault();
	}
	
	if((document.getElementById('pass').value).length<8)
	{
		document.getElementById('err1').innerHTML="Password should be mim 8 and max 12";
	}
	else
	{
				document.getElementById('err1').innerHTML="";

	}
	
		document.getElementById('re_pass').value="";
	
}


</script>
<?php include 'footer.php' ?>

</body>
</html>
