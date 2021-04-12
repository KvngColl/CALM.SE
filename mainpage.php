<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bright Idea</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/mainpage.css">
    </head>

    <body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('Images/Morris-William-HD-Segur-insurance-planning.jpg'); 
        background-size: cover; height: 100vh; 
        background-position: center;
        background-repeat: repeat-y;
        font-family: Verdana, Geneva, Tahoma, sans-serif;"
    >
        <?php
            $currentPage = "main";
            include("includes/nav.php");
        ?>
        <main>
            <div class="intro">
                <h1>Hi there!</h1>
                <label>Thank you for choosing us. Below are some basic information we need to help you spread out payment for that desired item you've been craving for</label>
            </div>
            <form method="POST">
                <div class="insert">
                    <label for="item-name">Item Name</label>
                    <input type="text" id="item" name="item">
                </div>

                <div class="insert">
                    <label for="item-category">Item Category</label>
                    <select name="category" id="category">
                        <option value="" hidden>Categories</option>
                        <option value="tech">Technology</option>
                        <option value="h&f">Home and furniture</option>
                        <option value="auto-m">Auto-Mobile</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="insert">
                    <label for="item-cost">Item Cost</label>
                    <input type="number" id="cost" name="cost">
                </div>

                <div class="insert">
                    <label for="salary">Your Salary</label>
                    <input type="number" id="salary" name="salary">
                </div>

                <div class="insert">
                    <label for="interest-rate">Rate of Change</label>
                    <input type="number" id="rate" name="rate" value="0.023" readonly>
                </div>

                <div style="width: 100%; padding: 15px;">
                    <button name="submit">SUBMIT</button>
                </div>
            </form>
        </main>

        <?php

            include_once "includes/connection.php";

            $con = new Database();
            $dbase = $con->connect();

            if(isset($_POST["submit"])) {
                $i_name = $_POST["item"];
                $i_category = $_POST["category"];
                $i_cost = $_POST["cost"];
                $salary = $_POST["salary"];
                $interest_r = $_POST["rate"];

                $suitable_deposit = 0.1 * $_POST["salary"];
                $amt_of_time = $_POST["cost"] / $suitable_deposit;

                $query = "INSERT INTO essentials(item_name, item_category, item_cost, salary, interest_rate, suitable_deposit, amt_of_time)
                        VALUES ('$i_name', '$i_category', '$i_cost', '$salary', '$interest_r', '$suitable_deposit', '$amt_of_time')";
                $execute = $dbase->query($query);

                if($execute) {
                    echo "<div class='alert-success'>
                        <span>You will have to pay $suitable_deposit for $amt_of_time months.</span>
                      </div>";
                }
                else {
                    echo 
                        "<div class='alert-error'>
                            <span> Request Unsuccessful </span>
                        </div>" . mysqli_error($dbase);
                }
            }

        ?>

    </body>
</html>