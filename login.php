<?php 
session_start();

require 'functions.php';
if ( isset($_POST["login"]) ) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM tbllogin WHERE username = '$username'");

	//cek username 
	if (mysqli_num_rows($result) === 1 ) {
		//cek password 
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set sission
			$_SESSION["login"] = true;
			header("location:datauser.php");
			exit;
		}
	}

	$error = true; 
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Halaman Login</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
.form-login{
    margin-top: 13%;
}
.outter-form-login {
    padding: 20px;
    background: #EEEEEE;
    position: relative;
    border-radius: 5px;
}
.inner-login .form-control {
    background: #D3D3D3;
}
h3.title-login {
    font-size: 20px;
    margin-bottom: 20px;
}

.forget {
    margin-top: 20px;
    color: #ADADAD;
}
.btn-custom-green {
    background:	#000000;
    color: #fff;
}
.formlogin{
    margin: -100px auto;
    margin-left: 540px;
    width: 400px;
    padding: -3px;
    border: 4px solid 	#3BB9FF;
    background:	#3E3535;
    position: relative;
}
</style>
<body class="mt-5">
<div class="col-md-4 col-md-offset-4 form-login">

<?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

	<?php if(isset($error)) : ?>
		<p style="color:red; font-style: italic;">username/password salah</p>
	<?php endif; ?>
<section id="formlogin" class="formlogin mb-4">
		  	<div class="container">
		   		 <div class="row pt-4 mb-4">
		    	 	 <div class="col-md text-center">
						<div class="outter-form-login">
					 		<div class="logo-login">
						    <em class="glyphicon glyphicon-user"></em>
						    <img src="img/profile1.png" width="15%" class="rounded-circle  img-thumbnail border: 2px solid 	#307D7E"> 
						     </div>
							<form action="" class="inner-login text-dark" method="post">
									<h3 class="text-center title-login">Login User</h3>
					            <div class="form-group text-dark">
					                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
					            </div>

					            <div class="form-group text-dark">
					                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
					            </div>
					                
					                <input type="submit" name="login" class="btn btn-block btn-custom-green" value="LOGIN" />
					                
					            <div class="text-center forget text-dark">
					                    <p>Forgot Password ?</p>
					            </div>
								</form>
							</div>
						</div>	
					</div>
				</div>
</section>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>