<?php
$insert = false;
if(isset($_POST['name']))
{
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Collect post variables
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $gender = $_POST['gender']; // Uncomment this line if you have a gender input field
    $maritial_status = $_POST['maritial_status'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $wish = $_POST['wish'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `fun`.`fun` (`name`, `nickname`, `gender`, `maritial_status`, `email`, `phone_number`, `wish`, `other`, `dt`) VALUES ('$name', '$nickname', '$gender', '$maritial_status', '$email', '$phone_number', '$wish', '$other', current_timestamp());"; // Added semicolon

    // Execute the query
     if($con->query($sql) == true){
        echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PAGE FOR FUN</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="funny dog">
    <div class="container">
    <h1> Page by PRADIP T. T. T. <h1>    
    <h2>WELCOME TO PAGE FOR FUN </h2>
        <p>Enter asked details ( विचारलेली माहीती भरा )</p>
        
        <?php
        if($insert == true){
        echo "<p > Thanks for submiting your form.</p>";
        }
        ?>
   <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your name ( इथे तुमचे नाव लिहा)">
    <input type="text" name="nickname" id="nickname" placeholder="Enter your nickname ( इथे तुमचे उपनाव लिहा)">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender ( इथे तुमचे लिंंग लिहा)">
    <input type="text" name="maritial_status" id="status" placeholder="Enter your maritial status ( इथे तुमची वैवाहिक स्तिथी लिहा)">
    <input type="email" name="email" id="email" placeholder="Enter your email address ( इथे तुमचा इ-मेल पत्ता लिहा)">
    <input type="phone" name="phone_number" id="phone" placeholder="Enter your phone number ( इथे तुमचा दुरध्वनी क्रमांंक लिहा)">
    <textarea name="wish" id="desc" cols="30" rows="10" placeholder="Enter your wish which you want to be completed in upcoming days ( तुमची एखादी इच्छा जी येत्या दिवसांत पुर्ण झाली पाहीजे )"></textarea>
    <textarea name="other" id="desc" cols="30" rows="10" placeholder="Enter whatever you want ( इथे तुमच्या मनात असेल ते लिहा )"></textarea>
    <button class="btn">Submit</button>
</form>

    </div>
    <script src="index.js"></script>

</body>
</html>
