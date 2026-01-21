<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Food Link | Sign In</title>
    <link rel="stylesheet" href="../css/forgotpass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="script.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="Muhtasin Ifti">
    <meta name="description" content="Don't let good food go to waste. Use FoodLink to donate food in your local area.
         Fast, free, and easy food sharing for everyone.">
</head>

<body>
    <div id="side">
        <div id="sidetitle">
            <h1>Join the movement</h1>
            <text>Every meal shared is a step towards a hunger-free community. Together, we can make a
                difference.</text>
        </div>
    </div>
    <div id="passReset">
        <div id="heading">
            <a id="title" href="../../home.php"><img id="logo" src="../images/food-donation.png" alt="logo">
                <h3 style="display:inline;margin:5px;font-size:25px;">Food Link</h3>
            </a>
        </div>
        <h2>Reset Your Password</h2>
        <form action="../../controller/forgetpassControl.php" method="POST">
            <p style="color:rgb(150,150,150)">reset your password to resume sharing</p>
            <select name="usertype" id="usertype">
                    <option id="none" value="">Select your role</option>
                    <option id="donor" value="donor">Donor</option>
                    <option id="reciever" value="reciever">Reciever</option>
                    <option id="admin" value="admin">Admin</option>
                </select><br>
                <span name="userErr" style="color:red"><?php if(isset($_SESSION['userErr'])) {echo $_SESSION['userErr'];unset($_SESSION['userErr']);} ?></span><br>
            <label for="email" style="margin-bottom: 10px;">Email</label><br>
            <input type="text" style="margin-top: 15px;" id="email" name="email"
                placeholder="xyz@example.com"><br>
            <span name="emailErr"
                style="color:red"><?php if (isset($_SESSION['emailErr'])) {
                    echo $_SESSION['emailErr'];
                    unset($_SESSION['emailErr']);
                } ?></span><br>
            <label for="code" style="margin-top: 10px;">Code</label><br>
            <input type="text" id="codefld" style="margin-bottom: 10px; margin-top: 10px;" name="code" placeholder="01234567"><br>
            <span name="codeErr" style="color:red"><?php if(isset($_SESSION['codeErr'])){echo $_SESSION['codeErr'];unset($_SESSION['codeErr']);}?></span><br>
            <label for="pass" style="margin-top: 30px;">Password</label><br>
            <div class="pass-wrapper">
                    <input type="password" id="passfld" name="pass" style="margin-top: 10px;">
                    <i class="fa-solid fa-eye" id="togglePass" onclick="toggleVisibility('passfld', 'togglePass')"></i>
            </div><br>
            <span name="passErr"
                style="color:red"><?php if (isset($_SESSION['passErr'])) {
                    echo $_SESSION['passErr'];
                    unset($_SESSION['passErr']);
                } ?></span><br>
            <label for="pass" style="margin-top: 10px;">Confirm Password</label><br>
            <div class="pass-wrapper">
                    <input type="password" id="conpassfld" name="conpass" style="margin-top: 5px;">
                    <i class="fa-solid fa-eye" id="togglePass" onclick="toggleVisibility('conpassfld', 'togglePass')"></i>
            </div><br>
            <span name="conpassErr"
                style="color:red"><?php if (isset($_SESSION['conpassErr'])) {
                    echo $_SESSION['conpassErr'];
                    unset($_SESSION['conpassErr']);
                } ?></span><br>
            <input type="submit" id="resetbtn" value="Reset">
        </form>
        
    </div>
</body>

</html>