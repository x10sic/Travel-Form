<?php
    $insert=false;
    if(isset($_POST['Name'])){
        $server="localhost";
        $username= "root";
        $password= "";
        $con =mysqli_connect($server, $username, $password);
        if(!$con){
            die("Connection to dB failed due to". mysqli_connect_error());
        }
        // echo "Connection Successful"
        $Name= $_POST['Name'];
        $Age= $_POST['Age'];
        $Gender= $_POST['Gender'];
        $Email= $_POST['Email'];
        $Phone= $_POST['Phone'];
        $Other= $_POST['Other'];

        $sql = "INSERT INTO `collegetrip2022`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('$Name','$Age','$Gender','$Email','$Phone','$Other', current_timestamp())";

        if($con->query($sql)==true){
            // echo "Insertion Success";
            $insert=true;
        }
        else {
            echo "ERROR : $sql <br> $con->error";
        }
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family-Roboto|Sriracha&display=swap" rel=""stylesheet>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Trip">
    <div class="container">
        <h1>Welcome to College Trip form</h1>
        <p>Enter your details and submit to confirm your participation in this Trip</p>
        <?php
        if($insert==true){
        echo "<p class='submitmsg'>Thanks for submisson, We are happy to have you onboard</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter your Name">
            <input type="text" name="Age" id="Age" placeholder="Enter your Age">
            <input type="text" name="Gender" id="Gender" placeholder="Enter your Gender">
            <input type="email" name="Email" id="Email" placeholder="Enter your Email">
            <input type="phone" name="Phone" id="Phone" placeholder="Enter your Phone No.">
            <textarea name="Other" id="Other" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>