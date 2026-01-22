<?php
require_once("../model/FoodModel.php");

class FoodController {
     function search() {
        if (isset($_GET['keyword'])) {
            $key = $_GET['keyword'];
            $foods = searchFood($key); 

            if ($foods && mysqli_num_rows($foods) > 0) {
                while ($row = mysqli_fetch_assoc($foods)) {
                    
                    echo '<div class="card">
                            <div class="image-box">
                                <img src="' . $row['food_image'] . '" alt="' . $row['fname'] . '">
                                <span class="tag">Available</span>
                                <span class="time">' . $row['time'] . '</span>
                            </div>

                            <div class="content">
                                <h2>' . $row['fname'] . '</h2>
                                <div class="info">
                                    <span>' . $row['quantity'] . ' portions</span>
                                    <span>' . $row['location'] . '</span>
                                </div>
                                <button class="b" onclick="claimFood()">Claim Now</button>
                            </div>
                          </div>';
                }
            } else {
                echo "<p style='grid-column: 1/-1; text-align: center;'>No results in database.</p>";
            }
        }
    }
}
$controller = new FoodController(); 
$controller->search();
?>