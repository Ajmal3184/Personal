<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>


    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Review</div>
    <div class="content">
      <form method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="FullName" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="Email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="PhoneNumber" required>
          </div>
          <div class="input-box">
            <span class="details">Your Review</span>
            <input type="text" placeholder="Enter review" name="YourReview" required>
          </div>

        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

<?php

include 'connection.php';



 if(isset($_POST['submit'])){

  $FullName = $_POST['FullName'];
  $Email = $_POST['Email'];
  $PhoneNumber = $_POST['PhoneNumber'];
  $YourReview = $_POST['YourReview'];


    $insert = "Insert into review(FullName,Email,PhoneNumber,YourReview)values('$FullName','$Email','$PhoneNumber','$YourReview')";

    $query= mysqli_query($conn,$insert);

    if($query){

    	?>

    	<script>

    	swal({
         title: "Thank you for your review",
         text: "Successful",
         icon: "success",
         });



    	</script>

    	<?php

    }else{

    	?>

    	<script>

    	swal({
         title: "Failed",
         text: "Data not insertd",
         icon: "error",
         })
         .then(function(isOkay){
            if (isOkay) {
               form.submit();
             }
         });



    	</script>

    	<?php


    }


 }


?>

</body>
</html>