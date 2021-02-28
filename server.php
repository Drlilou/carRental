<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
require_once 'cnx.php';


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
   $type = mysqli_real_escape_string($db, $_POST['type']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM clients WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO clients (username, email,TYPE_CL, password) 
  			  VALUES('$username', '$email', '$type','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM clients WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
  
    if (mysqli_num_rows($results) == 1) {
      if($row=mysqli_fetch_assoc($results)){
      $_SESSION['username'] = $username;
        $_SESSION['type'] = "client";
         $_SESSION['id'] =$row['NUM_CL'];
      $_SESSION['success'] = 1;
      header('location: index.php');
      }
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}



// LOGIN admin
if (isset($_POST['login_admin'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM employe WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
  
  
    if (mysqli_num_rows($results) == 1) {
       if($row = mysqli_fetch_assoc($results)) {
               echo "Name: " . $row["username"]. "<br>";
          
      $_SESSION['username'] = $username;
        $_SESSION['type'] = $row["TYPE_EMP"];
      $_SESSION['success'] = 1;
       $_SESSION['ag'] = $row['ID_AGENCE'];
      header('location: cars.php');
        }
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}




// valide ou refuser location
if (isset($_GET['v'])&& isset($_GET['id'])) {

  extract($_GET);
  


    $query="UPDATE `location` SET `valider` = '$v' WHERE `location`.`id_loc` = $id;";
    echo $query;
    mysqli_query($db, $query);
  header('location: location.php');
  
   
  
}



// restiter car 
if (isset($_POST['kilo_loc'])) {

  extract($_POST);
  


    $query="UPDATE `location` SET `kilo` = '$kilometrge' , ID_AGENCE2=$ag  WHERE `location`.`id_loc` = $loc;";
    echo $query;
    mysqli_query($db, $query);
  header('location: location.php');
  
   
  
}

