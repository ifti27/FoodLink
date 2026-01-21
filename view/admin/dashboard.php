<?php
session_start();
require_once("../../model/usermodel.php");
$donors= showuser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Link | Dashboard</title>
    <link rel="stylesheet" href="../css/adminDashboard.css">
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
            <a href="home.php" id="logoTag">FoodLink</a>
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
          <div id="navbar4">
            <i class="fa-solid fa-users"></i>
            <a href="donorList.php">Reciever List</a>
          </div>
          <div id="navbar3">
            <i class="fa-solid fa-file-lines"></i>
            <a href="complaints.php">Complaints</a>
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
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <a href="signIn.php">Sign Out</a>
          </div>
       
    </section>
    <section id="mainPart">
      <h2>Dashboard</h2>
      <div class="dashboard">
        <div class="dashDiv" id="dashDiv1">
            <h1 style="font-size:20px">Total Donars</h1>
            <span name="donornumber"></span>
        </div>
        <div class="dashDiv" id="dashDiv2">
            <h1 style="font-size:20px">Total Reciever</h1>
            <span name="recievernumber"></span>
        </div>
        <div class="dashDiv" id="dashDiv3">
            <h1 style="font-size:20px">Complaints</h1>
            <span name="complaintnumber"></span>
        </div>
      </div>

    
    <h2>Donors</h2>

    <table >
      <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Code</th>
      </tr>
      <?php 
      if(!empty($donors))
        {
          foreach($donors as $user) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                  echo "<td>" . htmlspecialchars($user['name']) . "</td>";
                  echo "<td>" . htmlspecialchars($user['phone']) . "</td>";
                  echo "<td>" . htmlspecialchars($user['address']) . "</td>";
                  echo "<td>" . htmlspecialchars($user['code']) . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5' style='text-align:center;'>No donors found</td></tr>";
        }  
      ?>
    </table>
    </section>
</body>
</html>