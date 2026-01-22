<?php
session_start();
require_once("../../model/usermodel.php");
$complains=showcomplains();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Link | Dashboard</title>
    <link rel="stylesheet" href="../css/complain.css">
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
    <section id="mainPart">
        <h2 style="margin-bottom:30px;">Complains</h2>
        <table id="usertable" >
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Complain</th>
            <th>Action</th>
        </tr>
        <?php 
        if(!empty($complains)) {
            foreach($complains as $complain) {
        ?>
            <tr>
                <td><?php echo $complain["email"]; ?></td>
                <td><?php echo $complain["name"]; ?></td>
                <td><?php echo $complain["complaint"]; ?></td>
                <td>
                    <form action='../../controller/deletecomplainControl.php' method='POST'>
                        <input type='hidden' name='email' value='<?php echo $complain["email"]; ?>'>
                        <button type="submit" name="submit" id="delbtn">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center;'>No complains found</td></tr>";
        }
        ?>
        </table>
        <span style="color:red;"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?></span> 
    </section>
</body>