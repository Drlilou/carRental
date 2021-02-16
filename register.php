<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <link  rel ="stylesheet"  href="./css/Style.css">
       
        

</head>
<body>

     <div class="wrapper "><div class="container">
  <?php include 'header.php'; ?>


  	<h2>Register</h2>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
    <div class="form-group">
      <label>Type</label>
     <select class="form-control" name="type">
       <option value="part">particulier</option>
     <option value="ent" >entreprise</option>
   </select>
    </div>
  	<div class="form-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
  	</div>
  	<div class="form-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
  	</div>
  	<div class="form-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" class="form-control">
  	</div>
  	<div class="form-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" class="form-control">
  	</div>
  	<div class="form-group">
  	  <input  type="submit" class="btn" name="reg_user" value="Register">
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>

  <?php include "footer.php" ;?>
</div></div>
</body>
</html>
