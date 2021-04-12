
<!-- this code displays the login page for users-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign-In</title>
        <link rel="icon" href="Images/Morris-William-HD-Segur-insurance-planning.jpg" type="image/jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/nav.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    </head>

    <body>
        <div class="back" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('Images/Morris-William-HD-Segur-insurance-planning.jpg');height: 100vh;  background-position: center;background-repeat: no-repeat;background-size: cover;">
            <?php
                include("includes/nav.php");
            ?>

            <!-- Default form login -->
            <form method="POST" style="background-color: white; margin-top: 4%; margin-left: 60%; width: 30%;margin-right: 5%;" class="text-center border border-light p-5" method="POST" onsubmit="return validate_login ();" data-parsley-validate>
                <p class="h4 mb-4">SIGN IN PAGE</p>
                <h5>  💵💵 INSURANCE OPTION 💵💰 </h5>

                <?php if(isset($_GET['error'])){if($_GET['error'] == 'invalidInputs'){echo "<p style='color:red'>Invalid credentials</p>";}} ?>

                <!-- Email -->
                <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" data-parsley-trigger="change" data-parsley-error-message="Please enter a valid email" required>
                <!-- <p style= 'color:red' id= "email_error"></p> -->


                <!-- Password -->
                <input type="password" id="password" class="form-control mb-4" placeholder="Password" name="password">
                <p style= 'color:red' id="password_error" required></p>


                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name ="sign-in">Sign in</button>
                <!-- Reset password button -->
                <p>Forgot Password?<a href="reset_password.php">Reset Password</a>


                    <!-- Register -->
                <p>Not an Applicant?
                    <a href="signup.php">Register</a>s
                </p>


            </form>
            <!-- Default form login -->
        </div>
        <?php
            include_once "includes/connection.php";
            $conn = new Database();
            $dbase = $conn->connect();

            if(isset($_POST["sign-in"])){
                $email = $_POST["email"];
                $password = $_POST["password"];

                $query = "SELECT * FROM clientele WHERE client_email = '$email'";
                $execute = mysqli_query($dbase, $query);
                // get result set from query
                $email_row = mysqli_fetch_array($execute);

                if($email_row){
                    $db_password = $email_row["client_password"];
                    $decrypt_pass = password_verify($password, $db_password);

                    if(!$decrypt_pass){
                        echo 
                            "<div class='alert-error' style='top: 100px;'>
                                <span> Sorry, something went wrong <br> Your password may be incorrect </span>
                            <div>";
                    }
                    else {
                        echo 
                            "<div class='alert-success' style='top: 100px;'>
                                <span> Log-in was successful </span>
                            </div>";
                        header("location:index.php");
                    }
                }
            }
        ?>
    </body>

</html>