<?php
session_start();
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support_Us-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/support_us.css">
    <!--MATERIAL ICONS CDN-->
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

<body>
    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');
    ?>
    <!--END OF NAV BAR-->

    <div class="main_section">
        <div class="support-us">
            <h2>Support our team</h2>
            <p>Support us and get a chance to win Ksh 20,000 on Friday during our draw.<br>The draw shall be done live
                and event details shall be communicated.
                The higher your bid, the higher the chances to win Ksh 20,000 prize.</p>


            <div class="support-package">
                <form>
                    <div class="flex">
                        <label style="color: var(--color-secondary);  font-weight: 600;">
                            <input type="radio" name="selectedValue" value="100">
                            Ksh. 100
                        </label>
                        <label style="color: var(--color-secondary);  font-weight: 600;">
                            <input type="radio" name="selectedValue" value="150">
                            Ksh. 150
                        </label>
                        <label style="color: var(--color-secondary);  font-weight: 600;">
                            <input type="radio" name="selectedValue" value="200">
                            Ksh. 200
                        </label>
                    </div>
                    <div class="flex">
                        <label style="color: var(--color-secondary);  font-weight: 600;">
                            <input type="radio" name="selectedValue" value="250">
                            Ksh. 250
                        </label>
                        <label style="color: var(--color-secondary);  font-weight: 600;">
                            <input type="radio" name="selectedValue" value="400">
                            Ksh. 400
                        </label>
                        <label style="color: var(--color-secondary);  font-weight: 600;">
                            <input type="radio" name="selectedValue" value="500">
                            Ksh. 500
                        </label>
                    </div>
                </form>
            </div>
            <button id="supportBtn" type="button">Support</button>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var supportBtn = document.getElementById('supportBtn');
            supportBtn.addEventListener('click', function() {
                var selectedInput = document.querySelector('input[name="selectedValue"]:checked');
                if (selectedInput) {
                    var selectedValue = selectedInput.value;

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../PHP/support_handle.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = xhr.responseText;
                            // Handle the response from handle.php
                            alert(response); // Display the response in an alert or update the page content as needed
                        } else if (xhr.readyState === 4 && xhr.status !== 200) {
                            // Handle any errors that occur during the AJAX request
                            console.error('Error: ' + xhr.status);
                        }
                    };
                    xhr.send('value=' + encodeURIComponent(selectedValue));
                } else {
                    // Handle the case when no input field is checked
                    console.error('No input field selected.');
                }
            });
        });
    </script>


</body>

</html>