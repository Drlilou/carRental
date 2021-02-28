<?php
   session_start();
   require_once 'cnx.php';
   if (  $_SESSION['type'] = "client")
   {


    if (isset($_POST['matricule'])){
      extract($_POST);

        $sql="select * from voiture where matricule like '$matricule'";

        $rs=  mysqli_query($db, $sql);
        if($row=mysqli_fetch_assoc($rs)){
            $ID_AGENCE1=$row['ID_AGENCE'];
             $sql="  INSERT INTO `location` (`id_loc`, `date_loc`, `date_fin_loc`, `KILO`, `ID_AGENCE2`, `NUM_CL`, `MATRICULE`,ID_AGENCE1, `valider`) VALUES (NULL, '$date1', '$date2', NULL, NULL, ".$_SESSION['id'].", '$matricule',$ID_AGENCE1, '0');";
            mysqli_query($db, $sql);
      //      echo $sql;
    //        exit();
        }
  //   echo $sql;
//exit();
 header('location: index.php');
    }else{

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

<body>
     
     <div class="wrapper "><div class="container">
<?php include 'header.php'; ?>


 <div class="well">
                        <div class="row">
                                <form class="form-vertical" method="POST">
                                        <fieldset>
                                          <legend> BOOK A CAR</legend>
                                       
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-lg-8">Pick-up Date and Time</label>
                                                <div class="col-lg-10">
                                                  <input type="date" class="form-control" name="date1" placeholder="dd-mm-yyyy">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                    <label for="inputEmail" class="col-lg-8">Return Date and Time</label>
                                                    <div class="col-lg-10">
                                                      <input type="date" class="form-control" name="date2" placeholder="dd-mm-yyyy">
                                                        <input type="hidden" name='matricule' class="form-control" value="<?php echo $_GET['id']; ?>">
                                                    </div>
                                             </div>
                                       
                                           <br><br><br>
                                         
                                          <div class="form-group">
                                            <div class="col-lg-10 ">
                                              <input type="submit" value="louer" name='louer' class="btn btn-danger"/>
                                            </div>
                                         
                                        </div>
                                        </fieldset>
                                </form>

                        </div>
            
                  </div>
              
          <?php include "footer.php" ;?>
</div></div>

</body>

</html>
<?php
}

 }else{

  header('location: index.php');
    
  } ?>