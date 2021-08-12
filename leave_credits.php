 
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




    <h1><br /><br />Welcome to Employee Leave Management System.</h1>
   
 <?php
        //     $user_sql="SELECT   count('1') from tbl_leave 
        //     INNER JOIN users          
        //     ON users.id=tbl_leave.id where  leave_status='approved' AND users.id=".$_SESSION['user']['id']."     ";
        // $result=mysqli_query($db,$user_sql);
        // $row=mysqli_fetch_array($result); 
        // echo $row[0];
        // $credits =  30- $row[0];
            //               if (!$result1) {
						// 	printf("Error: %s\n", mysqli_error($db));
						// 	exit();
						// }
					 	// $result ="SELECT users.id,users.department,tbl_leave.daterequested,
            //              tbl_leave.leave_start,tbl_leave.leave_end,users.firstname,users.lastname,tbl_leave.leave_status          
            //              FROM tbl_leave 
            //              INNER JOIN users          
            //              ON users.id=tbl_leave.id  where tbl_leave.leave_status ='approved' ";
            ?>

      <div class="card ">
        <div class="card-body "> 
        
          <h4 class="text-body">     Your recent leave requests           </h3> 
              <table class="table table-success table-striped">
                <thead>
                    <tr >
                      <th scope="col">Type of Leave</th>
                      <th scope="col">Requested # Days of Leave</th>
                      <th scope="col">Details of Leave</th>
                      <th scope="col">Status</th>  
              
						        </tr>
               </thead>

               <tbody>
        <?php 
						 				 	$result ="SELECT * FROM users WHERE user_type='user' ORDER BY id DESC";
						 $result1 = mysqli_query($db, $result);

						 if (!$result1) {
							printf("Error: %s\n", mysqli_error($db));
							exit();
						}
						//             $user_sql="SELECT   count('1') from tbl_leave 
            // INNER JOIN users          
            // ON users.id=tbl_leave.id where  leave_status='approved' AND users.id=".$_SESSION['user']['id']."     ";

						while($res = mysqli_fetch_array($result1)) {        
							echo "<tr>";
							echo "<td>".$res['id']."</td>";
							echo "<td>".$res['firstname'] ."   ".$res['lastname'] ."</td>";
							echo "<td>".$res['department']."</td>"; 
							echo "<td><a href=\"edit.php?id=$res[id]\">Edit User</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete User</a></td>";        
            }
						?>
            </tbody>
					</table>  
  </main>

  <footer class="mt-auto text-white-50">
    <!-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> -->
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 
  </body>
</html>
