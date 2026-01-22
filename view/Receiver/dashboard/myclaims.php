<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 3) 
{
   
    header("Location: ../../../view/login/signIn.php");
    exit();
}
$name = $_SESSION['name'];
require_once("../../../controller/confirmController.php");
$claimedfood = getMyClaims($name);


?>
<!DOCTYPE html>
<html>
<head>
    <title>GetFood</title>
    <link rel="stylesheet" href="myclaims.css">
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

    <section id="mainPart">
      <h2 id="hash">My Claims</h2>
      <p id="p2">View and manage your claimed food items here.</p>

      <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Food Name</th>
                <th>Quantity</th>
                <th>date</th>
                <th>Status</th>
                <th></th>

            </tr>
            <?php
            require_once("../../../controller/confirmController.php");
            require_once("../../../model/FoodModel.php");
            $claimedfood = getMyClaims($name);
            foreach($claimedfood as $Food)
            { 
              
                echo "<tr>
                    
                        <td>".$Food["id"]."</td>
                        <td>".$Food["name"]."</td>
                        <td>".$Food["fname"]."</td>
                        <td>".$Food["quantity"]."</td>
                        <td>".$Food["date"]."</td>
                        <td>".$Food["status"]."</td>
                       <td>

                          <form action='../../Controller/deleteFood.php' method='POST'>
                              <input type='hidden' name='fname' value='".$Food['fname']."'>
                             
                          </form>
                      </td>


                    </tr>";
               
            }
            ?>
        </table>

      </section>
  </body>
</html>

