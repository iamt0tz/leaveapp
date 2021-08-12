<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<?php
 //include("functions.php");
//  extract($_SESSION); 
//       $stmt_edit = $DB_con->prepare('SELECT * from users WHERE id =:id');
//     $stmt_edit->execute(array(':id'=>$id));
//     $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
//     extract($edit_row);
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
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
		<!-- logged in user information -->
			<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) :  ?>
					<strong><?php echo $_SESSION['user']['username'];?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<?php	// $q= $_SESSION['user']; echo implode('$q');?>
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>
					<?
					//  $query =  "SELECT quizid,userid,quizname,quizscore FROM quiz WHERE $_SESSION['user']['id'] = $_SESSION['user']['id']";
					
					//  
					
					?><br /><br />
					<table width='150%' border=0>
						<tr bgcolor='#CCCCCC'>
							<td>Quiz ID</td>
							<td>User</td>
							<td>Quiz Name </td>
							<td>Score</td>
							<td>Edit</td>
						</tr>
						<?php
					 	$result ="SELECT * FROM quiz WHERE userid=".$_SESSION['user']['id']." ORDER BY quizid DESC";
						 $result1 = mysqli_query($db, $result);

						//  if (!$result1) {
						// 	printf("Error: %s\n", mysqli_error($db));
						// 	exit();
						// }

						while($res = mysqli_fetch_array($result1)) {        
							echo "<tr>";
							echo "<td>".$res['quizid']."</td>";
							echo "<td>".$res['userid']."</td>";
							echo "<td>".$res['quizname']."</td>"; 
							echo "<td>".$res['quizscore']."</td>";    
							echo "<td><a href=\"edit.php?id=$res[quizid]\">Edit</a> | <a href=\"delete.php?id=$res[quizid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
						}
						?>
					</table>  





					<?php
						// $loginId = $_SESSION['id'];
						// echo implode($loginId);
	
				
		// if($dbcon === false){
		// 	die("ERROR: Could not connect. " . mysqli_connect_error());
		// 	}
			// $qwe =$_SESSION['user'];
			//echo $qwe;
			// echo implode($qwe);
			// echo $db;
			// echo $id;
			
			// echo $userid = $_SESSION['user']['id'];
           

            

            ?> 

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>