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
    <title>Document</title>
    <link rel="stylesheet" href="../CSS FILES/Upload_pic.css">
</head>

<body>

    <div class="container">
        <div class="card">
            <h3>Upload Files</h3>
            <div class="drop_box">
                <header>
                    <h4>Select File here</h4>
                </header>
                <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
                <input type="file" hidden accept=".doc,.docx,.pdf" id="fileID" style="display:none;">
                <button class="btn">Choose File</button>
            </div>

        </div>
    </div>

    <script src="../JS FILES/Upload_pic.js"></script>
</body>

</html>