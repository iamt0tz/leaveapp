<?php include('functions.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Employee-Leave Management System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
   
    <h1 class="h1 mb-3 fw-normal text-light">Welcome!</h1> 

    <h1 class="h3 mb-3 fw-normal text-light">Please sign in</h1>
   
    <form method="post" action="login.php">
    <h1 class="h5 mb-3 fw-normal text-light"><?php echo display_error(); ?></h1>
    <!-- <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="yourname">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div> -->


    <div class="form-floating mb-3">
  <input type="text"  name="username"  class="form-control" id="floatingInput" placeholder="Username">
  <label for="floatingInput">Username</label>
</div>
<div class="form-floating">
  <input type="password" name="password"  class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div><br />
      
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login_btn">Sign in</button>
   <!-- <p class="mt-5 mb-3 text-muted">  Don't have account yet? <a href="register.php"> Sign Up</p></a> -->
  </form>
</main>


    
  </body>
</html>
