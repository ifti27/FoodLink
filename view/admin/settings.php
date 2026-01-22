<?php
session_start();
require_once("../../model/usermodel.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Link | Dashboard</title>
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="script.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="author" content="Muhtasin Ifti">
    <meta name="description" content="Don't let good food go to waste. Use FoodLink to donate food in your local area.
         Fast, free, and easy food sharing for everyone.">
</head>
<body>
   <section class="sidebar">
        <div class="logo">
            <div id="logoImg">
                <i class="fa-regular fa-heart"></i>
            </div>
            <a href="../../home.php" id="logoTag">FoodLink</a>
        </div>
        <br>
        <hr style="hieght: 0.5px;">
        <div class="navbars">
          <div id="navbar1">
            <i class="fa-solid fa-house"></i>
            <a href="dashboard.php">Dash board</a>
          </div>
          <div id="navbar2">
            <i class="fa-solid fa-users"></i>
            <a href="donorList.php">Donor List</a>
          </div>
          <div id="navbar6">
            <i class="fa-solid fa-users"></i>
            <a href="recieverlist.php">Reciever List</a>
          </div>
          <div id="navbar3">
            <i class="fa-solid fa-file-lines"></i>
            <a href="complain.php">Complains</a>
          </div>
          <div id="navbar4">
            <i class="fa-solid fa-gear"></i>
            <a href="settings.php">Settings</a>
          </div>
          <div id="navbar5">
            <i class="fa-solid fa-user"></i>
            <span style="font-size:20px;margin-left:10px;"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?></span>
          </div>
        </div>
         <div id="signOut">
            <form action="../../controller/logout.php" method="POST">
                 <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <button type="submit" id="logout">Sign Out</button>
            </form>
          </div>
    </section>
      <section class="main">
        <h2>Settings</h2>
        <p id="p1">Manage your account and preferences</p>

        <form action="../../controller/settingsControl.php" method="POST">

            <div id="formp1">

              <h3 id="titleForm1"> <i class="fa-regular fa-user"></i> Profile Information</h3><br>
                <label for="orgName">Name</label><br>
                <input  type="text" id="orgName" name="name" placeholder="e.g. david" ><br>
                <span class="ErrSpan" name="orgNameErr"><?php if(isset($_SESSION['nameErr'])){echo $_SESSION['nameErr'];unset($_SESSION['nameErr']);}?></span><br>

                <label for="email">Email</label><br>
                <input type="text" id="email" name="email" placeholder="abc@gmail.com" ><br>
                <span class="ErrSpan" name="emailErr"><?php if(isset($_SESSION['emailErr'])){echo $_SESSION['emailErr'];unset($_SESSION['emailErr']);}?></span><br>

                <label for="phnNo">Phone Number</label><br>
                <input type="text" id="phnNo" name="phone" placeholder="01234567891"><br>
                <span class="ErrSpan" name="phnNoErr"><?php if(isset($_SESSION['phoneErr'])){echo $_SESSION['phoneErr'];unset($_SESSION['phoneErr']);}?></span><br>


                <label for="defaultAdd">Default Address</label><br>
                <input  type="text" id="defaultAdd" name="addr" placeholder="123 Main Street, Downtown" ><br>
                <span class="ErrSpan" name="defAddErr"><?php if(isset($_SESSION['addErr'])){echo $_SESSION['addErr'];unset($_SESSION['addrErr']);}?></span><br>
                <span style="color:green"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];unset($_SESSION['message']);}?></span><br>
                <button id="saveChange" type="submit">Save Changes</button>

            </div>
        </form>  
    </section>  
</body>