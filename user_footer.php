<!-- START OF MAIN CONTENT -->
<?php 
      //footer computation
    $user_sql="SELECT   count('1') from tbl_leave 
    INNER JOIN users          
    ON users.id=tbl_leave.id where  leave_status='approved' AND users.id=".$_SESSION['user']['id']."     ";
    $result=mysqli_query($db,$user_sql);
    $row=mysqli_fetch_array($result); 
    // echo $row[0];
    $credits =  30- $row[0];
  ?> 
<div class="card text-center text-body">
  <div class="card-header">
  <h2 > QWE</h2>
  </div> 
    <div class="card-body">
        <table class="table table-dark table-striped">
          <thead bgcolor='#CCCCCC'>
            <!-- TABLE HEAD   -->
          </thead> 
              
          <?php
                      $result ="SELECT users.id,users.department,tbl_leave.daterequested,
                                tbl_leave.leave_start,tbl_leave.leave_end,users.firstname,users.lastname,tbl_leave.leave_status          
                                FROM tbl_leave 
                                INNER JOIN users          
                                ON users.id=tbl_leave.id where tbl_leave.leave_status='for approval' AND users.id=".$_SESSION['user']['id']."  "; 
                                $result1 = mysqli_query($db, $result); 
                                //   if (!$result1) {
                                //       printf("Error: %s\n", mysqli_error($db));
                                //       exit();
                                //   }
                                
           
              while($res = mysqli_fetch_array($result1)) 
        {        
        echo "<tbody>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['firstname'] ."   ".$res['lastname'] ."</td>"; 
            echo "<td>".$res['leave_start']." to ".$res['leave_end'] ."</td>";
            echo "<td>".$res['department']."</td>"; 
            echo "<td>".$res['daterequested']."</td>"; 
            if($res['leave_status']=='for approval') {echo "<td class='text-primary'>".$res['leave_status']."</td>"; }
            if($res['leave_status']=='disapproved') {echo "<td class='text-danger'>".$res['leave_status']."</td>"; }
            if($res['leave_status']=='approved') {echo "<td class='text-warning'>".$res['leave_status']."</td>"; }
         
                 }
              ?>
         </table>
    </div>
    <div class="card-footer text">
      You still have <?php echo $credits;  ?> - remaining Leave credits!  
    </div>
</div>
 <!-- END OF MAIN CONENT -->