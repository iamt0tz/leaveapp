<?php 
	include('functions.php');
	
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	
	$result = "select * from users where id=".$_SESSION['user']['id']."";
	$result1 = mysqli_query($db, $result);
    
	
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Cover Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/3.1.1/examples/cover/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<!-- top header-->
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
<header class="mb-auto">
  <?php include('usermodal.php'); ?>

  <main class="px-3">
  <?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
	<br /><br /> 	<p class="lead"><h4>Edit Information</h4></p>
	<form method="post" action="edit_info_process.php">
 
		<input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['user']['id'];?>">
		<input type="hidden" class="form-control" name="karaanpass" value="<?php echo $_SESSION['user']['password'];?>">
		<?php echo display_error(); ?>
		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Username</span>
			<input  type="text"  name="username" disabled value="<?php echo $_SESSION['user']['username'];?>" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
		</div>

		<div class="container px-1">
			<div class="row g-2">
				<div class="col-6">
					<div class="p-0">
						
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Firstname</span>
						<input type="text"  name="firstname" value="<?php echo $_SESSION['user']['firstname'];?>" required placeholder="Firstname"  class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
					</div>

					</div>
				</div>
				<div class="col">
					<div class="p-0">
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">Lastname</span>
							<input type="text"  name="lastname" value="<?php echo $_SESSION['user']['lastname'];?>" required placeholder="Lastname" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Email Address</span>
			<input type="email" required name="email" value="<?php echo $_SESSION['user']['email'];?>" placeholder="Email Address" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
		</div>
 

		<div class="container px-1">
			<div class="row g-2">
				<div class="col-6">
					<div class="p-0">
					<div class="input-group mb-3">
						<span class="input-group-text" required id="basic-addon1">New Password</span>
						<input type="password" required name="password_1"   placeholder="Password" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
					</div>

					</div>
				</div>
				<div class="col">
					<div class="p-0">
						<div class="input-group mb-3">
							<span class="input-group-text"  id="basic-addon1">Confirm Password</span>
							<input type="password"  required name="password_2" placeholder="Password" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Gender</span>
			<select name="gender" required id="gender" class="form-select" id="inputGroupSelect01"> 
					<!-- <option disabled selected >Select Type..</option> -->
					<option value="Male">Male</option>
					<option value="Female">Female</option>  
					<option value="Others">Others</option>   
			</select>
		</div>

		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1" >Date of Birth</span>
			<input type="date" name="dob" value="<?php echo $_SESSION['user']['dob'];?>" required class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
		</div>  

		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Department</span>
			<select name="department" required   id="department" class="form-select" id="inputGroupSelect01"> 
					<!-- <option disabled selected >Select Type..</option> -->
					<option value="HR Department">Human Resource</option>
					<option value="IT Department">IT Department</option>  
					<option value="Others">Others</option>   
			</select>
 		</div>

		<div class="input-group mb-3">
		<span class="input-group-text" id="basic-addon1">Address</span>
			<textarea class="form-control" value="<?php echo $_SESSION['user']['address'];?>" required name="address" aria-label="With textarea"></textarea>
		</div>

		<div class="d-grid gap-2"> 
				<button type="submit" class="btn btn-info" name="update_btn">Update Information</button>
  </div>	 
  		 
	</form>
	<footer class="mt-auto text-white-50">
    <!-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> -->
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
  </body>
</html>