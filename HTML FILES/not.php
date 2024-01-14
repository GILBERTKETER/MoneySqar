<?php
session_start();
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages_MoneySqar_Softnet_Technologies</title>
    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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


    <style>
        /*root variables*/

        :root {
            --color-white: #ffffff;
            --color-light: #f0eff5;
            --color-gray-light: #86848c;
            --color-gray-dark: #56555e;
            --color-dark: #27282f;

            --color-home: rgb(5, 20, 27);
            --color-secondary: rgb(21, 189, 186);
            --light-color: rgb(1, 5, 12);
            --color-home-1: rgb(9, 33, 31);
            --color-orange: rgb(211, 98, 45);
            --color-secondary-2: rgb(16, 72, 100);
            --color-secondary-1: rgb(35, 27, 179);

            --card-padding: 1.6rem;
            --padding-1: 16px;
            --padding-2: 8px;

            --card-border-radius: 1.6rem;
            --border-radius-1: 1rem;
            --border-radius-2: 10px;

            --box-shadow: 0.4rem 0.4rem 0 #717597;
            --box-shadow-2: 6px 6px 10px -1px rgba(224, 199, 199, 0.15);
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1,
        h4 {
            color: var(--color-orange);
            margin-bottom: 20px;
        }

        .messages-body {
            min-height: 100vh;
            width: 100%;
            background-color: var(--color-home);
            padding: 20px;

            display: flex;
            align-items: start;
            justify-content: center;
        }

        .message {
            background-color: var(--light-color);
            height: auto;
            padding: 50px 20px;
            box-shadow: var(--box-shadow-2);
            border-radius: 5px;
            width: 70%;


        }

        .message-container {
            margin: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background-color: var(--color-home);


        }

        .message-container:last-child {
            margin-bottom: 0;
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .message-author {
            font-weight: bold;
            color: var(--color-secondary);
        }

        .message-timestamp {
            font-size: 0.8em;
            color: #888;
        }

        .message-body {
            white-space: pre-wrap;
            color: var(--color-white);
            margin-bottom: 10px;
        }

        .add-message-container {
            margin-bottom: 20px;
        }

        .add-message-container input[type="text"] {
            width: 300px;
            padding: 5px;
            font-size: 14px;
            margin-left: 20px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid var(--color-gray-light);
            background-color: var(--light-color);
            text-align: center;
            text-transform: capitalize;
            color: var(--color-white);
            margin-top: 20px;
        }

        .add-message-container button {
            padding: 5px 10px;
            font-size: 14px;
            width: auto;
            border-radius: 5px;
            cursor: pointer;
            color: var(--light-color);
            font-weight: 600;
        }

        button:hover {
            color: var(--color-orange);
        }

        @media screen and (max-width:1000px) {
            .messages-body {
                margin: 0;
                padding: 5px;
            }

            .message {
                width: 100%;
            }

            .add-message-container input[type="text"] {
                margin-left: 0;
            }

            .add-message-container button {
                margin-top: 10px;
            }

            .message-container {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');

    ?>

    <!--END OF NAV BAR-->


    <div class="messages-body">
        <div class="message">

            <h1>YOUR MESSAGES</h1>

            <div id="messageList"></div>

            <div class="add-message-container">
                <input type="text" id="messageInput" placeholder="Enter a message">
                <button onclick="addMessage()">Send Message</button>
            </div>
        </div>

    </div>
    <script>
        const messageList = document.getElementById('messageList');
        const messageInput = document.getElementById('messageInput');
        let messages = [];

        function addMessage() {
            const messageText = messageInput.value.trim();

            if (messageText !== '') {
                const newMessage = {
                    author: 'User',
                    body: messageText,
                    timestamp: new Date().toLocaleString()
                };

                messages.push(newMessage);
                renderMessages();

                messageInput.value = '';
            }
        }

        function deleteMessage(index) {
            messages.splice(index, 1);
            renderMessages();
        }

        function renderMessages() {
            messageList.innerHTML = '';

            for (let i = 0; i < messages.length; i++) {
                const message = messages[i];

                const messageContainer = document.createElement('div');
                messageContainer.classList.add('message-container');

                const messageHeader = document.createElement('div');
                messageHeader.classList.add('message-header');

                const messageAuthor = document.createElement('span');
                messageAuthor.classList.add('message-author');
                messageAuthor.innerText = message.author;

                const messageTimestamp = document.createElement('span');
                messageTimestamp.classList.add('message-timestamp');
                messageTimestamp.innerText = message.timestamp;

                const messageBody = document.createElement('div');
                messageBody.classList.add('message-body');
                messageBody.innerText = message.body;

                const deleteButton = document.createElement('button');
                deleteButton.innerText = 'Delete';
                deleteButton.onclick = () => deleteMessage(i);

                var styles = {
                    "color": "var(--light-color)",
                    "borderRadius": "5px",
                    "font-weight": "600",
                    "cursor": "pointer",
                    "padding": "5px 10px"

                }
                Object.assign(deleteButton.style, styles);

                messageHeader.appendChild(messageAuthor);
                messageHeader.appendChild(messageTimestamp);
                messageContainer.appendChild(messageHeader);
                messageContainer.appendChild(messageBody);
                messageContainer.appendChild(deleteButton);
                messageList.appendChild(messageContainer);
            }
        }
    </script>
    <script src="../JS FILES/script.js"></script>
</body>

</html>