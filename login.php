<?php include('server.php') ?>
<!DOCTYPE html>
<html>



<!DOCTYPE html>
<html>

<head>
    <title>Rent A car</title>
    <meta charset="utf-8" <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="rent a car">
    <meta name="author" name="Emanuel A. Abiyo">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <link  rel ="stylesheet"  href="./css/Style.css">
       
        

</head>

<body>

     <div class="wrapper "><div class="container">
    <?php include 'header.php'; ?>
            
             <h2>Login form  </h2>
             
                     <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username"  class="form-control">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" class="btn" name="login_user" class="linav active">
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
             
                
               
            

  <?php include "footer.php" ;?>
</div></div>
</body>

</html>