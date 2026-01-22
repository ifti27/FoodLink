<?php
session_start();
$loggedInName = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Available Food </title>
        <link rel="stylesheet" href="../../css/style.css">
         <link rel="stylesheet" href="myclaims.css">
    </head>
    <body>
        <section class="sidebar">
        <div class="logo">
          <img src="img.png" alt="logo">
            <h3 id="logoTag">FoodShare</h3>
        </div>
        <br>
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
        <section class="mainPart">
        <input type="text" id="search" placeholder="Search food ..." >
        </section>
        
        
       <div class="card-container" id="foodresult">
        <div class="column">
       <div class="card">

    <div class="image-box">
      <img src="biriyani.jpg" alt="Biryani">
      <span class="tag">Indian</span>
      <span class="time"> 2 hours</span>
    </div>

    
    <div class="content">
      <h2>Fresh Vegetable Biryani</h2>
      <p class="hotel">by Hotel Grand Palace</p>

      <div class="info">
        <span>15 portions</span>
        <span> 0.5 km</span>
      </div>

      <button class="b" onclick="claimFood('Fresh Vegetable Biryani', 15)">Claim Now</button>
    </div>
    </div>
    <div class="card4">
    <div class="image-box">
        <img src="dal.jpg" alt="Dal Makhni">
        <span class="tag">Indian</span>
        <span class="time">4 hours</span>
        </div>

        <div class="content">
        <h2>Dal Makhni</h2>
        <p class="hotel">by Hotel Grand Palace</p>

        <div class="info">
            <span>25 portions</span>
            <span>2.1 km</span>
        </div>
        <button class="b" onclick="claimFood('Dal Makhni', 25)">Claim Now</button>
        </div>
    </div>
    </div>
    <div class="column">
    <div class="card2">

    <div class="image-box">
        <img src="sandwich.jpg" alt="Sandwich">
        <span class="tag">Fast Food</span>
        <span class="time"> 3 hour</span>
        </div>

        <div class="content">
        <h2>Veggie Sandwich</h2>
        <p class="hotel">by Cafe Delight</p>

        <div class="info">
            <span>10 portions</span>
            <span> 1 km</span>
        </div>
        <button class="b" onclick="claimFood('Veggie Sandwich', 10)">Claim Now</button>
        </div>
    </div>
    <div class="card5">
    <div class="image-box">
        <img src="rice.jpg" alt="Fried Rice">
        <span class="tag">Chinese</span>
        <span class="time">3 hour</span>
        </div>

        <div class="content">
        <h2>Classic Fried Rice</h2>
        <p class="hotel">by Hotel Grand Palace</p>

        <div class="info">
            <span>30 portions</span>
            <span>3 km</span>
        </div>
        <button class="b" onclick="claimFood('Classic Fried Rice', 30)">Claim Now</button>
        </div>
    </div>
    </div>
    <div class="column">
    <div class="card3">
    <div class="image-box">
        <img src="mix.jpg" alt="mix fruit">
        <span class="tag">Fruits</span>
        <span class="time">30 minutes</span>
        </div>

        <div class="content">
        <h2>Mixed Fruit Salad</h2>
        <p class="hotel">by Fresh Fruits Corner</p>

        <div class="info">
            <span>20 portions</span>
            <span> 0.8 km</span>
        </div>
        <button class="b" onclick="claimFood('Mixed Fruit Salad', 20)">Claim Now</button>
        </div>
    </div>
    

    
    <div class="card6">
    <div class="image-box">
        <img src="pasta.jpg" alt="Pasta">
        <span class="tag">Italian</span>
        <span class="time">1 hour</span>
        </div>

        <div class="content">
        <h2>Spaghetti Aglio e Olio</h2>
        <p class="hotel">by Cafe Delight</p>

        <div class="info">
            <span>12 portions</span>
            <span>1.5 km</span>
        </div>
        <button class="b" onclick="claimFood('Spaghetti Aglio e Olio', 12)">Claim Now</button>
        </div>
</div>
</div>
    <div class="column">
        <div class="card7">
    <div class="image-box">
        <img src="cake.jpg" alt="Cake">
        <span class="tag">Dessert</span>
        <span class="time">45 minutes</span>
        </div>

        <div class="content">
        <h2>Chocolate Fudge Cake</h2>
        <p class="hotel">by Sweet Treats Bakery</p>

        <div class="info">
            <span>8 portions</span>
            <span>2 km</span>
        </div>
        <button class="b" onclick="claimFood('Chocolate Fudge Cake', 8)">Claim Now</button>
        </div>
</div>

    <div class="card8">
    <div class="image-box">
        <img src="orange.jpeg" alt="Juice">
        <span class="tag">Healthy</span>
        <span class="time">20 minutes</span>
        </div>

        <div class="content">
        <h2>Orange Juice</h2>
        <p class="hotel">by Fresh Fruits Corner</p>

        <div class="info">
            <span>18 portions</span>
            <span>0.7 km</span>
        </div>
        <button class="b" onclick="claimFood('Orange Juice', 18)">Claim Now</button>
        </div>
     </div>
    </div>
    </div>
    </section>
    <script>
        function claimFood(foodName, foodQuantity) {
            alert("You have successfully claimed the food!");
            let xhrClaim=new XMLHttpRequest();
            xhrClaim.open("POST","../../../controller/ClaimController.php", true);
            xhrClaim.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhrClaim.send("fname="+ foodName + "&quantity=" + foodQuantity);
}
        document.getElementById("search").addEventListener("keyup",function(){
            let searchValue=this.value;
            let xhrSearch=new XMLHttpRequest();
            xhrSearch.open("GET","../../../controller/FoodController.php?keyword=" + searchValue, true);
            
            xhrSearch.onreadystatechange=function(){
                if(xhrSearch.readyState==4 && xhrSearch.status==200){
                    document.getElementById("foodresult").innerHTML=this.responseText;
                }
            };
           xhrSearch.send();

        });
         
    </script>
    

        
</body>
</html>