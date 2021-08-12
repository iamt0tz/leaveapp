<?php include('../functions.php'); 

$id=$_GET['id'];
$query=mysqli_query($db,"SELECT * from users where id='$id' ");
$result=mysqli_fetch_array($query);
// echo $id;

if (!$result) {
	printf("Error: %s\n", mysqli_error($db));
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=edit_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - edit user</h2>
	</div>

	
	<form method="post" action="editprocess.php?id=<?php echo $id; ?>">
	
		<?php echo display_error(); 
		
		// $id=$_GET['id'];
		// $query=mysqli_query($mysqli,"SELECT * from users where id='$id'");
		// $row=mysqli_fetch_array($query);

		// $result ="SELECT * FROM users WHERE id="$_SESSION['user']['id']" ";
		// 				 $result1 = mysqli_query($db, $result);
		
		?>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $result['email']; ?>">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" >
		</div>

		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="edit_btn"> + Edit user</button>
		</div>
	</form>


	<?php	
	
	
	?>
</body>

</html>