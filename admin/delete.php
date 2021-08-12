<?php include('../functions.php');

	$id=$_GET['id'];

		// global $db;
		
			// if ($edit_password1 != $edit_password2) {
			// 	array_push($errors, "The two passwords do not match");
			// }
	
	
			// if (empty($email)) {
			// 	array_push($errors, "Email is required");
			// }
			// if (empty($password)) {
			// 	array_push($errors, "Password is required");
			// }
			$result ="DELETE from users  where id='$id' ";
			mysqli_query($db, $result);
			$result1 = mysqli_query($db, $result);

			if ($result1) {
               echo '<script> alert("Employee Deleted Successfully");  window.location.href="view_employees.php"; </script>';
			//    header('location: home.php');

		   }
           else{printf(mysqli_error($db));}
	
	?>