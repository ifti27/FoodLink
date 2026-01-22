<?php

session_start();


?>




<!DOCTYPE html>
<html>
<head>
    <title>PostFood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../view/css/postFood.css">

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
        <h2>Post Available Food</h2>
        <p id="p1">Share your surplus food with those in need</p>

        <form action="../../controller/PostFoodValidation.php" method="POST" enctype="multipart/form-data">

            <div id="formp1">

                <h3 id="titleForm1"><i class="fa-solid fa-box-open"></i> Food Details</h3><br>
                <label for="foodName">Food Name</label>
                <input  type="text" id="foodName" name="foodName" placeholder="e.g. Vegetable Biriyani"><br>
                <span class="ErrSpan" name="foodNameErr"  ><?php if(isset($_SESSION['foodNameErr'])){echo $_SESSION["foodNameErr"];}?></span><br><br>
                

                <label for="quantity">Quantity</label>
                <input type="text" id="quantity" name="quantity"  ><br>
                <span class="ErrSpan" name="quanErr"  ><?php if(isset($_SESSION['quanErr'])){echo $_SESSION["quanErr"];}?></span><br><br>

                <label for="category">Category</label>
                <select id="dept" name="dept">

                    <option id="op1" value="">Select an Option</option>
                    <option id="indian" value="indian">Indian</option>
                    <option id="chinese" value="chinese">Chinese</option>
                    <option id="thai" value="thai">Thai</option>
                    <option id="fruits" value="fruits">Fruits</option>
                    <option id="bevarage" value="bevarage">Bevarage</option>
                    <option id="deserts" value="deserts">Deserts</option>
                    <option id="other" value="other">Other</option>

                </select><br>
                <span class="ErrSpan" name="catErr"  ><?php if(isset($_SESSION['catErr'])){echo $_SESSION["catErr"];}?></span><br><br>
                

                <label for="descrip">Description</label><br>
                <textarea type="text" id="descrip" name="descrip" placeholder="Describe the food, dietory info. etc."></textarea><br>
                <span class="ErrSpan1" ><?php if(isset($_SESSION['descripErr'])){echo $_SESSION['descripErr'];}?></span><br><br>

                <label for="foodImg">Food Image </label><br><br>
                <input type="file" name="file" id="foodImg" name="foodImg" ><br>
                <span class="ErrSpan1" ><?php if(isset($_SESSION['fileErr'])){echo $_SESSION["fileErr"];}?></span><br><br>

            </div>

            

            <div id="formp2">
                <div id="flogo2">

                    <h3><i class="fa-regular fa-clock"></i> Availability</h3>
                </div>
                <br>
                <label for="availabeHour">Available for(hours)</label><br>
                <input  type="text" id="foodNameTime" name="foodTime" placeholder="e.g. 4 (How long will the food remain fresh and safe to consume?)" ><br>
                <span class="ErrSpan1" ><?php if(isset($_SESSION['timeErr'])){echo $_SESSION['timeErr'];}?></span><br><br>



            </div>


            <div id="formp3">
                <div id="flogo3">

                    <h3><i class="fa-solid fa-location-dot"></i>Pickup Location</h3>
                </div>

                <br>
                <label for="address">Pickup Address</label><br><br>
                <input  type="text" id="address" name="address" placeholder=" Enter complete pickup address."><br>
                <span class="ErrSpan2" ><?php if(isset($_SESSION['addErr'])){echo $_SESSION['addErr'];}?></span><br><br>
                <input type="checkbox" id="cbox" name="cbox" value="cbox">
                <label for="cbox"><small>Same as default location.</small> </label><br><br>

                 <!-- <label for="instructions">Pickup Insructions</label><br>
                <input  type="text" id="instructions" name="instructions" placeholder="Ask for Jhon at the reception"><br> -->
                

            </div>

            <button type="submit" id="postFoodbtn">Post Food</button>
            <button type="button" id="cancel">Cancel</button>
        






        </form>








    </section>

    
    
</body>
</html>

<?php
unset($_SESSION['foodNameErr']);
unset($_SESSION['quanErr']);
unset($_SESSION['catErr']);
unset($_SESSION['descripErr']);
unset($_SESSION['fileErr']);
unset($_SESSION['timeErr']);
unset($_SESSION['addErr']);

?>
