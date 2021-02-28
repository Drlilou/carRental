<?php
   session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Rent A car</title>
    <meta charset="utf-8" <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="rent a car">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <link  rel ="stylesheet"  href="./css/Style.css">

</head>
<body >

     <div class="wrapper "><div class="container">   
     <?php include 'header.php'; ?>
             <h2>Agences </h2>
                
               
              <div class="well extrapage">
                    <p> Notre Agences</p>

                </div><!--endof special!-->
             <div class="row"> <!--Div box!-->
                           
<html><body>


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
    <th>nom </th>
    <th>addresse </th>
        <th>consulter voiture </th>
  </tr>
<?php 
require_once 'cnx.php';

 
    $rs = mysqli_query($db,"select * from  agence");
  

    //print out the actual query results
    $i = 0;
    while($row = mysqli_fetch_row($rs))
    {
        echo '<tr align="center">';
      echo " <td>$i </td>";
      echo  " <td>$row[1] </td>";
       echo  " <td>$row[2] </td>";
        echo " <td> <a href='cars.php?ag=$row[0]'> consulter</a></td>";
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