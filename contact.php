
<!-- this code displays the contact information of the school-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="icon" href="Images/Goldbar.jpg" type="Image/jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    <style>
        .welcome {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #202020;
            width: 50%;
            font-size: 20px;

        }

        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            color: #468847;
            background-color: #DFF0D8;
            border: 1px solid #D6E9C6;
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;
            color: #B94A48;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
        }

        .parsley-errors-list.filled {
            opacity: 1;
        }
    </style>


</head>
<body>



<div class="back" style=" background-image: url('Images/bg04.jpg');height: 93%;  background-position: center;background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-light btn-light">
        <a class="navbar-brand" href="#">
            <img src="Images/bg04.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            INSURANCE
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.html">FINANCIAL PLAN</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">SETTING</a>
                </li>
            </ul>
        </div>
    </nav>




    <form style="background-color: white; margin-top: 10%; margin-left: 35%; width: 30%;margin-right: 5%;" class="text-center border border-light p-5" method="POST"action="contact_us.php" data-parsley-validate>

        <p class="h4 mb-4">Contact Us 🙂</p>

        <!-- Name Regex and requirements-->
        <input type="text" id="Name" class="form-control mb-4" placeholder="Name" name="Name" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" required>

        <!-- Email-->
        <input type="email" id="email" class="form-control mb-4" placeholder="Email" name="email" required>

        <!-- Messages  -->
        <textarea type="text" id="message" rows="2" class="form-control md-textarea" placeholder="Message" name="Message" required></textarea>



        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit" name="submit">Submit</button>




    </form>
</div>


<?php if (isset($_GET['success'])) : ?>
    <div class='flash-data' data-flashdata="<? $_GET['success'];?>"></div>
<?php endif; ?>

<script>


    const flashdata = $(".flash-data").data("flashdata");

    if (flashdata) {
        Swal.fire({
            icon: "success",
            title: "Thank you for your Feedback",
            text: "Message delivered will revert to you soon 😁.",
            type: "success",
        })
    }

</script>
</body>
<footer class="p-3 bg-dark text-white">
    <h3>INSURANCE</h3>
</footer>
</html>
