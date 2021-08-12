<?php include('../functions.php') ?>
<?php	
		// global $db;
		if(isset($_POST['edit_btn'])){
			
			$id = $_GET['id'];
			$edit_email = ($_POST['email']);
			$edit_password1 = ($_POST['password_1']);
			$edit_password2  =($_POST['password_2']);
            $password = md5($edit_password2);
	
			// if ($edit_password1 != $edit_password2) {
			// 	array_push($errors, "The two passwords do not match");
			// }
	
	
			// if (empty($email)) {
			// 	array_push($errors, "Email is required");
			// }
			// if (empty($password)) {
			// 	array_push($errors, "Password is required");
			// }
			$result ="UPDATE users SET email='$edit_email', password='$password' where id='$id' ";
			mysqli_query($db, $result);
			$result1 = mysqli_query($db, $result);

			if ($result1) {
               echo '<script> alert("Updated Successfully");  window.location.href="home.php"; </script>';
			//    header('location: home.php');

		   }
           else{printf(mysqli_error($db));}
	
		}
	
	?>