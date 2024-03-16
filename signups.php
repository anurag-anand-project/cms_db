<?php
$h="localhost";
$u="root";
$p="";
$d="cms_db";
$con=mysqli_connect($h,$u,$p,$d);
if(isset($_POST['singup']))
{
	$f=$_POST['fname'];
	$l=$_POST['lname'];
	$e=$_POST['email'];
	$p=$_POST['password'];
$q=mysqli_query($con,"insert into users(firstname,lastname,email,password,type) values('$f','$l','$e','$p',3)");
if($q)
{
	?>
	<script>
	alert("successfully");
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


?>
