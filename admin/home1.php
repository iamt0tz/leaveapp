<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
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
			<img src="../images/admin_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
					</small>

					<br /><br />
					<table width='100%' border=0>
						<tr bgcolor='#CCCCCC'>
							<td>Username</td>
							<td>Email</td>
							<td>Password </td>
							<td>User Type </td>
							<td>Edit</td>
						</tr>
						<?php
					 	$result ="SELECT * FROM users WHERE user_type='user' ORDER BY id DESC";
						 $result1 = mysqli_query($db, $result);

						 

						 if (!$result1) {
							printf("Error: %s\n", mysqli_error($db));
							exit();
						}
						

						while($res = mysqli_fetch_array($result1)) {        
							echo "<tr>";
							echo "<td>".$res['username']."</td>";
							echo "<td>".$res['email']."</td>";
							echo "<td>".$res['password']."</td>"; 
							echo "<td>".$res['user_type']."</td>";  
							echo "<td><a href=\"edit.php?id=$res[id]\">Edit User</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete User</a></td>";        
						}
						?>
					</table>  

				<?php endif ?>
			</div>
		</div>



	</div>
		
</body>
</html>