
<!--this code displays the homepage of the website-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>INSURANCE</title>
    <link rel="icon" href="Images/1887317.jpg" type="Image/jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>

    <div class="back" style=" background-image: url('Images/1887317.jpg');height: 100vh;  background-position: center;background-repeat: no-repeat;background-size: cover;">
        <?php
            $currentPage = "home";
            include("includes/nav.php");
        ?>

        <div class="mask  align-items-center">
            <!-- Content -->
            <div class="container">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6 white-text text-center text-md-left mt-xl-5 mb-5 wow fadeInLeft" data-wow-delay="0.3s">
                        <h1 style="color: white;" class ="h1-responsive font-weight-bold mt-sm-5">ONLINE PAYMENT SYSTEM </h1>
                        <hr style="background-color: white;" class="hr-light">
                        <h6 style="color: white;"class="mb-4"></h6>
                        <button type="button" class=" btn-primary btn-lg" onclick="location.href='/Gold/mainpage.php'">FINANCIAL PLAN</button>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->

                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>

    </div>

</body>

</html>