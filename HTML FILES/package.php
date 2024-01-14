

<!DOCTYPE html>
<html>

<head>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Welcome to the Upgrade Page!</h1>

    <button onclick="showUpgradePopup()">Upgrade</button>

    <div id="upgradePopup" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeUpgradePopup()">&times;</span>
            <h2>Choose a package:</h2>
            <form id="upgradeForm">
                <input type="radio" name="package" value="bronze" checked> Bronze ($300)<br>
                <input type="radio" name="package" value="silver"> Silver ($500)<br>
                <input type="radio" name="package" value="gold"> Gold ($700)<br><br>
                <input type="submit" value="Upgrade">
            </form>
        </div>
    </div>

    <script>
        function showUpgradePopup() {
            var popup = document.getElementById("upgradePopup");
            popup.style.display = "block";
        }

        function closeUpgradePopup() {
            var popup = document.getElementById("upgradePopup");
            popup.style.display = "none";
        }

        document.getElementById("upgradeForm").addEventListener("submit", function (event) {
            event.preventDefault();
            var package = document.querySelector('input[name="package"]:checked').value;

            var amount = 0;
            switch (package) {
                case "bronze":
                    amount = 300;
                    break;
                case "silver":
                    amount = 500;
                    break;
                case "gold":
                    amount = 700;
                    break;
            }

            // You can use this amount value for further processing, such as initiating a payment.

            alert("Thank you for upgrading to " + package + " package!");
            closeUpgradePopup();
        });
    </script>
</body>

</html>