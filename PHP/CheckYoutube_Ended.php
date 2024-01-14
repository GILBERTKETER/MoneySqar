<?php
session_start();
include('../PHP/connection.php');

if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    // Redirect the user if not logged in
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
}

// Assuming you have a database table to store the video views
$tableName = 'video_earnings';

// Assuming you have a column 'user_id' to store the user ID
// Replace 'user_id_column_name' with the actual column name in your table
$userId = $_SESSION['LOGGED_IN_EMAIL'];

// Assuming you have a column 'video_id' to store the YouTube video ID
// Replace 'video_id_column_name' with the actual column name in your table
$videoId = 'E1m4wmy9qFQ'; // Replace with the actual YouTube video ID

// Check if the user has already viewed the video
$query = "SELECT * FROM $tableName 
        WHERE Email_Address = '$userId' AND video_id = '$videoId';";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) === 0) {
    // The user has not viewed the video, so track the view
    $insertQuery = "INSERT INTO $tableName (Email_Address, video_id) 
                    VALUES ('$userId', '$videoId')";
    mysqli_query($mysqli, $insertQuery);
}

// You can send a response back to the JavaScript code if needed
// For example, you can send a success message
$response = array('success' => true);
echo json_encode($response);
