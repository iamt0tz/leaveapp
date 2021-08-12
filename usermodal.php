<div> 
    <?php  if (isset($_SESSION['user'])) :  ?>
      <h3 class="float-md-start mb-0" href="#">Signed in as <?php echo $_SESSION['user']['firstname'];?></h3>
      <?php endif ?>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link  " aria-current="page" href="index.php">Home</a>  
        <a class="nav-link  " aria-current="page" href=""> </a>   
           <a class="nav-link active" aria-current="page" href="#">      </a>  
           <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">My Leave History</a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="user_view_leave.php">Leave Applications</a></li> 
            <li><a class="dropdown-item" href="user_view_pending.php">Pending Leaves</a></li>  
            <li><a class="dropdown-item" href="user_view_approved.php">Approved Leaves</a></li>
            <li><a class="dropdown-item" href="user_view_disapproved.php">Disapproved Leaves</a></li> 
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="add_leave.php">Request Leave</a></li> 
           </ul>   
           <a class="nav-link active" aria-current="page" href="#">      </a> 
            <a class="nav-link" aria-current="page" href="edit_info.php">Edit Info</a>  


        <a class="nav-link" href="#"> </a>
        <a class="nav-link" href="index.php?logout='1'" onClick="return confirm('Are you sure you want to logout?')">Logout </a> 
      </nav>
    </div>