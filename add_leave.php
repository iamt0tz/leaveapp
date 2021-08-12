 
<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
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
    <br /> <br /> <br /> 
    <!-- <h1>Welcome to Employee Leave Management System.</h1> -->
    <form method="post" action="process_leave.php">
	    <?php echo display_error();  
 
    ?>

       <?php $time=time();
        // echo (date("Y-m-d",$time));
        // echo $requestdate; 
       ?><br />	<p class="lead"><h4>Add Leave Request</h4></p>
    <div class="input-group mb-3">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['id'] ?>">
     
        <label class="input-group-text" for="inputGroupSelect01" >Leave Type</label>

        <select name="leave_type" id="leave_type" class="form-select" id="inputGroupSelect01"> 
            <option disabled selected> Select Type</option>
            <?php   
                $records = mysqli_query($db, "SELECT * From tbl_leave_type");  // Use select query here 

                while($data = mysqli_fetch_array($records))
                {
                    echo "<option selected value='". $data['id'] ."'>" .$data['leave_type'] ."</option>";  // displaying data in option menu
                }	 
            ?>  
            
        </select>

    </div> <?php  mysqli_close($db); ?>
 
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1" >From</span>
    <input type="date" name="leave_start" class="form-control" min="<?php echo date('Y-m-d'); ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    <span class="input-group-text" id="basic-addon1">To</span>
    <input type="date" name="leave_end"class="form-control" min="<?php echo date('Y-m-d'); ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>  
<?php
  
?>
    <div class="input-group">
    <span class="input-group-text">Details</span>
    <textarea class="form-control" name="leave_details" aria-label="With textarea"></textarea>
    </div>
    <div class="d-grid gap-2"> <br />
  <button type="submit" class="btn btn-primary" name="request_leave">Request Leave</button>
</div>  </main>
</form>
  <footer class="mt-auto text-white-50">
    <!-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> -->
  </footer>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 
  </body>
</html>
