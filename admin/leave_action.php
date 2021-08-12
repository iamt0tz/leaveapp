<?php include('../functions.php'); 
     
     if(isset($_GET['id']))
      {  
        $leave_id = $_GET['id'];  
         $result ="UPDATE tbl_leave SET leave_status='approved' where leave_id='$leave_id' "; 
         mysqli_query($db, $result);
         $result1 = mysqli_query($db, $result); 
         if ($result1) {
            echo '<script> alert("Updated Successfully");  window.location.href="view_leave_waiting.php";  </script>'; 
         //    header('location: home.php'); 
         } 
                  if (!$result1) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
         }
         else{printf(mysqli_error($db));}
      }




 

?>