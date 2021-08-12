 
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

    <link rel="canonical" href="    ">

    

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
  <br /><br />  <br /><br /> <br /><br />
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
    <h1>Welcome to Employee Leave Management System.  </h1> <br /><br /> 
    <div class="row text-body">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?php
                  $user_sql="SELECT count('1') from tbl_leave 
                  INNER JOIN users          
                  ON users.id=tbl_leave.id where users.id=".$_SESSION['user']['id']."  ";
              $result=mysqli_query($db,$user_sql);
              $row=mysqli_fetch_array($result); 
              echo $row[0]; 
              
              ?></h5>
              <p class="card-text">Your total leave applications</p>
              <a href="user_view_leave.php" class="btn btn-primary">Learn more</a>
            </div>
          </div>
    </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php
              $user_sql="select count('1') from tbl_leave where leave_status='for approval' and id=".$_SESSION['user']['id']." " ;
              
              $result=mysqli_query($db,$user_sql);
              $row=mysqli_fetch_array($result); 
              echo $row[0];
              
              ?></h5>
        <p class="card-text">Your total pending leave requests</p>
        <a href="user_view_pending.php" class="btn btn-primary">Learn more</a>
      </div>
    </div><br /><br /> 
  </div>

  <br /><br />  
     
     <!-- OUTSIDE  -->
     <?php 
      //footer computation
    $user_sql="SELECT   sum(numberofdays) from tbl_leave 
    INNER JOIN users          
    ON users.id=tbl_leave.id where  leave_status='approved' AND users.id=".$_SESSION['user']['id']."     ";
    $result=mysqli_query($db,$user_sql);
    $row=mysqli_fetch_array($result); 
    // echo $row[0];
    $credits =  30- $row[0];
  ?> 
     
    <!--   <div class="card ">
      <div class="card-body "> 
        <h4 class="text-body">  Your recent leave requests  </h3> <br />
      

        <table class="table table-dark table-striped">
        <thead>
						<tr>
							<th scope="col">Requested Date of Leave</th>
              <th scope="col">Requested # Days of Leave</th>
							<th scope="col">Details of Leave</th>
              <th scope="col">Status</th>   
						</tr>
        <thead> -->
						<?php 
            // $result ="SELECT tbl_leave.leave_details, tbl_leave.numberofdays, tbl_leave_type.leave_type, users.id,users.department,tbl_leave.daterequested,
            // tbl_leave.leave_start,tbl_leave.leave_end,users.firstname,users.lastname,tbl_leave.leave_status          
            // FROM tbl_leave 
            // RIGHT JOIN users          
            // ON users.id=tbl_leave.id
            // LEFT JOIN tbl_leave_type
            // on tbl_leave.leave_type=tbl_leave_type.id where users.id=".$_SESSION['user']['id']."  ";
						//  $result1 = mysqli_query($db, $result); 
            // echo "<tbody>"; 
						// while($res = mysqli_fetch_array($result1) ) {       
						// 	echo "<tr>"; 
						// 	echo "<td>".$res['leave_start']." to ".$res['leave_end'] ."</td>";
						// 	echo "<td>".$res['numberofdays']."</td>";
						// 	echo "<td>".$res['leave_details']."</td>";
						// 	if($res['leave_status']=='for approval')
            //    {
            //      echo "<td class='text-primary'>".$res['leave_status']."</td>";
            //    }
            //   else 
            //     {
            //       if($res['leave_status']=='disapproved')
            //         {
            //           echo "<td class='text-danger'>".$res['leave_status']."</td>"; 
            //         }   
            //       else 
            //           {
            //             if($res['leave_status']=='approved')
            //              {
            //                echo "<td class='text-warning'>".$res['leave_status']."</td>"; 
            //              }
            //               else { echo "<td class='text-warning'>".$res['leave_status']."</td>";  }
            //             }}
            // echo "</tr>"; 
            //   echo "</tbody>"; 
            // }
						?> 
					</table>   <!--END ALL CONTENT -->    <h4><div class="card-footer text-white"><p class="lead"><a href="add_leave.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Request Leave Now</a> </p>
      You still have <?php echo $credits;  ?> - remaining Leave credits!  
    </div></div>
    
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   </body>
</html>
