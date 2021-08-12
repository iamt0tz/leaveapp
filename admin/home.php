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
  
  <br /><br /> <br /><br /> 
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




    <h1><br /><br />Welcome to Employee Leave Management System</h1>
    <br />
    <div class="row text-body">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?php
              $user_sql="select count('1') from users where user_type='user'";
              $result=mysqli_query($db,$user_sql);
              $row=mysqli_fetch_array($result); 
              echo $row[0];
              ?></h5>
              <p class="card-text">Total number of employees</p>
              <a href="view_employees.php" class="btn btn-primary">Learn more</a>
            </div>
          </div>
    </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php
              $user_sql="select count('1') from tbl_leave where leave_status='for approval'";
              $result=mysqli_query($db,$user_sql);
              $row=mysqli_fetch_array($result); 
              echo $row[0];
              ?></h5>
        <p class="card-text">Listed pending leave requests</p>
        <a href="view_leave_waiting.php" class="btn btn-primary">Learn more</a>
      </div>
    </div>
  </div>
  
</div><br />
<div class="row text-body">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body ">
        <h5 class="card-title"><?php
              $user_sql="select count('1') from tbl_leave_type ";
              $result=mysqli_query($db,$user_sql);
              $row=mysqli_fetch_array($result); 
              echo $row[0];
              ?></h5>
        <p class="card-text">Listed types of leave</p>
        <a href="view_leave_type.php" class="btn btn-primary">Learn More</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php
              $user_sql="select count('1') from tbl_leave";
              $result=mysqli_query($db,$user_sql);
              $row=mysqli_fetch_array($result); 
              echo $row[0];
              ?></h5>
        <p class="card-text">Total number of leave applications </p>
        <a href="view_leave.php" class="btn btn-primary">Learn More</a>
      </div>
    </div>
  </div>
  
</div>
    <p class="lead">  
     
    
    </p>
    <!-- <p class="lead">List of Employees</p> -->
    
    <!-- <a href="create_user.php" class="btn btn-lg btn btn-primary"">Add Employee</a>
    <table class="table table-dark table-striped"> -->
    
        
						<!-- <tr bgcolor='#CCCCCC'>
							<td>Employee No.</td>
              <td>Username</td>
              <td>Full Name</td>
							<td>Department</td>  
							<td>Action</td>
						</tr>
						<?php
					//  $result ="SELECT * FROM users WHERE user_type='user' ORDER BY id DESC";
          //  $result1 = mysqli_query($db, $result);

           

          //  if (!$result1) {
          //   printf("Error: %s\n", mysqli_error($db));
          //   exit();
          // }
          

          // while($res = mysqli_fetch_array($result1)) {        
          //   echo "<tr>";
          //   echo "<td>".$res['id']."</td>";
          //   echo "<td>".$res['username']."</td>";
          //   echo "<td>".$res['firstname'] ."   ".$res['lastname'] ."</td>";
          //   echo "<td>".$res['department']."</td>"; 
          //   echo "<td><a href=\"edit_user.php?id=$res[id]\">Edit User</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete User</a></td>";        
          // } -->
						?>
            
					</table>   
  </main>

  <footer class="mt-auto text-white-50">
    <!-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> -->
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 
  </body>
</html>
