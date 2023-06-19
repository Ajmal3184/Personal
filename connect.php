<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>ThankYou</title>

<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'popins',sans-serif;
}
.container{
    width: 100%;
    height: 100vh;
    background: #3c5077;
    /*To Make In Center*/
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn{
    /*To Add Space Inside the Button*/
    padding: 10px 60px;
    background: #fff;
    border: 0;
    outline: none;
    cursor:pointer;
    font-size: 22px;
    font-weight: 500;
    border-radius: 30px;

}
.popup{
    width: 380px;
    background: #fff;
    border-radius: 6px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%) scale(1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: visible;
    transition: transform 0.4s, top 0.4s;
}
.open-popup{
    visibility: visible;
    top: 50%;
    transform: translate(-50%,-50%) scale(1);
}


.popup img{
    width: 100px;
    margin-top: -50px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}
.popup h2{
    font-size: 38px;
    font-weight: 500;
    margin: 30px 0 10px;
}
.popup button{
    width: 100%;
    margin-top: 50px;
    padding: 10px 0;
    background: #6fd649;
    color: #fff;
    border: 0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
}
</style>

</head>
<body>
    
    <form method="POST" action="./index.php" onsubmit="return submitForm(this);">

       <div class="popup" id="popup">
            <img src="ok.png">
            <h2>Thank You!</h2>
            <p>Your Review has been Successfully
                 Submitted. Thanks!</p>
              
            <button type="submit" onclick="location.href='../index.html'" >Ok</button>
        </div>

        <!-- <input type="submit" />-->
    </form>
</body>
</html>
<?php

    $firstname = $_POST['firstname'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];


    //database connection
    $conn = new mysqli("localhost","root","","persoanlweb");
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("Insert into contactform(firstname,mail,message)
        values(?,?,?)");
        $stmt->bind_param("sss",$firstname,$mail,$message);

        if($stmt){
  
            ?>
    
            <script>
    
            function submitForm(form) {
                swal({
                        title: "Are you sure?",
                        text: "This form will be submitted",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                })
                .then(function (isOkay) {
                    if (isOkay) {
                        form.submit();
                    }
                });
            return false;
            }
            
            </script>
    
            <?php
              
        }else{
    
            ?>
    
            <script>
    
            swal({
             title: "Failed",
             text: "Data not insertd",
             icon: "error",
             });
    
    
    
            </script>
    
            <?php
    
    
        }
        
        $stmt->execute();
        $stmt->close();
        $conn->close();

    }
    
?>