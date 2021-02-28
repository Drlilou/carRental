<?php 
session_start();
if(!isset($_SESSION['ag']))

	header('location:loginAdmin.php');
include "cnx.php";
?>
<!DOCTYPE html>
<html>



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

<?php

// Include the database configuration file

//include 'cnx.php';
$statusMsg = '';
///$fileName =date('r', time()).".png";// basename($_FILES["file"]["name"]);

//echo $fileName;


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

	// File upload path
$targetDir = "images/";
//$fileName =date('r', time()).".png";// basename($_FILES["file"]["name"]);
$temp = explode(".", $_FILES["file"]["name"]);
$fileName = round(microtime(true)) . '.' . end($temp);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
extract($_POST);
  // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array(strtolower($fileType), $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        	$sql="INSERT INTO `voiture`(`ID_AGENCE`, `MATRICULE`, `DATE_D_ACHAT`, `KILOMETRAGE`, `model`, `marque`, `img`) VALUES  (".$_SESSION['ag'].", '$MATRICULE', '$date', '$KELOMETRAGE', '$model', '$marque', '$fileName');";
            // Insert image file name into database
          //  echo $sql;//var_dump($_POST);
           mysqli_query($db, $sql);
			if(mysqli_affected_rows($db) >0 )
           {
           	   // $id=mysqli_insert_id($con);;
           	    $sql="";
           	   if ($type=='p'){
           	   	
           	   	 			$sql="INSERT INTO `particulier` (`MATRICULE`, `id_par`) VALUES ('$MATRICULE', NULL);";
           	   }	else{
           	   		$sql="INSERT INTO `utilitaire` (`MATRICULE`, `CAPACITE`, `charGE_MAX`, `id_ut`) VALUES ('$MATRICULE', '$capacite', '$charge', NULL);";

           	   	}
            // Insert image file name into database
          //  echo $sql;//var_dump($_POST);
           mysqli_query($db, $sql);

           	   
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";

            }else{
                $statusMsg = " please try an other matricule ";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
    }
}else{
?>
<form method="post" enctype="multipart/form-data">
	  <div class="form-group">
      <label>type de voiture</label>
	<select name='type' class="form-control" onchange="showDiv('extra', this)" >
		<option value="p"> particulier </option>
		<option value="u">utilitaire </option>
	</select>
</div>
  <div class="form-group">
      <label>matricule</label>
	<input type="text" name="MATRICULE" class="form-control" required></div>
	  <div class="form-group">
      <label>date d'achat</label>
	<input type="date" name="date" class="form-control" required></div>
	  <div class="form-group">
      <label>kilometrage</label>
	<input type="number" name="KELOMETRAGE" step="0.01" class="form-control"required></div>
	  <div class="form-group">
      <label>model</label>
	<input type="text" name="model" class="form-control"required></div>
	  <div class="form-group">
      <label>marque</label>
	<input type="text" name="marque"class="form-control" required></div>
<div id="extra" style="display: none;">
	<div class="form-group">
      <label> capacite</label>
	<input type="number" name="capacite"class="form-control" ></div>

<div class="form-group">
      <label>charge maximal</label>
	<input type="number" name="charge"class="form-control" ></div>
</div>

	  <div class="form-group">
      <label>  Select Image File to Upload:
</label>
  
    <input type="file" name="file" accept=".jpg,.png,.jpeg,.gif"  class="btn" required></div>
	  <div class="form-group">
      <label></label>
    <input type="submit" name="submit" class="btn" value="Upload"></div>
</form>
<?php  

    $statusMsg = 'Please select a file to upload.';
}

// Display status message

?>

<div class="form-group">
<label>


	<?php echo $statusMsg; ?>
		
	</label>
</div>

<br><br><br><br><br><br>
<script type="text/javascript">
	

	function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 'u' ? 'block' : 'none';
}
</script>



  <?php include "footer.php" ;?>
</div></div>
</body>

</html>