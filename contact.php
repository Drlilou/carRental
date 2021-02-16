<?php
   session_start();
 ?>

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
            
             <h2>Contact Us </h2>
             
                    <form action="">
                        <div class="form-group">
                                <label for="text">Name</label>
                                <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" class="form-control" id="email">
                        </div>
                       

                        <div class="form-group">
                                <label for="textarea">Message</label>
                                <textarea cols="4" class="form-control"></textarea>
                          </div>
                       
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>
             
                
               
       <br>
       <br><br><br>

  <?php include "footer.php" ;?>

</div></div>
</body>

</html>