<!-- this code allows a MINER to sign up for the first time-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign-Up</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="icon" href="Images/abc.jpg" type="image/jpg">
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

    <link rel="stylesheet" href="main.css" />
</head>
<body>

<div class="back" style=" background-image: url('Images/abc.jpg');height: 100vh;  background-position: center;background-repeat: no-repeat;background-size: cover;">
    <?php
        include("includes/nav.php");
    ?>

    <!-- Default form login -->
    <form
        style="
          background-color:ghostwhite;
          margin-top: 10%;
          margin-left: 65%;
          width: 30%;
          margin-right: 5%;
        "
        class="text-center border border-light p-5"
        action="signup.php"
        method="POST"
        onsubmit="return validate();"
        data-parsley-validate
    >
        <p class="h4 mb-4"> SIGN UP</p>
        <h5> 💵💵 INSURANCE OPTION 💵💰️</h5>

        <?php if(isset($_GET['error']))
        {if($_GET['error'] == 'noInsertion')
        { echo 'There is an error inserting';}

        }?>

        <!-- Email -->
        <input
            type="email"
            id="email"
            name="email"
            class="form-control mb-4"
            placeholder="E-mail"
            required data-parsley-error-message='Please enter correct email' value="<?php if(isset($_GET['email'])){echo $_GET['email']; }?>"/>
        <!-- <span style= 'color:red' id="email_error"></span> -->

        <!-- display to user that email already exist -->
        <?php if(isset($_GET['error'])){if($_GET['error'] == 'emailAlreadyExist'){ echo '<p style="color:red">Please email already exist</p>';}}?>

        <!-- Password -->
        <input
            type="password"
            id="password"
            name="password"
            class="form-control mb-4"
            placeholder="Password"
            required data-parsley-minlength="6" data-parsley-maxlength="16" data-parsley-trigger="keyup"/>
        <span style= 'color:red' id="password_error"></span>

        <!-- Confirm Password -->
        <input
            type="password"
            id="confirm_password"
            name="confirm_password"
            class="form-control mb-4"
            placeholder="Confirm Password"
            required data-parsley-equalto="#password" data-parsley-trigger="keyup" data-parsley-error-message='Passwords are not the same'/>
        <span style= 'color:red'id="password_conf_error"></span>

        <!-- Sign in button -->
        <button class="btn btn-warning btn-block my-5" type="submit" name="sign-up">Sign Up</button>
        <!-- <input type="submit" name="submit" value="Signup" /> -->

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
    <!-- Default form login -->
</div>

<?php
    // Using session to redirect users if they have already logged in before
    session_start();
    //Check if the user is already logged in, if yes then redirect him to info page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: info.php");
    }else {
        header('Location: student_sign_up.php');
    }

    // Include config file
    require_once "includes/connection.php";

    // Define variables and initialize with empty values
    $email = $password = $confirm_password = "";
    $email_err = $password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate email
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter a email.";
        } else{
            // Prepare a select statement
            $sql = "SELECT student_id FROM students WHERE email = ?";

            if($stmt = $conn->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $email);

                // Set parameters
                $email = trim($_POST["email"]);

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // store result
                    $stmt->store_result();

                    if($stmt->num_rows == 1){
                        $email_err = "This email is already taken.";
                        header('Location: student_sign_up.php?email='.$email.'&error=emailAlreadyExist');
                        //exit();

                    } else{
                        $email = trim($_POST["email"]);
                        //header('Location: info.php?success=emailAlreadyExist');
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }

        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have at least 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before inserting in database
        if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){

            // Prepare an insert statement
            $sql = "INSERT INTO clientele(client_email, client_password) VALUES (?, ?)";

            if($stmt = $conn->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ss", $param_email, $param_password);

                // Set parameters
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Redirect to login page
                    header("location: login.php?email=".$email."");
                } else{

                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }

        // Close connection
        $conn->close();
    }
?>

</body>
</html>
