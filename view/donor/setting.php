<?php

session_start();




?>




<!DOCTYPE html>
<html>
<head>
    <title>PostFood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../view/css/setting.css">
</head>
<body>

    <section class="sidebar">
        <div class="logo">
            <div id="logoImg">
                <i class="fa-regular fa-heart"></i>
            </div>
            <h3 id="logoTag">FoodLink</h3>
        </div>
        <br>
        <hr>
        <div class="navbars">
          <div id="navbar1">
            <i class="fa-regular fa-house"></i>
            <a href="dashboard.php">Dash board</a>
          </div>
          <div id="navbar2">
            <i class="fa-solid fa-plus"></i>
            <a href="postFood.php">Post Food</a>
          </div>
          <div id="navbar3">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <a href="history.php">History</a>
          </div>
          <div id="navbar4">
            <i class="fa-solid fa-gear"></i>
            <a href="setting.php">Settings</a>
          </div>

        </div>

        <div id="userProfile">
            <i class="fa-solid fa-circle-user"></i> 
            <span class="user-name"><?php echo ($_SESSION['name'] ?? 'Guest'); ?></span>
        </div>
    
         <div id="signOut">
           
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <a href="../login/signIn.php">Sign Out</a>
        </div>
       
    </section>

    <section class="main">
        <h2>Settings</h2>
        <p id="p1">Manage your account and preferences</p>

        <form action="../../controller/settingsValidation.php" method="POST">

            <div id="formp1">

              <h3 id="titleForm1"> <i class="fa-regular fa-user"></i> Profile Information</h3><br>
              <!-- <div class="picUpload">
                <div id="picUpload"></div>
                <button id="cngPicbtn">Change Photo</button>
              </div><br> -->


                <label for="orgName">New Name</label>
                <input  type="text" id="orgName" name="orgName" placeholder="e.g. Hotel Grand Palace" ><br>
                <span class="ErrSpan" name="orgNameErr"><?php if(isset($_SESSION['orgNameErr'])){echo $_SESSION["orgNameErr"];}?></span><br><br>

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="abc@gmail.com" ><br>
                <span class="ErrSpan" name="emailErr"><?php if(isset($_SESSION['emailErr'])){echo $_SESSION['emailErr'];}?></span><br><br>

                <label for="phnNo">Phone Number</label>
                <input type="text" id="phnNo" name="phnNo" placeholder="01*********"><br>
                <span class="ErrSpan" name="phnNoErr"><?php if(isset($_SESSION['phnNoErr'])){echo $_SESSION['phnNoErr'];}?></span><br><br>


                <label for="defaultAdd">Default Address</label>
                <input  type="text" id="defaultAdd" name="defaultAdd" placeholder="123 Main Street, Downtown" ><br>
                <span class="ErrSpan" name="defAddErr"><?php if(isset($_SESSION['defAddErr'])){echo $_SESSION['defAddErr'];}?></span><br><br>

                <!-- <label for="about">About</label><br>
                <textarea  type="text" id="about" name="about" placeholder="A five star hotel committed to reduce food waste"></textarea><br>
                <span class="ErrSpan1" ><?php if(isset($_SESSION['aboutErr'])){echo $_SESSION['aboutErr'];}?></span><br><br> -->

                <button id="saveChange" type="submit">Save Changes</button>

            </div>

            <!-- <div id="formp2">
              <div id="titleForm2">
                <h3><i class="fa-regular fa-bell"></i> Notifications</h3>
              </div><br><br>
    
              <div class="setting-row">

                 <div class="text-content">
                 <h3>New Claims</h3>
                 <small>Get notified when someone claims your food</small>
                 </div>

                <label class="switch">
                <input type="checkbox" checked>
                <span class="slider"></span>
                </label>
              </div>

              <div class="setting-row">
                <div class="text-content">
                <h3>Pickup Reminders</h3>
                <small>Remind me about pending pickups</small>
                </div>

                <label class="switch">
                <input type="checkbox" checked>
                <span class="slider"></span>
                </label>

              </div>

              <div class="setting-row">
                 <div class="text-content">
                 <h3>Dark Mood</h3>
                 <small>Change the theme according to your preference.</small>
             
              </div>

                 <label class="switch">
                 <input type="checkbox">
                 <span class="slider"></span>
                </label>
               </div>

              <button id="savePreferences">Save Preferences</button>
            </div> -->
        </form>
        <form action="../../controller/deleteDonar.php" method="POST" onsubmit="return confirm('WARNING: Are you sure you want to permanently delete your account?')">
            <div id="formp3">

              <div id="titleForm3">
                <h3><i class="fa-solid fa-shield"></i> Security</h3>
              </div>

              <button id="cngPassbtn">Change Password</button>
              <form action="../../controller/deleteDonar.php" method="POST">
                  <button id="deleteAcc" type="submit" name="delete_btn">Delete Account</button>
              </form>
               



            </div>
        </form>
    </section>      
            
  </body>
</html>

<?php

unset($_SESSION['orgNameErr']);
unset($_SESSION['emailErr']);
unset($_SESSION['phnNoErr']);
unset($_SESSION['defAddErr']);
unset($_SESSION['aboutErr']);


?>