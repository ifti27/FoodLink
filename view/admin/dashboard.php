<?php
session_start();
require_once("../../model/usermodel.php");
$donors= showuser();
$recievers=showreciever();
$complains=showcomplains();
$donornum=donornum();
$recievernum=recievernum();
$complainnum=complainnum();

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
            <a href="donorList.php">Reciever List</a>
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
      <h2>Dashboard</h2>
      <div class="dashboard">
        <div class="dashDiv" id="dashDiv1">
            <h1 style="font-size:20px">Total Donars</h1>
            <span name="donornumber" style="font-size: 25px;"><?php echo $donornum ?></span>
        </div>
        <div class="dashDiv" id="dashDiv2">
            <h1 style="font-size:20px">Total Reciever</h1>
            <span name="recievernumber" style="font-size: 25px;"><?php echo $recievernum ?></span>
        </div>
        <div class="dashDiv" id="dashDiv3">
            <h1 style="font-size:20px">Complaints</h1>
            <span name="complaintnumber" style="font-size: 25px;"><?php echo $complainnum ?></span>
        </div>
      </div>
    
    <h2>Donors</h2>
    <table id="usertable" >
      <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Code</th>
        <th>Action</th>
      </tr>
      <?php 
    if(!empty($donors)) {
        foreach($donors as $user) {
    ?>
        <tr>
            <td><?php echo $user["email"]; ?></td>
            <td><?php echo $user["name"]; ?></td>
            <td><?php echo $user["phone"]; ?></td>
            <td><?php echo $user["address"]; ?></td>
            <td><?php echo $user["code"]; ?></td>
            <td>
                <form action='../../controller/deleteuserControl.php' method='POST'>
                    <input type='hidden' name='email' value='<?php echo $user["email"]; ?>'>
                    <button type="submit" name="submit" id="delbtn">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
        </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;'>No donors found</td></tr>";
    }
    ?>
    </table>
    <span style="color:red;"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?></span>
    <div id="view">
      <a href="donorlist.php" id="viewbtn">View All</a>
    </div>
    <h2 style="margin-top:30px;">Recivers</h2>
    <table id="usertable" >
      <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Code</th>
        <th>Action</th>
      </tr>
      <?php 
    if(!empty($recievers)) {
        foreach($recievers as $users) {
    ?>
        <tr>
            <td><?php echo $users["email"]; ?></td>
            <td><?php echo $users["name"]; ?></td>
            <td><?php echo $users["phone"]; ?></td>
            <td><?php echo $users["address"]; ?></td>
            <td><?php echo $users["code"]; ?></td>
            <td>
                <form action='../../controller/deleterecieverControl.php' method='POST'>
                    <input type='hidden' name='email' value='<?php echo $users["email"]; ?>'>
                    <button type="submit" name="submit" id="delbtn">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
        </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;'>No recievers found</td></tr>";
    }
    ?>
    </table>
    <span style="color:red;"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?></span>
    <div id="view">
      <a href="recieverlist.php" id="viewbtn">View All</a>
    </div>
    <h2 style="margin-top:30px;">Complains</h2>
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
        echo "<tr><td colspan='4' style='text-align:center;'>No complaints found</td></tr>";
    }
    ?>
    </table>
    <span style="color:red;"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?></span> 
    <div id="view">
      <a href="complains.php" id="viewbtn">View All</a>
    </div>
  </section>
</body>
</html>