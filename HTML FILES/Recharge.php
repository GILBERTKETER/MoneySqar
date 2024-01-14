<?php
session_start();
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit_Funds</title>
    <link rel="stylesheet" href="../CSS FILES/Recharge.css">
    <link rel="stylesheet" href="../CSS FILES/style.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS(POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--FONT AWESOME LINK-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--FAVICON LINK-->
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../favicon_io/site.webmanifest">

</head>

<body class="body-33">


    <!--NAV BAR BEGINS--><?php
                            include('../PHP/navigation.php');
                            ?>
    <!--END OF NAV BAR-->


    <div class="body_section">
        <div class="container">

            <form action="../PHP/RechargeQuery.php" class="form" method="POST">
                <h2>welcome to deposit with lipa na mpesa</h2>
                <hr>


                <div class="row">

                    <div class="col">

                        <h3 class="title">billing address</h3>

                        <div class="inputBox">
                            <span>Phone No :</span>
                            <input type="text" placeholder="0755898o89809" name="phoneno">
                        </div>




                        <div class="flex">
                            <div class="inputBox">
                                <span>Amount :</span>
                                <input type="number" placeholder="700" name="amount">
                            </div>
                            <div class="inputBox">
                                <span>password :</span>
                                <input type="password" placeholder="password">
                            </div>
                        </div>

                    </div>

                    <div class="col">

                        <h3 class="title">payment</h3>

                        <div class="inputBox">
                            <span>payments accepted :</span>
                            <img src="../ASSETS/lipa-na-mpesa.png" alt="">
                        </div>




                    </div>

                </div>

                <input type="submit" value="proceed to checkout" class="submit-btn">



            </form>
        </div>
    </div>

    <!-- Your existing HTML code remains unchanged -->

    <!-- Add the following script just before the closing </body> tag -->
    <script>
        // Function to handle the form submission and initiate the payment process
        function initiatePayment() {
            const phone = document.querySelector('input[name="phoneno"]').value;
            const amount = document.querySelector('input[name="amount"]').value;

            // Check if the phone number and amount are not empty
            if (phone.trim() === "" || amount.trim() === "") {
                alert("Please enter both the phone number and amount.");
                return;
            }

            // Make an AJAX request to initiate the payment process
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../PHP/RechargeQuery.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Redirect user to the generated URL (if successful)
                        const response = JSON.parse(xhr.responseText);
                        if (response && response.CustomerMessage) {
                            window.location.href = response.CustomerMessage;
                        } else {
                            alert("An error occurred. Please try again later.");
                        }
                    } else {
                        alert("An error occurred. Please try again later.");
                    }
                }
            };
            xhr.send(`phoneno=${encodeURIComponent(phone)}&amount=${encodeURIComponent(amount)}`);
        }

        // Add event listener to the "proceed to checkout" button
        const proceedBtn = document.querySelector('.submit-btn');
        proceedBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            initiatePayment();
        });
    </script>

    <script src="../JS FILES/script.js"></script>
</body>

</html>