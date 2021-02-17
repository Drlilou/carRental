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
<body >

     <div class="wrapper "><div class="container">   
     <?php include 'header.php'; ?>
             <h2>Location  </h2>
                
               
              <div class="well extrapage">

                <?php 
                if(isset($_SESSION['ag'])){
                 ?>
                    <p> location de notre agence</p>
                    <?php
                  } if (isset($_SESSION['id'])){ ?>
                
                    <p> My location</p>
              <?php } ?>
                </div><!--endof special!-->
             <div class="row"> <!--Div box!-->
                           



<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>
<table id='customers'>
  
 <tr>
    <th>num</th>
    <th>client </th>
    <th>date location </th>
    <th>model </th>
      <th>marque </th>
        <th>valider </th>
        <?php if (isset($_SESSION['ag'])){ ?>
        <th>consulter location </th>
        <?php } ?>

  </tr>
<?php 
require_once 'cnx.php';

 $sql="select * from  clients natural join location natural join voiture natural join agence  where ";

if (isset($_SESSION['ag'])){

  $sql.=" id_agence=".$_SESSION['ag'];
} 
if (isset($_SESSION['id'])){

  $sql.="  num_cl like ".$_SESSION['id'];
}
//echo $sql;
    $rs = mysqli_query($db,$sql);


    //print out the actual query results
    $i = 1;
    while($row = mysqli_fetch_assoc($rs))
    {
        echo '<tr align="center">';
      echo " <td>$i ";
   //   $row['id_loc']."</td>";
         echo  " <td>".$row['NOM_CL'] ."</td>";
      echo  " <td>".$row['date_loc'] ."</td>";
       echo  " <td>".$row["model"] ."</td>";
        echo  " <td>".$row["marque"] ."</td>";
        if ($row["valider"] ==2){
          echo  " <td>".'valider'  ."</td>";
        }elseif($row["valider"] ==1){ 
         echo  " <td>".'refuser'  ."</td>";
        }else{
           echo  " <td>".'pas encore traite'  ."</td>";
        }

        if (isset($_SESSION['ag']))
        echo " <td> <a href='loc.php?loc=".$row['id_loc']."'> details</a></td>";
        echo '</tr>';
        $i = $i + 1;
    }

    echo "</table><br>";echo "<br>";echo "<br>";echo "<br>";
?>
                
               
              <div class="well extrapage">
                    <p> location a rondre(d'autre agence)</p>

                </div><!--endof special!-->
             <div class="row"> <!--Div box!-->
                           


<table id='customers'>
  
 <tr>
    <th>num</th>
    <th>client </th>
    <th>date location </th>
    
    <th>model </th>
      <th>marque </th>
        <th>consulter location </th>
  </tr>
<?php 
require_once 'cnx.php';

 
    $rs = mysqli_query($db,"select * from  clients natural join location natural join voiture  natural join agence where valider=2 and id_agence!=".$_SESSION['ag']);
  

    //print out the actual query results
    $i = 1;
    while($row = mysqli_fetch_assoc($rs))
    {
        echo '<tr align="center">';
      echo " <td>$i  </td>";
       echo  " <td>".$row['NOM_CL'] ."</td>";
      echo  " <td>".$row['date_loc'] ."</td>";
       echo  " <td>".$row["model"] ."</td>";
        echo  " <td>".$row["marque"] ."</td>";
        if(is_null($row['ID_AGENCE2']))
        echo " <td> <a href='rondre.php?loc=".$row['id_loc']."'> rondre</a></td>";
      else
          echo " <td> deja rondu </td>";
        echo '</tr>';
        $i = $i + 1;
    }

    echo "</table><br>";echo "<br>";echo "<br>";echo "<br>";
?>


             </div><!--Endof div row!-->

  <?php include "footer.php" ;?>


</div></div>


</body>

</html>