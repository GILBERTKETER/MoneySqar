<?php
session_start();
include('../PHP/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $_SESSION['LOGGED_IN_EMAIL'];
    $videoId = $data['videoId'];
    $Total_Earned = 50;
    $sql = "SELECT * FROM tiktok_earnings WHERE Email_Address = '$email' AND Video_ID = '$videoId'";
    $execute_sql = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($execute_sql) > 0) {
        // Video record exists, no need to insert again
        $response = array('success' => false, 'message' => 'Video already viewed.');
        echo json_encode($response);
        exit();
    } else {
        // Insert the data
        $insert_Data = "INSERT INTO tiktok_earnings (Email_Address, Amount_Earned, Video_ID)
                        VALUES ('$email', '$Total_Earned', '$videoId')";
        $exec_insert_Data = mysqli_query($mysqli, $insert_Data);

        if ($exec_insert_Data) {
            // Insertion was successful
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            // Failed to insert, handle the error
            $response = array('success' => false, 'message' => 'Failed to update video viewed status.');
            echo json_encode($response);
        }
    }
}
