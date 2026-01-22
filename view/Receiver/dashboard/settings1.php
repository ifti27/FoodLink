<?php


session_start();
$loggedInName = $_SESSION['name'];
require_once("../../../model/recieverModel.php");
$user=getReceiverByEmail($_SESSION['email']);

?>




<!DOCTYPE html>
<html>
<head>
    <title>GetFood</title>
    <link rel="stylesheet" href="../../css/settings1.css">
</head>
<body>

    <section class="sidebar">
        <div class="logo">
          <img src="img.png" alt="logo">
          <h3 id="logoTag">FoodShare</h3>
        </div>
        <br>
        <hr>
        <div class="navbars">
         
          
          <div id="navbar3">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <a href="myclaims.php">My Claims</a>
          </div>
          <div id="navbar4">
            <i class="fa-solid fa-gear"></i>
            <a href="settings1.php">Settings</a>
          </div>
          <div id="navbar1">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <a href="browse.php">Browse Here</a>
          </div>

        </div>

         <div id="signOut">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <a href="../../../view/login/signIn.php">Sign Out</a>
          </div>
       
    </section>

    <section class="main">
        <h2>Settings</h2>
        <p id="p1">Manage your account and preferences</p>

        <form action="../../../controller/settingsValidation.php" method="POST">

            <div id="formp1">

              <h3 id="titleForm1"> <i class="fa-regular fa-user"></i> Profile Information</h3><br>
              


                <label for="orgName">Name</label>
                <input  type="text" id="orgName" name="orgName" placeholder="Ayon" value="<?php echo $user['name'] ?? '' ?>" ><br>
                <span class="ErrSpan" name="orgNameErr"><?php if(isset($_SESSION['orgNameErr'])){echo $_SESSION["orgNameErr"];}?></span><br><br>

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="abc@gmail.com" value="<?php echo $user['email'] ?? '' ?>" ><br>
                <span class="ErrSpan" name="emailErr"><?php if(isset($_SESSION['emailErr'])){echo $_SESSION['emailErr'];}?></span><br><br>

                <label for="phnNo">Phone Number</label>
                <input type="text" id="phnNo" name="phnNo" placeholder="01*********"><br><br><br>

                <label for="defaultAdd">Prefered Location</label>
                <input  type="text" id="defaultAdd" name="defaultAdd" placeholder="436 Residential Area, City" value="<?php echo $user['address'] ?? '' ?>" ><br><br>
                <button id="saveChange" name="saveChange" type="submit">Save Changes</button>

            </div>

            

            <div id="formp3">

              <div id="titleForm3">
                <h3><i class="fa-solid fa-shield"></i> Security</h3>
              </div>

              <a href="../changePass/changePassword.php" id="cngPassbtn">Change Password</a>
              <button id="deleteAcc" name="deleteAccount" type="submit" onclick="return confirm('Warning: This will permanently delete your account. Proceed?')">Delete Account</button>
               



            </div>
        </form>
    </section>      
            
  </body>
</html>

<?php

unset($_SESSION['orgNameErr']);
unset($_SESSION['emailErr']);

?>