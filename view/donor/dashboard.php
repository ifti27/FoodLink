<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 2) {
   
    header("Location: ../../view/login/signIn.php");
    exit();
}

$name = $_SESSION['name'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>PostFood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../view/css/dashboard.css">
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
      <h2>Dashboard</h2>
      <div class="dashboard">
        <div class="dashDiv" id="dashDiv1">Total Donations</div>
        <div class="dashDiv" id="dashDiv2">Active Posts</div>
        <div class="dashDiv" id="dashDiv3">Expired</div>
      </div>
      <div class="PostFoodTable">
        <table border="1">
            <tr>
                <th>Food Image</th>
                <th>Food Name</th>
                <th>Quantity</th>
                <th>Location</th>
                <th>Time(Hours)</th>
                <th>Status</th>
                <th></th>

            </tr>
            <?php
            require_once("../../controller/getAllFood.php");
            $food=getAllFoodDetails($name);
            foreach($food as $Food)
            { 
              
                echo "<tr>
                    <td>
                        <img src='../resource/" . basename($Food['imgpath']) . "' alt='Food Image' style= 'margin:5px 0px 0px 5px;width: 120px; height: 80px; object-fit: cover; border-radius: 10px;'>
                    </td>
                        <td>".$Food["fname"]."</td>
                        <td>".$Food["quantity"]."</td>
                        <td>".$Food["location"]."</td>
                        <td>".$Food["time"]."</td>
                        <td>".$Food["status"]."</td>
                       <td>

                          <form action='../../controller/deleteFood.php' method='POST'>
                              <input type='hidden' name='fname' value='".$Food['fname']."'>
                              <input type='submit' name='submit' value='delete' id='btndelete'>
                          </form>
                      </td>


                    </tr>";
               
            }
            ?>
        </table>






      </div>

      
<br><br>
  



    </section>

    
    
</body>
</html>





