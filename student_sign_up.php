<!-- this code allows a MINER to sign up for the first time-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign-Up</title>
    <link rel="icon" href="Images/abc.jpg" type="image/jpg">
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

    <link rel="stylesheet" href="main.css" />
</head>
<body>

<div class="back" style=" background-image: url('Images/abc.jpg');height: 93%;  background-position: center;background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-light btn-light">
        <a class="navbar-brand" href="#">
            <img src="Images/abc.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            MINING
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about_us.html">FINANCIAL PLAN</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">SETTING</a>
                </li>
            </ul>
        </div>
    </nav>



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
        action="student_user_signup.php"
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
        <button class="btn btn-warning btn-block my-5" type="submit">Sign Up</button>
        <!-- <input type="submit" name="submit" value="Signup" /> -->

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
    <!-- Default form login -->
</div>


<script src="app.js"></script>
</body>
<footer class="p-3 bg-dark text-white">
<h3>INSURANCE</h3>
</footer>
</html>
