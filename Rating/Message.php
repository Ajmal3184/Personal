<?php

        $FullName = $_POST['FullName'];
        $Email = $_POST['Email'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $YourReview = $_POST['YourReview'];

        
    //database connection
    $conn = new mysqli("localhost","root","","persoanlweb");
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("Insert into review(FullName,Email,PhoneNumber,YourReview)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$FullName,$Email,$PhoneNumber,$YourReview);
        $stmt->execute();
        /*
        echo "registration Successfull...";*/
        $stmt->close();
        $conn->close();
        
        header("../Thank/thank.php");
        exit;
        
    }

?>
