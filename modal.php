<div> 
    <?php  if (isset($_SESSION['user'])) :  ?>
      <h3 class="float-md-start mb-0" href="#">Signed in as <?php echo $_SESSION['user']['username'];?></h3>
      <?php endif ?>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link  " aria-current="page" href="home.php">Home</a>  
          
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Employee Management </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="create_user.php">Add Employees</a></li> 
            <li><a class="dropdown-item" href="view_employees.php">View Employees</a></li> 
           </ul>   
           <a class="nav-link active" aria-current="page" href="#">      </a>  
           <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Leave Management </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="view_leave.php">All Leave Application</a></li> 
            <li><a class="dropdown-item" href="view_leave_waiting.php">Pending Leaves</a></li>  
            <li><a class="dropdown-item" href="view_leave_approved.php">Approved Leaves</a></li>  
            <li><a class="dropdown-item" href="view_leave_disapproved.php">Disapproved Leaves</a></li> 
           </ul>   
           <a class="nav-link active" aria-current="page" href="#">      </a> 
           <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Manage Leave Type</a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
          <li><a class="dropdown-item" href="add_leave_type.php">Add Leave Types</a></li> 
            <li><a class="dropdown-item" href="view_leave_type.php">Manage Leave Types</a></li> 
           </ul>   


        <a class="nav-link" href="#"> </a>
        <a class="nav-link" href="home.php?logout='1'" onClick="return confirm('Are you sure you want to logout?')">Logout </a> 
      </nav>
    </div>