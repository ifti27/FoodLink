<?php
session_start();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Food Link | Sign Up</title>
        <link rel="stylesheet" href="../css/signUp.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="script.js" defer></script>
        <meta charset="UTF-8">
        <script src="script.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="author" content="Muhtasin Ifti">
        <meta name="description" content="Don't let good food go to waste. Use FoodLink to donate food in your local area.
         Fast, free, and easy food sharing for everyone.">
    </head>
    <body>
        <div id="side">
            <div id="sidetitle">
                <h1>Join the movement</h1>
                <text>Every meal shared is a step towards a hunger-free community. Together, we can make a difference.</text>
            </div>
        </div>
        <div id="signUp">
            <div id="heading">
                <a id="title" href="../../home.php"><img id="logo" src="../images/food-donation.png" alt="logo"><h3 style="display:inline;margin:5px;font-size:25px;">Food Link</h3></a>
            </div>
            <h2>Welcome Back</h2>
            <form action="../../controller/signUpControl.php" method="POST">
                <p style="color:rgb(150,150,150)">Sign up to reduce food waste</p>
                <select name="usertype" id="usertype">
                    <option id="none" value="">Select your role</option>
                    <option id="donor" value="donor">Donor</option>
                    <option id="reciever" value="reciever">Reciever</option>
                    <option id="admin" value="admin">Admin</option>
                </select><br>
                <span name="userErr" style="color:red"><?php if(isset($_SESSION["userErr"])) {echo $_SESSION["userErr"];unset($_SESSION['userErr']);} ?></span><br>
                <label for="name" style="margin-bottom: 15px;">Name</label><br>
                <input type="text" style="margin-top: 15px;margin-bottom: 5px;" id="namefld" name="name" placeholder="e.g. John"><br>
                <span name="nameErr" style="color:red"><?php if(isset($_SESSION["nameErr"])) {echo $_SESSION["nameErr"];unset($_SESSION['nameErr']);} ?></span><br>
                <label for="email" style="margin-bottom: 15px;">Email</label><br>
                <input type="text" id="emailfld" name="email" placeholder="e.g. xyz@gmail.com" style="margin-top: 10px;"><br>
                <span id="emailStatus" style="font-size: 12px; font-weight: bold;"></span><br>
                <span name="emailErr" style="color:red"><?php if(isset($_SESSION["emailErr"])) {echo $_SESSION["emailErr"];unset($_SESSION['emailErr']);} ?></span><br>
                <label for="addr" style="margin-top: 15px;">Address</label><br>
                <input type="text" id="addrfld" name="addr" style="margin-top: 10px;"><br>
                <span name="addrErr" style="color:red"><?php if(isset($_SESSION["addrErr"])) {echo $_SESSION["addrErr"];unset($_SESSION['addrErr']);} ?></span><br>
                <label for="phone" style="margin-top: 15px;">Phone</label><br>
                <input type="text" id="phonefld" name="phone" placeholder="e.g. 0173214589" style="margin-top: 10px;"><br>
                <span name="phoneErr" style="color:red"><?php if(isset($_SESSION["phoneErr"])) {echo $_SESSION["phoneErr"];unset($_SESSION['phoneErr']);} ?></span><br>
                <label for="pass" style="margin-top: 15px;">Password</label><br>
                <div class="pass-wrapper">
                    <input type="password" id="passfld" name="pass" style="margin-top: 10px;">
                    <i class="fa-solid fa-eye" id="togglePass" onclick="toggleVisibility('passfld', 'togglePass')"></i>
                </div><br>
                <span name="passErr" style="color:red"><?php if(isset($_SESSION["passErr"])) {echo $_SESSION["passErr"];unset($_SESSION['passErr']);} ?></span><br>
                <label for="conpass">Confirm Password</label><br>
                <div class="pass-wrapper">
                    <input type="password" id="conpassfld" name="conpass" style="margin-top: 10px;">
                    <i class="fa-solid fa-eye" id="toggleConPass" onclick="toggleVisibility('conpassfld', 'toggleConPass')"></i>
                </div><br>
                <span name="conpassErr" style="color:red"><?php if(isset($_SESSION["conpassErr"])) {echo $_SESSION["conpassErr"];unset($_SESSION['conpassErr']);} ?></span><br>
                <input type="submit" id="signbtn" value="Sign Up">
            </form> 
            <span name="genErr" style="color:red"><?php if(isset($_SESSION['$genErr'])) {echo $_SESSION['$genErr'];unset($_SESSION['genErr']);} ?></span><br>
            <div style="margin-top: 15px;">
                <text style="color: rgb(150, 150, 150);">
                    Existing user?
                </text>
                <a id="signIn" href="signIn.php">Sign In</a>
            </div>
        </div>
    </body>
</html>