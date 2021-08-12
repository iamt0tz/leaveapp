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
      <a href="create_user.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Add Employee</a>
    
    </p>
    <p class="lead"><h4>List of Employees</h4></p>
    <table class="table table-dark table-striped">
    
        
						<tr bgcolor='#CCCCCC'>
							<td>Employee No.</td>
              <td>Username</td>
              <td>Full Name</td>
							<td>Department</td>  
              <td>Leave Requests Made</td>
              <td>Available Credit Leave</td>
							<td>Action</td>
						</tr>
						<?php
					 	$result =" SELECT 30- sum(numberofdays)  as total ,count(numberofdays)  as total5, users.username, tbl_leave.daterequested,users.department, users.id, users.firstname, users.lastname 
             from users left join tbl_leave on tbl_leave.id=users.id  where users.user_type='user'  group by users.id";
             
            //  $result ="SELECT tbl_leave.leave_details, tbl_leave.numberofdays, tbl_leave_type.leave_type, users.id,users.department,tbl_leave.daterequested,
            //  tbl_leave.leave_start,tbl_leave.leave_end,users.firstname,users.lastname,tbl_leave.leave_status          
            //  FROM tbl_leave 
            //  RIGHT JOIN users          
            //  ON users.id=tbl_leave.id
            //  LEFT JOIN tbl_leave_type
            //  on tbl_leave.leave_type=tbl_leave_type.id where users.id=".$_SESSION['user']['id']."  ";
						 $result1 = mysqli_query($db, $result); 
             
             if(mysqli_num_rows($result1) > 0){

              $query2 =" SELECT 30- sum(numberofdays)  as total1 from users left join tbl_leave on 
              tbl_leave.id=users.id  where users.user_type='user' and tbl_leave.leave_status='approved'  group by users.id";
              $qresult = mysqli_query($db, $query2);

						//  if (!$result1) {
						// 	printf("Error: %s\n", mysqli_error($db));
						// 	exit();
						// } 

          $edit='<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>'; 
          $trash ='<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>';  
          $view = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"/>
              </svg>';

						while($res = mysqli_fetch_array($result1)) {          
							echo "<tr>";
							echo "<td>".$res['id']."</td>";
							echo "<td>".$res['username']."</td>";
							echo "<td>".$res['firstname'] ."   ".$res['lastname'] ."</td>";
							echo "<td>".$res['department']."</td>"; 
							echo "<td>".$res['total5']."</td>"; 
              if($res['total'] <30) {echo "<td>".$res['total']."</td>"; }
              else {echo "<td>0</td>"; }
							// echo "<td>".$res['total']."</td>"; 
							echo "<td>
                  <a href=\"edit_user.php?id=$res[id]\">$edit</a> |
                  <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">$trash</a> |
                  <a href=\"edit_user.php?id=$res[id]\">$view</a> 
                   
                   </td>";        
						} 
          }
          else{
            echo "<td></td>";
            echo "<td> </td>";
            echo "<td> </td>";
            echo "<td>No records found</td>";
            echo "<td> </td>";
            echo "<td> </td>";
        }
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
