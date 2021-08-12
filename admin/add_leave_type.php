<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Cover Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

    

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
  <?php include('../modal.php'); ?>
  

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



 
    <p class="lead"><br /><br />   <br /><br /> 
     
    </p>
    <p class="lead">Add Leave Type</p>
    
<form method="post" action="">

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Leave Type</span>
    <input  type="text" required name="leave_type" placeholder="Leave Type" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Description</span>
    <input  type="text" required name="leave_description" placeholder="Description" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="d-grid gap-2"> 
	<button type="submit" class="btn btn-primary" name="btn_add_type">Add Type</button>
</div>	

</form>

<?php


    if (isset($_POST['btn_add_type'])) {
        $leave_type= ($_POST['leave_type']);
        $leave_description= ($_POST['leave_description']);
        $result = "INSERT INTO tbl_leave_type (leave_type, leave_description) 
        VALUES('$leave_type','$leave_description')";

        mysqli_query($db, $result); 

        if ($result) {
            
        echo '<script> alert("Added Successfully");  window.location.href="home.php"; </script>';
        //    header('location: home.php');

        }
        else{printf(mysqli_error($db));}
    }


?>


  </main>

  <footer class="mt-auto text-white-50">
    <!-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> -->
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 
  </body>
</html>
