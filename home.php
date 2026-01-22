<!DOCTYPE html>
<html>
    <head>
        <title>Food Link | Home</title>
        <link rel="stylesheet" href="home.css">
        <script src="script.js" defer></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="author" content="Muhtasin Ifti">
        <meta name="description" content="Don't let good food go to waste. Use FoodLink to donate food in your local area.
         Fast, free, and easy food sharing for everyone.">
    </head>
    <body>
        <header>
            <nav class="nav">
                <ul id="left">
                    <li><a id="title" href="home.php"><img id="logo" src="view/images/food-donation.png" alt="logo"><h3 style="display:inline;margin:5px;font-size:16px;">Food Link</h3></a></li>
                </ul>
                <ul id="right">
                    <li><a id="signIn" href="view/login/signIn.php">Sign In</a></li>
                    <li><a id="signUp" href="view/login/signUp.php">Get Started</a></li>
                </ul>
                <ul id="center">
                    <li><a id="home" href="view/landing/home.php">Home</a></li>
                    <li><a id="food" href="view/Receiver/available food/available_food.php">Browse Food</a></li>
                    <li><a id="work" href="view/Receiver/how_it_works/work.php">How it Works</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div id="tagline">
                <img id="taglogo" src="view/images/leaf.png">
                <p id="slogan">Reducing food waste, one meal at a time</p>
            </div>
            <h1 id="moto">Share Surplus Food, <span id="gradient-text">Nourish Communities</span></h1>
            <p id="text">Connect restaurants, hostels, and event organizers with students and underprivileged individuals. 
                Together, we can eliminate food waste.
            </p>
            <div id="btns">
                <a id="share" href="view/login/signIn.php">Start Sharing &rarr;</a>
                <a id="browse" href="view/login/signIn.php">Browse Available Food</a>
            </div>
            <div id="stat">
                <div id="mealst">
                    <span id="mealnum"></span>
                    <span id="info">Meal Shared</span>
                </div>
                <div id="donorst">
                    <span id="donornum"></span>
                    <span id="info">Active Donors</span>
                </div>
                <div id="foodst">
                    <span id="foodnum"></span>
                    <span id="info">Food Saved (kg)</span>
                </div>
            </div>
            <div id="manual">
                <h1 style="text-align: center;font-size: 50px;padding-top:10px;">How It Works</h1>
                <p style="width: 500px;margin:5px auto 5px auto;color: rgb(150, 150, 150);text-align: center;padding-bottom: 5px;">
                    Simple steps to share or receive food. Our platform makes it easy to connect donors with those in need.
                </p>
                <div id="guide">
                    <div id="step">1</div>
                    <div id="content">
                        <img src="view/images/upload.png" alt="upload" id="upload">
                        <h3 style="font-size: 18px;margin-left:6px ;">Post Food</h3>
                        <p style="color: rgb(150, 150, 150);margin: 6px;font-size: 15px;">
                            Donors post available food with details like quantity, pickup time, and location.
                        </p>
                    </div>
                </div>
                <div id="guide">
                    <div id="step2">2</div>
                    <div id="content">
                        <img src="view/images/search.png" alt="search" id="search">
                        <h3 style="font-size: 18px;margin-left:6px ;">Browse & Search</h3>
                        <p style="color: rgb(150, 150, 150);margin: 6px;font-size: 15px;">
                            Receivers browse available food, filter by type, location, or pickup time.
                        </p>
                    </div>
                </div>
                <div id="guide">
                    <div id="step3">3</div>
                    <div id="content">
                        <img src="view/images/location.png" alt="search" id="location">
                        <h3 style="font-size: 18px;margin-left:6px ;">Claim & Navigate</h3>
                        <p style="color: rgb(150, 150, 150);margin: 6px;font-size: 15px;">
                            Claim the food with one click and get directions to the pickup location.
                        </p>
                    </div>
                </div>
                <div id="guide">
                    <div id="step4">4</div>
                    <div id="content">
                        <img src="view/images/check.png" alt="search" id="check">
                        <h3 style="font-size: 18px;margin-left:6px ;">Confirm Pickup</h3>
                        <p style="color: rgb(150, 150, 150);margin: 6px;font-size: 15px;">
                            Pick up the food, confirm receipt, and help reduce food waste! That's one more meal saved.
                        </p>
                    </div>
                </div>
            </div>
            <div id="available">
                <div>
                    <h1>Available Now</h1>
                    <p style="color: rgb(150, 150, 150);">Fresh food waiting to be claimed near you</p>
                </div>
                <a id="view" href="view/landing/food.php">View All &rarr;</a>
                <div id="foodcatalog"></div>
            </div>
        </main>
        <footer>
            <div class="footer">
                <div id="footer">
                    <a id="title" href="view/landing/home.php"><img id="logo" src="view/images/food-donation.png" alt="logo"><h3 style="display:inline;margin:5px;font-size:16px;">Food Link</h3></a>
                    <p style="color: rgb(150, 150, 150);">Connecting surplus food with those who need it. Reduce waste, feed communities.</p>
                </div>
                <div id="footer">
                    <h3>Quick Links</h3>
                    <p><a href="view/landing/food.php">Browse Food</a></p>
                    <p><a href="view/landing/work.php">How It Works</a></p>
                    <p><a href="view/landing/signUp.php">Become a Donor</a></p>
                </div>
                <div id="footer">
                    <h3>Support</h3>
                    <p><a href="#">FAQ</a></p>
                    <p><a href="#">Contact Us</a></p>
                    <p><a href="#">Food Safety Guidelines</a></p>
                </div>
                <div id="footer">
                    <h3>Contact</h3>
                    <p style="display: flex;align-items: center;"><img id="mail" src="view/images/email.png" alt="email"><a href="mailto:foodlink@gmail.com">foodlink@gmail.com</a></p>
                    <div style="display: flex;align-items: center;"><img id="phone" src="view/images/call.png" alt="phone"><p style="color: rgb(150, 150, 150);display: inline-block;">+88013053879320</p></div>
                    <div style="display: flex;align-items: center;"><img id="locate" src="view/images/pin.png" alt="locator"><p style="color: rgb(150, 150, 150);display: inline;">Banasree,Dhaka,Bangladesh</p></div>
                </div>
            </div>
            <hr style="width: 95%;opacity: 0.5;">
            <div class="footer">
                <p style="color: rgb(150, 150, 150);padding-left: 35px;">&copy; 2024 FoodShare. All rights reserved.</p>
                <div id="policy">
                    <a style="margin-right: 20px;" href="#">Privacy Policy</a>
                    <a style="margin-right: 10px;"href="#">Terms & Conditions</a>
                </div>
            </div>
        </footer>
    </body>
</html>