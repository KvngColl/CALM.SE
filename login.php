
<!-- this code displays the login page for users-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign-In</title>
    <link rel="icon" href="Images/Morris-William-HD-Segur-insurance-planning.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>




</head>
<body>



<div class="back" style=" background-image: url('Images/Morris-William-HD-Segur-insurance-planning.jpg');height: 93%;  background-position: center;background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-light btn-light">
        <a class="navbar-brand" href="#">
            <img src="Images/Goldbar.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Miner's Page
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
    <form  style="background-color: white; margin-top: 10%; margin-left: 65%; width: 30%;margin-right: 5%;" class="text-center border border-light p-5" action="student_user_login.php" method="POST" onsubmit="return validate_login ();" data-parsley-validate>
;
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
        <button class="btn btn-info btn-block my-4" type="submit" name ="submit" >Sign in</button>
        <!-- Reset password button -->
        <p>Forgot Password?<a href="reset-password-student.php">Reset Password</a>


            <!-- Register -->
        <p>Not an Applicant?
            <a href="student_sign_up.php">Register</a>
        </p>


    </form>
    <!-- Default form login -->
</div>


<script src="app.js">

</script>
</body>

<footer class="p-3 bg-dark text-white">
    <h3>INSURANCE</h3>
</footer>

</html>


