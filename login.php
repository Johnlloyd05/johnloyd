<?php
 
 session_start();
require('db.php');



	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$email = stripslashes($email);
		$email = addslashes($email);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);	
		$str = "SELECT * FROM reg WHERE email='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))>0) 
		{
						
			$row=mysqli_fetch_array($result);
			$_SESSION['email']=$email;
			$_SESSION['id']=$row['id'];
			$_SESSION['name']=$row['name'];
			$_SESSION['email']=$row['email'];
			$_SESSION['password']=$row['password'];
			$_SESSION['address']=$row['address'];
			$_SESSION['user_type'] = $row['user_type'];

			if($_SESSION['user_type']=='admin'){
				?>
				<script type="text/javascript">
					alert("Hello Admin!");
					window.location = "adminhome.php";
				</script>
				<?php
			}elseif($_SESSION['user_type']=='user'){
				?>
				<script type="text/javascript">
					alert("Hello User!");
					window.location = "Home.php";
				</script>
				<?php	
		}else{
							?>
				<script type="text/javascript">
					alert("wrong password or username");
					window.location = "logout.php";
				</script>
				<?php

		}
		
	}else{
							?>
				<script type="text/javascript">
					alert("wrong password or username");
					window.location = "logout.php";
				</script>
				<?php
}
}	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>ONLINE SHOPPING SYSTEM</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(pic1.jpg) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans;">Login to </h5><h4 style="font-family: Noto Sans;">ONLINE SHOP SYSTEM</h4></center><br>
							<form method="POST" action="login.php" enctype="multipart/form-data" >

								<div class="form-group">
									<label>Enter Your
									 Email:</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Enter Your Password:
										
									</label>
									<input type="password" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">

									<button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="reg.php">Register</a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>