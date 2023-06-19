<?php

$server = "localhost";    
$user = "root";                         
$pass = "";                                
$databse="persoanlweb";             

$conn=mysqli_connect($server,$user,$pass,$databse);

if($conn){
	/*echo "Connected";*/
}else{
	echo "Not Connected";
}


?>