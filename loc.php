<?php
   session_start();
   extract($_GET);
   if(empty($loc)){
   	header('location:location.php');
   }
 ?>

<!DOCTYPE html>
<html>

<head>
    <title>Rent A car</title>
    <meta charset="utf-8" <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="rent a car">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <link  rel ="stylesheet"  href="./css/Style.css"

</head>

<body>
    
     <div class="wrapper "><div class="container">   
      <?php require_once 'header.php';

require_once 'cnx.php';

 $sql="select * from clients natural join location natural join voiture natural join agence where id_loc=".$_GET['loc'];
 $rs=mysqli_query($db, $sql);
  if($row = mysqli_fetch_assoc($rs))
    {
       ?>  
        <h2>Locationn  inforamtion  </h2>
           <div class="row">
           <div class="col-lg-6">
              <h3>Client </h3>
              <p>Nom :<?php echo $row['NOM_CL']; ?></p>
              <p>address :<?php echo $row['ADD_CL']; ?></p>
              <p>Type  :<?php echo $row['TYPE_CL']; ?></p>
           </div>
           <div class="col-lg-6">
                    <h3>Car </h3>
                    <p>marque :<?php echo $row['marque']; ?></p>
                 <p>model :<?php echo $row['model']; ?></p>
                 <p>date d'achat   :<?php echo $row['DATE_D_ACHAT']; ?></p>

  				<p>Kilomertage   :<?php echo $row['KILOMETRAGE']; ?></p>                 
            </div>
            <div class="col-lg-6">
                         <h3>Operation </h3>
                         <?php 
                         
                      if ($row["valider"] ==2){
          									echo  " <p>".' deja valider'  ."</p>";
        			   }elseif($row["valider"] ==1){ 
        			   						echo  " <p>".'refuser'  ."</p>";
      					}else{
          								
     				
      			

                 echo '  <p ><a href="server.php?v=2&id= '.$_GET["loc"] .'" class="callnumber">valider </a></p>
                     <p><a href="server.php?v=1&id='.$_GET['loc'].'">refuser</a></p>
                     ';
                     
                  } ?>
                </div>
            </div>
             <?php } ?>
               
          <br>
          <br><br><br><br>
            
  <?php include "footer.php" ;?> 


</div></div>
</body>

</html>