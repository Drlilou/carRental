<?php 

$db = mysqli_connect('localhost', 'root', '', 'location_voiture');

function RemoveSpecialChar($str){ 
      
    // Using str_ireplace() function  
    // to replace the word  
    $res = str_ireplace( array( '\'', '"', 
    ',' , ';', '<', '>' ,' '), '', $str); 
      
    // returning the result  
    return $res; 
    } 
 ?>