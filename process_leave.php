<?php 
	include('functions.php');

    if (isset($_POST['request_leave'])) {
        // $id = $_GET['id'];
         $leave_start    =   ($_POST['leave_start']);
         $leave_end    =   ($_POST['leave_end']);
         $leave_details    =   ($_POST['leave_details']); 
        $userid = $_POST['userid'];
        $leave_type= $_POST['leave_type'];
        $daterequested = date("Y-m-d"); 

        $date1 =   $leave_start;
        $date2     =   $leave_end;
        // $diff=date_diff($date1,$date2);
        // $finaldate= $date1->diff($date2)->format("%a");

        // $finaldate = $date1->diff(Carbon::parse($date2));
        $finaldate = dateDiffInDays($date1, $date2);

 
            $result = "INSERT INTO tbl_leave (id, leave_type, leave_start, leave_end, leave_details,leave_status,daterequested,numberofdays) 
            VALUES('$userid','$leave_type','$leave_start', '$leave_end', '$leave_details','for approval','$daterequested','$finaldate')";
              

            mysqli_query($db, $result); 

			if ($result) {
                
               echo '<script> alert("Requested Successfully"); window.location.href="index.php";  </script>';
			//    header('location: home.php');

		   }
           else{printf(mysqli_error($db));}
        }


        function dateDiffInDays($leave_start, $leave_end) {
            $diff = strtotime($leave_end) - strtotime($leave_start);
            $date =0;
            // 1 day = 24 hours
            // 24 * 60 * 60 = 86400 seconds
            if(abs(round($diff / 86400)) == 0 )
                {
                    return abs(round($diff / 86400)) + 1;
                }
            else
                {
                    return abs(round($diff / 86400));
                }
            
        }
    