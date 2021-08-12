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
 
    <h3 >Pending Leave Applications</h3><br />

    
    <table class="table table-dark table-striped">
      <form method="post" action="leave_action.php">
    
            
						<tr bgcolor='#CCCCCC'>
							<td>Employee No.</td>
              <td>Full Name</td>
							<td>Date of Leave</td>  
							<td>Details</td>  
							<td>Department</td>  
							<td>Date Requested</td>  
							<td>Status</td>   
							<td width="250px">Action</td>  
						</tr>
						<?php
					 	$result ="SELECT users.id,users.department,tbl_leave.daterequested, tbl_leave.leave_details,
                         tbl_leave.leave_start,tbl_leave.leave_end,users.firstname,users.lastname,tbl_leave.leave_status, tbl_leave.leave_id          
                         FROM tbl_leave 
                         INNER JOIN users          
                         ON users.id=tbl_leave.id  where tbl_leave.leave_status ='for approval' ";
					 	// $result ="SELECT  * from tbl_leave  ";
						 $result1 = mysqli_query($db, $result);
             if(mysqli_num_rows($result1) > 0){
            
						 

						 if (!$result1) {
							printf("Error: %s\n", mysqli_error($db));
							exit();
						}
						
            $approve='<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
          </svg>';
            $disapprove ='<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>';

						while($res = mysqli_fetch_array($result1)) {        
							echo "<tr>";
							echo "<td>".$res['id']."</td>";
							echo "<td>".$res['firstname'] ."   ".$res['lastname'] ."</td>"; 
							echo "<td>".$res['leave_start']." to ".$res['leave_end'] ."</td>";
							echo "<td>".$res['leave_details']."</td>";
							echo "<td>".$res['department']."</td>"; 
							echo "<td>".$res['daterequested']."</td>"; 
              if($res['leave_status']=='for approval') {echo "<td class='text-primary'>".$res['leave_status']."</td>"; }
              if($res['leave_status']=='disapproved') {echo "<td class='text-danger'>".$res['leave_status']."</td>"; }
              if($res['leave_status']=='approved') {echo "<td class='text-warning'>".$res['leave_status']."</td>"; }
     
							echo "<td>
                      <a name='btn_approve_leave' class='btn btn-primary' href=\"leave_action.php?id=$res[leave_id]\"
                        onClick=\"return confirm('Are you sure you want to APPROVE this request?')\">APPROVE</a>    
                        &nbsp&nbsp<a name='btn_disapprove_leave' class='btn btn-danger' href=\"leave_disapprove.php?id=$res[leave_id]\" 
                        onClick=\"return confirm('Are you sure you want to DISAPPROVE this request?')\">DISAPPROVE</a>
                
                  </td>";        
            }
          }
          
          else{
            echo "<p>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>No pending leave application</td>
                <td></td>
                <td></td>
                <td></td>
                  <p>" ;
        }
						?>
					</table>  

          </form>
  </main>
  <br /><br />
    <br />
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>

