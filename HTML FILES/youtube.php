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
    <title>Youtube_videos-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/youtube.css">
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

    <div class="youtube_body">

        <div class="youtube_video">
            <h2>Youtube video. Watch and Earn Ksh. 50</h2>

            <div class="video">
                <!-- <iframe id="iframe" width="100%" height="100%" src="https://www.youtube.com/embed/E1m4wmy9qFQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                <video id="iframe" src="../ASSETS//PERSONAL_DIGITAL_PORTFOLIO - Personal - Microsoft​ Edge 2023-01-23 15-20-28.mp4" controls></video>
            </div>
            <div class="video_flex">
                <h3 id="earned">you have earned ksh. 50</h3>
                <h3 id="none">none available</h3>
            </div>
        </div>
    </div>





    <script>
        let video = document.getElementById('iframe');
        let videoStarted = false; // Flag to check if the video has started playing
        let videoForwarded = false; // Flag to check if the video was forwarded

        // Listen for the timeupdate event to track video progress
        video.addEventListener('timeupdate', function() {
            if (!videoStarted) {
                // Video just started playing
                videoStarted = true;
                console.log('Video started playing!');
            }


        });

        // Listen for the seeking event (when the user drags the progress bar)
        video.addEventListener('seeking', function() {

            // Listen for the timeupdate event to track video progress
            video.addEventListener('timeupdate', function() {


                if (video.currentTime > 10) {
                    // If the current time of the video is greater than 10 seconds (forwarded),
                    // set the videoForwarded flag to true
                    videoForwarded = true;
                    console.log("forwaded again");
                }
            });

            videoForwarded = true;
            console.log("forwaded");
        });

        video.addEventListener('ended', function() {
            // Send an AJAX request to your server only if the video was not forwarded
            if (!videoForwarded) {
                const xhr = new XMLHttpRequest();
                const url = '../PHP/youtube_handle.php'; // Update the path to your PHP file

                // Set up the AJAX request
                xhr.open('POST', url, true);
                xhr.setRequestHeader('Content-Type', 'application/json');

                // Prepare the data to be sent to the server
                const data = {
                    videoId: 'your_video_id3' // Replace with the video ID or any other relevant data you want to send
                };

                // Convert the data to JSON format
                const jsonData = JSON.stringify(data);

                // Handle the response from the server
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Request was successful
                            const response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                console.log('Video viewed successfully!');
                                // Redirect to index.php here using JavaScript
                                window.location.href = '../HTML FILES/index.php';
                            } else {
                                // console.error('Failed to update video viewed status:', response.message);
                                window.location.href = '../HTML FILES/index.php';
                            }
                        } else {
                            // Request failed, handle the error
                            console.error('Failed to update video viewed status:', xhr.status, xhr.statusText);
                        }
                    }
                };

                // Send the request with the data
                xhr.send(jsonData);
            }
        });
    </script>




    <script src="../JS FILES/script.js"></script>

</body>

</html>