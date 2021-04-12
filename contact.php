
<!-- this code displays the contact information of the school-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="icon" href="Images/Goldbar.jpg" type="Image/jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/main.css">
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

    <div class="back" style=" background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('Images/bg04.jpg');height: 100vh;  background-position: center;background-repeat: no-repeat;background-size: cover;">
        <?php
            $currentPage = "contact";
            include("includes/nav.php");
        ?>

        <form style="background-color: white; margin-top: 5%; margin-left: 35%; width: 30%;margin-right: 5%;" class="text-center border border-light p-5" method="POST" data-parsley-validate>

            <p class="h4 mb-4">Contact Us</p>

            <!-- Name Regex and requirements-->
            <input type="text" id="Name" class="form-control mb-4" placeholder="Name" name="name" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" required>

            <!-- Email-->
            <input type="email" id="email" class="form-control mb-4" placeholder="Email" name="email" required>

            <!-- Messages  -->
            <textarea type="text" id="message" rows="2" class="form-control md-textarea" placeholder="Message" name="message" required></textarea>



            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" type="submit" name="submit-c">Submit</button>

        </form>
    </div>

    <!-- this code inserts a user's message into the database-->
    <?php

        include_once("includes/connection.php");
        $conn = new Database();
        $dbase = $conn->connect();

        if(isset($_POST["submit-c"])) {
            $name= $_POST["name"];
            $email= $_POST["email"];
            $message= $_POST["message"];

            // Prepare an insert statement
            $sql = "INSERT INTO contact_us(name, email, message) VALUES
                    ('$name', '$email', '$message')";

            $result = $dbase->query($sql);
            
            if($result){
                echo "<div class='alert-success'>
                        <span>Message Sent!</span>
                        </div>";
            }else{
                echo "<div class='alert-error'>
                        <span>Sorry, something went wrong</span>
                        </div>";
            }
        }

    ?>

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
</html>
