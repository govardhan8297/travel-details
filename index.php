<?php
$insert = false;
if(isset($_POST['name'])){
 $server ="localhost";
 $username ="root";
$password ="";

$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to db";
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `trip`.`trip_details` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if($con->query($sql) == true){
    // echo "Succesfully inserted";
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}


$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trip</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h1>Welcome to Naga's Website</h1>
      <p>This is a something that you see very often.</p>
      <?php 
      if($insert == true){
       echo "<p class='submitMsg'>Thanks for Submitting your form.</p>"; }?>
      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter Your Name"
        />
        <input
          type="number"
          name="age"
          id="age"
          placeholder="Enter Your Age"
        /><input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter Your Gender"
        /><input
          type="email"
          name="email"
          id="email"
          placeholder="Enter Your Email"
        /><input
          type="phone"
          name="phone"
          id="phone"
          placeholder="Enter Your Phone"
        /><textarea
          name="desc"
          id="desc"
          rows="10"
          cols="30"
          placeholder="Enter any other information"
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>
