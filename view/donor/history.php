<?php
session_start();

require_once('../../model/donarModel.php');

$name = $_SESSION['name'];
$totalPosts = getTotalFoodPosts($name);
?>



<!DOCTYPE html>
<html>
<head>
    <title>PostFood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../view/css/history.css">
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
    <section id="mainPart">
      <h2>Donation History</h2>
      <div class="history">
        <div class="hisDiv" id="hisDiv1">
          <h4>Total Posts</h4> <br>
          <h2 style="color: green;"><?php echo $totalPosts; ?></h2>
        </div>
        <div class="hisDiv" id="hisDiv2">Completed</div>
        <div class="hisDiv" id="hisDiv3">Expired</div>
      
      </div>





    </section>



    
    
</body>
</html>
