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
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        
        <link  rel ="stylesheet"  href="./css/Style.css"

</head>

<body>
     <div class="wrapper "><div class="container">

     <?php 

   echo "renault" == "Renault";
     include 'header.php'; 
    if(isset($_SESSION['ag']))
     $agence=$_SESSION['ag'];

     ?>
     <h1>CARS  

               
            
     <?php 

                if (isset( $agence))
                    echo '<a href="upload.php">new Car</a>';
                 ?> </h2>
             <h2>utilitaire 

               
             </h2>
             <?php 
require_once 'cnx.php';
 $sql="select * from  voiture natural join utilitaire";
 extract($_GET);

 if (isset($ag) and (RemoveSpecialChar( $ag)!='')){
  
    $sql.= ' where ID_AGENCE ='. RemoveSpecialChar( $ag) ;

 }
 if (isset($agence) ){
  
    $sql.= ' where ID_AGENCE ='. RemoveSpecialChar( $agence) ;
    
 }
 
 //echo $sql;
    $rs = mysqli_query($db,$sql);
 
  ?>
             <div class="row"> <!--Div box!-->
                <?php 
                 while($row = mysqli_fetch_row($rs)){ 

               ///     var_dump($row);?>

                <div class="col-md-4">
                     <div class="card">
                         <img src="./images/<?php  echo $row[6];?>" width="200" height="180"  alt="Avatar" style="width:100%">
                             <div class="container-card">
                             <h4><b><?php echo $row[4]; ?></b></h4>
                              <h4><b><?php echo $row[5]; ?></b></h4> 
                               <p> kilom : <?php echo $row[3]; ?> km</p> 
                                <p> capacite : <?php echo $row[7]; ?> m<sup>3</sup></p> 
                               <p> charge maximale  : <?php echo $row[8]; ?> KG</p> 
                               <p> <a href="louer.php?id=<?php echo $row[0]; ?>">louer</a></p> 
                            
                             </div>
                      </div>
                 </div>
            <?php } ?>
           
                  
  </div><!--Endof div row!-->
      <h2>particulier </h2>

             <?php 

 $sql="select * from  voiture natural join particulier";
 if (isset($ag) and (RemoveSpecialChar( $ag)!='')){
  
    $sql.= ' where ID_AGENCE ='. RemoveSpecialChar( $ag);
 }
  if (isset($agence) ){
  
    $sql.= ' where ID_AGENCE ='. RemoveSpecialChar( $agence) ;
    
 }
 //echo $sql;
    $rs = mysqli_query($db,$sql);

 
  ?>
             <div class="row"> <!--Div box!-->
                <?php 
                 while($row = mysqli_fetch_row($rs)){ 

               ///     var_dump($row);?>

                <div class="col-md-4">
                     <div class="card">
                         <img src="./images/<?php  echo $row[6];?>" width="200" height="180"  alt="Avatar" style="width:100%">
                             <div class="container-card">
                               <h4><b><?php echo $row[4]; ?></b></h4>
                              <h4><b><?php echo $row[5]; ?></b></h4> 
                             <p> kilom : <?php echo $row[3]; ?> km</p> 
                              </div>
                      </div>
                 </div>
            <?php } echo "<br>  <br>  <br>  <br>  <br>  <br>  ";?>
           
                <br>  
  </div><!--Endof div row!-->
              
          
  <?php include "footer.php" ;?>
   </div>
 </div>        
</body>

</html>