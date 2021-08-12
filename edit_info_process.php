<?php include('functions.php');
		// global $db;
		if(isset($_POST['update_btn']))
        { 
                 
                $edit_email = ($_POST['email']);
                $password_1 = ($_POST['password_1']);
                $password_2  =($_POST['password_2']);
                $password = md5($password_2);
        
    
                $firstname =	($_POST['firstname']);
                $lastname =		($_POST['lastname']);
                $email =		($_POST['email']);  
                $gender =		($_POST['gender']);
                $dob =			($_POST['dob']);
                $department =	($_POST['department']);
                $address =		($_POST['address']);
                $password_1 =		($_POST['password_1']);
                $id=$_SESSION['user']['id'];

                 
                         
                        $result ="UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', gender='$gender', dob='$dob',
                        department='$department', address='$address' where id='$id' ";
                        mysqli_query($db, $result);
                        $result1 = mysqli_query($db, $result);
            
                        if ($result1) {
                           echo '<script> alert("Updated Successfully");  window.location.href="index.php"; </script>'; 
                        //    header('location: home.php');
            
                       }
                       else{printf(mysqli_error($db));}
 
       } 
                
        

        
	?>