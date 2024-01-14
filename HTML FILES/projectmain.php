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
    <title>Trade_Your_Tips-MoneySqar_Technologies</title>
    <!-- STYLESHEET LINK -->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/project.css">
    <!-- MATERIAL ICONS CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- GOOGLE FONTS (POPPINS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FAVICON LINK -->
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../favicon_io/site.webmanifest">
</head>

<body>
    <?php
    include('../PHP/navigation.php');
    ?>


    <div class="whole_section">

        <div class="main_tips_field">

            <div class="top_main_section">
                <div class="trending_tips">
                    <div class="trend_img flex1">

                        <?php
                        $path = '../uploads/';
                        $image = 'IMG-64b118db411c87.77440616.png';
                        ?>
                        <img src="<?php echo $path . $image; ?>" alt="">
                    </div>
                    <div class="inform flex1">
                        <h2 class="headers">Trending Tip</h2>
                        <h2>Description</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis perferendis rerum accusantium beatae nostrum velit, voluptatibus error et vitae saepe aliquam ex magni! Itaque deleniti numquam non mollitia? Cupiditate, rem, ea cumque odio quos reiciendis molestias dignissimos nisi sunt autem ut saepe sit quia tempora illum dolore. Dicta, cupiditate assumenda.</p>
                        <div class="cost">
                            <h4>bought by 500 people</h4>
                            <h4 id="strike">Ksh. <?php $Amount_cost = 5000;
                                                    echo $Amount_cost; ?></h4>
                            <h4>Ksh. 5000 </h4>
                        </div>
                        <!-- <button type="submit" id="purchase">Purchase this Tip Now</button> -->
                        <div style="display: flex;gap:20px;">
                            <?php

                            // ===========================
                            $email = $_SESSION['LOGGED_IN_EMAIL'];
                            $hiddenbt = '';
                            $query_tips = "SELECT * FROM purchasebettips where(Tip_URL = '$image' and Email_Address  = '$email');";
                            $exec_query_tips = mysqli_query($mysqli, $query_tips);

                            if (mysqli_num_rows($exec_query_tips) > 0) {
                                while ($row_query_tips = mysqli_fetch_assoc($exec_query_tips)) {
                                    $verification = $row_query_tips['Verification'];
                                    if ($verification == 'verified') {
                                        $hiddenbt = '';
                                    } else {
                                        $hiddenbt = 'hidden';
                                    }
                                }
                            } else {
                                $hiddenbt = 'hidden';
                            }
                            // ============
                            ?>
                            <!-- <form action="../PHP/project.php" method="post">
                                <input type="submit" name="mytip" class="purchasebtn" id="purchase" value="Purchase">
                                <input type="text" name="imageURL" value="<?php echo $image; ?>" hidden>
                                <input type="text" name="amountCost" value="<?php echo $Amount_cost; ?>" hidden>
                            </form> -->
                            <form action="../PHP/project.php" method="post" id="purchaseForm">
                                <input type="submit" name="mytip" class="purchasebtn" id="purchase" value="Purchase">
                                <input type="text" name="imageURL" id="imageURL" value="<?php echo $image; ?>" hidden>
                                <input type="text" name="amountCost" id="amountCost" value="<?php echo $Amount_cost; ?>" hidden>
                            </form>

                            <a href="<?php echo $path . $image; ?>" class="purchasebtn" id="purchase" <?php echo $hiddenbt; ?> download>Download</a>

                        </div>
                        <div class="tip_owner">
                            <img src="../ASSETS/bit1.jpg" alt="">
                            <h2>Gilbert kiplangat</h2>
                            <h3>success rate</h3>
                        </div>
                    </div>
                </div>

                <div class="available_tips">
                    <h2 class="headers1">Available Tips</h2>

                    <?php
                    $email = $_SESSION['LOGGED_IN_EMAIL'];
                    $user_images_query = "SELECT * FROM bettips_table;";
                    $exec_user_images = mysqli_query($mysqli, $user_images_query);

                    if (mysqli_num_rows($exec_user_images) > 0) {
                        $counter = 0; // Counter variable for unique IDs

                        while ($row_exec_user_images = mysqli_fetch_assoc($exec_user_images)) {
                            $image_names = explode(',', $row_exec_user_images['Bet_Image']);
                            $cost = $row_exec_user_images['Cost_of_Odds'];

                            foreach ($image_names as $image_name) {
                                $path_to_img = '../Bet_Tips/' . $image_name;
                                $tipInputID = 'tipInput_' . $counter; // Unique ID for tip input
                                $amountInputID = 'amountInput_' . $counter; // Unique ID for amount input

                                $purchases = 0;
                                $Total_Earned = 0;
                                $Owners_Email = '';
                                $owner_Email = '';
                                $hidePurchase = '';

                                // ===========================
                                $hiddenBtn = '';
                                $query_tips = "SELECT * FROM purchasebettips where(Tip_URL = '$image_name' and Email_Address  = '$email');";
                                $exec_query_tips = mysqli_query($mysqli, $query_tips);

                                $owner_verify = "SELECT * FROM bettips_table WHERE(Bet_Image = '$image_name' AND Email_Address = '$email');";
                                $exec_owner = mysqli_query($mysqli, $owner_verify);


                                while ($row_ownerEmail = mysqli_fetch_assoc($exec_owner)) {
                                    $owner_Email = $row_ownerEmail['Email_Address'];
                                }
                                if ($email == $owner_Email) {
                                    $hidePurchase = 'hidden';
                                } else {
                                    $hidePurchase = '';
                                }


                                if (mysqli_num_rows($exec_query_tips) > 0) {
                                    while ($row_query_tips = mysqli_fetch_assoc($exec_query_tips)) {
                                        $verification = $row_query_tips['Verification'];
                                        if ($verification == 'verified') {
                                            $hiddenBtn = '';
                                        } else {
                                            $hiddenBtn = 'hidden';
                                        }
                                    }
                                } else {
                                    $hiddenBtn = 'hidden';
                                }
                                // ============



                                echo '<div class="image_tips">';
                                echo '<img src="' . $path_to_img . '" alt="' . $path_to_img . '">';
                                echo '<div class="information_tips">';

                                echo '<div class="download">';
                                echo '<h2>Description</h2>';
                                echo '<p>' . $row_exec_user_images['Description'] . '</p>';
                                echo '</div>';

                                echo '<div class="download">';
                                echo '<h3>Expiration Time</h3>';
                                echo '<hr class="horizon">';
                                echo '<h3>' . $row_exec_user_images['Time_Of_Expiry'] . '</h3>';
                                echo '</div>';

                                echo '<div class="download">';
                                echo '<h3>Total Odds</h3>';
                                echo '<hr class="horizon">';
                                echo '<h3>' . $row_exec_user_images['Total_Odds'] . '</h3>';
                                echo '</div>';

                                echo '<div class="download">';
                                echo '<h2>Amount</h2>';
                                echo '<hr class="horizon">';
                                echo '<h2>' . $row_exec_user_images['Cost_of_Odds'] . '</h2>';
                                echo '</div>';

                                echo '<div class="download">';
                                echo '<input type="submit" class="purchasebtn" value="Purchase" ' . $hidePurchase . ' onclick="showPaymentGateway(\'' . $image_name . '\', \'' . $cost . '\')">'; // Pass values directly
                                echo '<hr class="horizon">';
                                echo '<a href="' . $path_to_img . '" class="purchasebtn" download ' . $hiddenBtn . ' ' . $hidePurchase . ' >Download</a>';
                                echo '</div>';

                                echo '</div>';
                                echo '</div>';

                                // Hidden input fields with unique IDs
                                echo '<input type="hidden" id="' . $tipInputID . '" name="tip" value="' . $image_name . '">';
                                echo '<input type="hidden" id="' . $amountInputID . '" name="Amount" value="' . $cost . '">';

                                $counter++; // Increment the counter for the next image


                                //lets check if the image is purchased
                                $imagePurchased = "SELECT COUNT(*) AS purchases_Done FROM purchasebettips WHERE(Tip_URL = '$image_name');";
                                $exec_imagePurchased = mysqli_query($mysqli, $imagePurchased);

                                $select_owner = "SELECT * FROM bettips_table WHERE(Bet_Image = '$image_name');";
                                $exec_select_Owner = mysqli_query($mysqli, $select_owner);
                                if (mysqli_num_rows($exec_select_Owner) > 0) {
                                    while ($row_owner = mysqli_fetch_assoc($exec_select_Owner)) {
                                        $Owners_Email = $row_owner['Email_Address'];
                                    }
                                }


                                if (mysqli_num_rows($exec_imagePurchased) > 0) {
                                    while ($rowPurchases = mysqli_fetch_assoc($exec_imagePurchased)) {
                                        $purchases = $purchases + intval($rowPurchases['purchases_Done']);
                                        $Total_Earned = $purchases * $cost;


                                        $insert = "UPDATE bettips_table SET Total_Earned = '$Total_Earned',Total_Purchases='$purchases' 
                                                    WHERE(Email_Address = '$Owners_Email' AND Bet_Image = '$image_name');";
                                        $exec_insert = mysqli_query($mysqli, $insert);
                                    }
                                } else {
                                    $purchases = 0;
                                }
                            }
                        }
                    } else {
                        echo 'No images found.';
                    }
                    ?>

                </div>

            </div>

            <div class="bottom_section_flexTwice">
                <div class="my_uploaded_tips flex">
                    <?php
                    $email = $_SESSION['LOGGED_IN_EMAIL'];
                    $user_images_query = "SELECT * FROM bettips_table WHERE Email_Address = '$email';";
                    $exec_user_images = mysqli_query($mysqli, $user_images_query);

                    if (mysqli_num_rows($exec_user_images) > 0) {
                        while ($row_exec_user_images = mysqli_fetch_assoc($exec_user_images)) {
                            $image_names = explode(',', $row_exec_user_images['Bet_Image']);

                            foreach ($image_names as $image_name) {
                                $path_to_img = '../Bet_Tips/' . $image_name;

                                echo '<div class="image">';
                                echo '<img src="' . $path_to_img . '" alt="' . $path_to_img . '">';
                                echo '<div class="information_tips">';

                                echo '<div class="description">';
                                echo '<h2>Description</h2>';
                                echo '<p>' . $row_exec_user_images['Description'] . '</p>';
                                echo '</div>';

                                echo '<div class="description">';
                                echo '<h3>Expiration Time</h3>';
                                echo '<hr class="horizon">';
                                echo '<h3>' . $row_exec_user_images['Time_Of_Expiry'] . '</h3>';
                                echo '</div>';

                                echo '<div class="description">';
                                echo '<h3>Total Odds</h3>';
                                echo '<hr class="horizon">';
                                echo '<h3>' . $row_exec_user_images['Total_Odds'] . '</h3>';
                                echo '</div>';

                                echo '<div class="description">';
                                echo '<h2>Amount</h2>';
                                echo '<hr class="horizon">';
                                echo '<h2>' . $row_exec_user_images['Cost_of_Odds'] . '</h2>';
                                echo '</div>';


                                echo '<div class="delete">';
                                echo '<form action="../PHP/project.php" method="post">';
                                echo '<input type="hidden" name="image_name" value="' . $image_name . '">';
                                echo '<input type="submit" id="delete" name="delete" value="Delete">';
                                echo '</form>';
                                echo '</div>';



                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    } else {
                        echo 'No images found.';
                    }
                    ?>
                </div>

                <div class="upload_my_tips flex">
                    <h2>Sell your Odds Today To Clients</h2>
                    <p>Be sure that if your bet tips are fraud and lies, your account shall be suspended.</p>
                    <h3 style="text-align: left;">Upload your Tips below and indicate everything correctly.</h3>

                    <div class="upload_table">


                        <div class="flex_inputs">
                            <form action="../PHP/Tips_upload.php" id="form" method="POST" enctype="multipart/form-data">
                                <div class="inputs">
                                    <input type="date" name="date_of_expiry" value="" placeholder="Date of Expiry" required>
                                    <input type="time" name="time_of_expiry" value="" placeholder="Date and Time Of Expiry" required>
                                    <input type="text" name="description" value="" placeholder="Description" required>
                                    <input type="number" name="total_odds" value="" placeholder="Total Odds Value" required>
                                    <input type="number" name="cost_of_odds" value="" placeholder="Amount" required>
                                </div>
                                <div class="inputs">
                                    <input type="file" name="my_image">
                                    <input type="submit" name="submit" id="upload" value="Upload">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="paymentGateway" style="display: none;">

            <form action="../PHP/project.php" id="payment" enctype="multipart/form-data" method="post">
                <div class="inputs">
                    <input type="text" name="email_ID" value="<?php echo $_SESSION['LOGGED_IN_EMAIL']; ?>" required readonly>
                    <input type="text" name="tip" id="tipInput" value="" readonly>
                    <input type="number" name="phone" id="phone" readonly>
                    <input type="number" name="amount" id="amountInput" value="" readonly>

                    <input type="submit" name="buy" id="purchaseBtn" value="Purchase">
                </div>
            </form>

        </div>
    </div>

    <script>
        function showPaymentGateway(imageName, cost) {
            // Set the values in the payment form
            var tipInputPayment = document.getElementById('tipInput');
            var amountInputPayment = document.getElementById('amountInput');
            tipInputPayment.value = imageName;
            amountInputPayment.value = cost;

            // Show the paymentGateway div
            var paymentGatewayDiv = document.querySelector('.paymentGateway');
            paymentGatewayDiv.style.display = 'block';
        }
    </script>
    <script>
        // JavaScript code
        // document.getElementById("purchaseForm").addEventListener("submit", function(event) {
        //     event.preventDefault(); // Prevent the form from submitting normally

        //     // Get the form values
        //     var imageURL = document.getElementById("imageURL").value;
        //     var amountCost = document.getElementById("amountCost").value;

        //     // Send the AJAX request
        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "../PHP/project.php", true);
        //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === 4 && xhr.status === 200) {
        //             console.log(xhr.responseText);
        //         }
        //     };
        //     xhr.send("imageURL=" + encodeURIComponent(imageURL) + "&amountCost=" + encodeURIComponent(amountCost));
        // });
    </script>
    <script src="../JS FILES/script.js"></script>
    <script src="../JS FILES/project.js"></script>
</body>

</html>