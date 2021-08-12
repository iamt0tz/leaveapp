<?php include('functions.php') ?>
<?php	
		// global $db;
		if(isset($_POST['update_btn'])){
			
			$id = $_GET['id'];
			$edit_email = ($_POST['email']);
			$edit_password1 = ($_POST['password_1']);
			$edit_password2  =($_POST['password_2']);
            $password = md5($edit_password2);
	
 
			$firstname =	($_POST['firstname']);
			$lastname =		($_POST['lastname']);
			$email =		($_POST['email']); 
			$oldpass =	($_POST['password_1']);
			$newpass =	($_POST['password_2']);
			$gender =		($_POST['gender']);
			$dob =			($_POST['dob']);
			$department =	($_POST['department']);
			$address =		($_POST['address']);

			if($oldpass != $newpass){
				echo '<script> alert("Password does not match");  window.location.href="edit_info.php"; </script>';
				// header('location: edit_info.php');
				exit();
			}
			 
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