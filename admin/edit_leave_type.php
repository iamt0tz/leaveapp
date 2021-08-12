<?php 
	include('../functions.php');
    
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

$id=$_GET['id'];
$query=mysqli_query($db,"SELECT * from tbl_leave_type where id='$id' ");
$result=mysqli_fetch_array($query);
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
      .qwer { 
  padding-top: 10em;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
 <body class="d-flex h-100 text-center text-white bg-dark">
  <link href="cover.css" rel="stylesheet">
    
<!-- top header-->
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
<header class="mb-auto">
  <?php include('../modal.php'); ?>
    
    
    <main class="qwer" style= "padding-top 50em;">
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
 
    <h3 >Edit Leave Types</h3><br /> 
   
    
    <form method="post" action="">

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Leave Type</span>
    <input  type="text" value="<?php echo $result['leave_type']; ?>" required name="leave_type" placeholder="Leave Type" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Description</span>
    <input  type="text" required value="<?php echo $result['leave_description'];?>" name="leave_description" placeholder="Description" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="d-grid gap-2"> 
	<button type="submit" class="btn btn-primary" name="btn_edit_type">Add Type</button>
</div>	

</form>

<?php


    if (isset($_POST['btn_edit_type'])) {
        $id = $_GET['id'];
        $leave_type= ($_POST['leave_type']);
        $leave_description= ($_POST['leave_description']);
        $result = "UPDATE tbl_leave_type SET leave_type='$leave_type', leave_description='$leave_description' where id='$id' ";

        mysqli_query($db, $result); 

        if ($result) {
            
        echo '<script> alert("Updated Successfully");  window.location.href="view_leave_type.php"; </script>';
        //    header('location: home.php');

        }
        else{printf(mysqli_error($db));}
    }


?>
    
         

				
  </main>

</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
