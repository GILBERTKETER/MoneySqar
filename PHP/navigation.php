<?php
include('../PHP/connection.php');
$CURRENT_THEME;
$email_id = $_SESSION['LOGGED_IN_EMAIL'];


?>


<style>
    #profile-fill {
        width: 100%;
        height: 100vh;
        position: absolute;
        z-index: 1000000;
        background-color: hsla(0, 100%, 99%, 0.2);


        display: flex;
        align-items: center;
        justify-content: center;
        visibility: hidden;
    }

    .user_profile {
        width: 50%;
        height: auto;
        background-color: rgb(28, 8, 8);
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        z-index: 1;

    }

    .user_profile form {
        width: auto;
        height: auto;
        padding: 10px;
        background-color: hsla(0, 27%, 65%, 0.2);
        border-radius: 5px;
        display: grid;
        grid-template-columns: repeat(1, 100%);
        align-items: center;
        justify-content: space-between;

    }

    .user_profile form .left-user-profile,
    .user_profile form .right-user-profile {
        display: grid;
        gap: 10px;
    }

    .user_profile form .left-user-profile input,
    .user_profile form .right-user-profile input {
        width: auto;
        height: 30px;
        text-align: center;
        border-radius: 5px;
        border: 1px solid gray;
    }

    .readonly {
        background-color: rgb(223, 202, 202);
        color: rgb(154, 122, 122);


    }

    .user_profile form label {
        color: gray;
        font-size: 10px;
        position: relative;
    }

    .user_profile form .update-btn {
        border-radius: 5px;
        cursor: pointer;
        color: black;
        background-color: aqua;
        margin-top: 20px;
        position: relative;
        height: 30px;
    }

    @media screen and (min-width:1000px) {


        .user_profile form {
            display: grid;
            grid-template-columns: repeat(2, 49%);
        }
    }

    @media screen and (max-width:1000px) {
        .user_profile {
            width: 80%;
            transform: translate(0);
        }

    }
</style>
<style>
    .current_image {
        width: 200px;
        height: 200px;
        background-color: hsla(0, 27%, 65%, 0.5);
        border: 3px;
        position: absolute;

        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 50px;
    }

    .current_image img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        border: 1px solid red;

    }

    .profile_pic {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: hsla(0, 100%, 99%, 0.2);
        z-index: 40000;
        visibility: hidden;
        position: absolute;

    }

    .profile_pic .pic {
        width: 500px;
        height: 400px;
        display: flex;
        justify-content: center;



    }

    .profile_pic .pic .pic_upload {
        width: 100%;
        height: 100%;
        background-color: hsla(3, 27%, 65%, .6);
        border-radius: 10px;
        display: flex;
        justify-content: center;

        align-items: self-end;
        padding-bottom: 100px;

    }

    .profile_pic .pic .pic_upload input {

        background-color: hsla(0, 27%, 65%, 0.7);
        padding: 5px 20px;
        border-radius: 3px;
        margin: 10px;
        cursor: pointer;
        border: 1px solid;
        color: aqua;
    }


    @media screen and (max-width:760px) {
        .profile_pic {
            display: flex;
            align-items: start;
            justify-content: center;
        }

        .profile_pic .pic .pic_upload {
            margin-top: 20px;
            width: 99%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    }
</style>



<nav class="nav">
    <div class="top">
        <div class="logo">
            <img src="../ASSETS/logo-4.png" alt="" id="logos" class="logos">
            <h2 style="font-size: 16px;">MONEYSQAR </h2>
        </div>
        <!---->

        <div class="userss" id="infos">


            <div class="users-contentss">


                <div class="users-contents-1" id="user-contents-2">
                    <div class="informations" id="menu-toggle-1 menu-toggle-1">

                        <h4>Menu</h4>
                    </div>

                </div>


                <div class="users-contents-1" id="user-contents-3">
                    <div class="informations" id="menu-toggle-2 menu-toggle-1">

                        <h4 id="progress" onclick="progress()" class="progress">progress</h4>
                    </div>

                </div>

                <div class="users-contents-1" id="user-contents-4">
                    <div class="informations" id="menu-toggle-3 menu-toggle-1">

                        <h4>Refereal link</h4>
                    </div>

                </div>





                <div class="users-contents-1" id="user-contents-5">
                    <div class="informations">

                        <h4>personal</h4>
                    </div>


                </div>
                <div class="users-contents-1" id="user-contents-6">
                    <div class="informations">

                        <h4>log out</h4>
                    </div>


                </div>


            </div>


        </div>

        <!---->

        <!-- <div class="search-bar">
            <span class="material-icons-sharp">search</span>
            <input type="search" placeholder="search">
        </div> -->

        <div class="info">
            <div class="content1">
                <h3>be good to peaople while going up, you might need them while coming down.</h3>
            </div>
        </div>
        <div class="upgrade" hidden>
            <div class="upgrade-btn">
                <button class="button-primary-1">
                    upgrade
                    <span class="material-icons-sharp">
                        upgrade
                    </span>
                </button>

            </div>

        </div>

        <div class="notices">
            <div class="notification">
                <i class="fa-sharp fa-regular fa-bell"><sup id="not">3</sup></i>

            </div>

            <div class="messages">
                <i class="fa-sharp fa-regular fa-envelope"><sup id="mes">3</sup></i>

            </div>
        </div>
        <div class="mode" id="mode" name="mode">

            <span class="material-icons-sharp" id="mode1">
                light_mode
            </span>
            <span class="material-icons-sharp" id="mode2">
                dark_mode
            </span>
        </div>




        <div class="profile-area">
            <?php
            include('../PHP/connection.php');
            $email = $_SESSION['LOGGED_IN_EMAIL'];

            $check_Email_from_images = "SELECT * FROM images
                                                WHERE(Email_Address='$email');";
            $exec_check_Email_from_images = mysqli_query($mysqli, $check_Email_from_images);

            if (mysqli_num_rows($exec_check_Email_from_images) > 0) {
                while ($row_exec_check_email_images = mysqli_fetch_assoc($exec_check_Email_from_images)) {
                    $img_name = $row_exec_check_email_images['image_url'];
                    $path = '../uploads/' . $img_name;
                }
            } else {
                $path = "../ASSETS/profile-photo.jpg";
            }
            ?>

            <div class="profile-pic" id="profile-pic">
                <img src="<?php echo $path; ?>" alt="" id="img" onclick="show()">
            </div>
        </div>


        <div class="user" id="info" onclick="show()">
            <div class="user-info">
                <div class="user-pic">

                    <img src="<?php echo $path; ?>" alt="">

                </div>
                <h3>
                    <?php

                    function EmailShow()
                    {
                        include('../PHP/connection.php');
                        $loggedinEmail = $_SESSION['LOGGED_IN_EMAIL'];
                        $sql = "SELECT * FROM moneysqar_registered_users WHERE (Email_Address = '$loggedinEmail' );";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['First_Name'] . ' ' . $row['Last_Name'];
                            }
                        }
                    }
                    EmailShow();
                    ?></h3>

            </div>
            <hr>

            <div class="user-content">
                <div class="user-content-1">
                    <div class="information">

                        <h4>Projects</h4>
                    </div>
                    <span class="material-symbols-sharp">
                        chevron_right
                    </span>
                </div>


                <div class="user-content-1" style="display: none;">
                    <div class="information">

                        <h4>upgrade-premium</h4>
                    </div>
                    <span class="material-symbols-sharp">
                        chevron_right
                    </span>
                </div>

                <div class="user-content-1">
                    <div class="information">

                        <a href="#referal-link">
                            <h4>Refferal link</h4>
                        </a>
                    </div>
                    <span class="material-symbols-sharp">
                        chevron_right
                    </span>
                </div>


                <div class="user-content-1">
                    <div class="information">

                        <li id="profile">
                            <h4> Profile</h4>
                        </li>

                    </div>
                    <span class="material-symbols-sharp">
                        chevron_right
                    </span>
                </div>


                <div class="user-content-1">
                    <div class="information">

                        <li id="prof_pic">
                            <h4>settings</h4>
                        </li>
                    </div>

                    <span class="material-symbols-sharp">
                        chevron_right
                    </span>
                </div>
                <div class="user-content-1">

                    <div class="information" name="logout">
                        <a href="#" onclick="logout()">
                            <h4> log out</h4>
                        </a>

                    </div>

                    <span class="material-symbols-sharp">
                        chevron_right
                    </span>
                </div>


            </div>


        </div>
    </div>
</nav>




<div class="profile_fill" id="profile-fill">
    <div class="user_profile">
        <h4>Complete the profile information to unlock payments today.</h4>

        <form action="../PHP/profile_update.php" method="post">
            <div class="left-user-profile">
                <label for="user_email">Email</label>
                <input type="mail" id="user_email" class="readonly" name="user_email" readonly value="<?php
                                                                                                        $User_Info = "SELECT * FROM  moneysqar_registered_users
                                                                                                       WHERE(Email_Address='$email');";
                                                                                                        $exec_User_Info = mysqli_query($mysqli, $User_Info);
                                                                                                        while ($row_info = mysqli_fetch_assoc($exec_User_Info)) {
                                                                                                            $email_address = $row_info['Email_Address'];
                                                                                                            $first_Name = $row_info['First_Name'];
                                                                                                            $last_Name = $row_info['Last_Name'];
                                                                                                            $phon_number = $row_info['Phone_No'];
                                                                                                            $user_name = $row_info['User_Name'];
                                                                                                            $address_number = $row_info['Address'];
                                                                                                            $refferer = $row_info['refferer_UserName'];
                                                                                                        }
                                                                                                        echo $email_address;
                                                                                                        ?>">

                <label for="F_name">First Name</label>
                <input type="text" id="F_name" class="readonly" name="first_name" readonly value="<?php echo $first_Name; ?>">

                <label for="name">User Name</label>
                <input type="text" id="name" class="readonly" name="name" readonly value="<?php echo $user_name; ?>">

                <label for="package-name">Package level</label>
                <input type="text" id="package-name" class="readonly" name="package-name" readonly value="Gold">
            </div>

            <div class="right-user-profile">
                <label for="phone-no">Phone no</label>
                <input type="number" id="phone-no" name="phone-no" placeholder="<?php echo $phon_number; ?>">

                <label for="L_name">Last Name</label>
                <input type="text" id="L_name" class="readonly" name="Last_name" readonly value="<?php echo $last_Name; ?>">

                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="<?php echo $address_number; ?>">

                <label for="Refferal_code">Reffer Code</label>
                <input type="text" id="Refferal_code" class="readonly" name="Refferal_code" readonly value="<?php echo $refferer; ?>">

            </div>


            <button type="submit" class="update-btn" name="update-info">update</button>

        </form>
    </div>
</div>



































<div class="profile_pic" id="profile_pic_sets">

    <div class="pic">
        <div class="current_image">
            <img src="<?php echo $path; ?>" alt="">

        </div>

        <div class="pic_upload">
            <?php if (isset($_GET['error'])) : ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php endif ?>

            <form action="../PHP/upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="my_image">
                <input type="submit" name="submit" value="Upload">

            </form>
        </div>
    </div>


</div>


<script>
    /*
    let value = <//?php echo $CURRENT_THEME; ?>

    function toggleClass(Value) {

        if (value === 1) {
            document.getElementById('mode').addEventListener('click', () => {
                document.body.classList.toggle('dark-theme');

            });

        }
        // Function to handle the button click event
        function handleClick() {
            // Fetch the current mode value from the server
            fetch("", {
                    method: "POST",
                    <!--body: "mode=<//?//= //$Mode === '1' ? '0' : '1'; ?>"
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error("Error updating mode: " + data.error);
                    } else {
                        console.log("Mode updated successfully: " + data.mode);
                    }
                })
                .catch(error => {
                    console.error("Error fetching mode: " + error);
                });
        }

        // Add a click event listener to the button
        var toggleButton = document.getElementById("mode");
        toggleButton.addEventListener("click", handleClick);


    }
    toggleClass(value);*/
</script>

<script>
    document.getElementById("profile").onclick = function() {
        document.getElementById("profile-fill").style.visibility = "visible";
        document.body.style.overflow = "hidden";
    };

    document.getElementById("prof_pic").onclick = function() {
        document.getElementById("profile_pic_sets").style.visibility = "visible";
        document.body.style.overflow = "hidden";
    };
</script>
<script>
    //opening notifications
    document.querySelector(".fa-bell").addEventListener('click', () => {
        window.open("../HTML FILES/notification.php", "_self");
    });
    document.querySelector(".fa-envelope").addEventListener('click', () => {
        window.open("../HTML FILES/not.php", "_self");
    });
</script>

<script>
    // Function to toggle the theme
    function toggleTheme() {
        var body = document.body;
        body.classList.toggle("dark-theme");

        // Save the selected mode in local storage
        var isDarkTheme = body.classList.contains("dark-theme");
        localStorage.setItem("theme", isDarkTheme ? "dark" : "light");
    }

    // Check if there is a previously selected mode in local storage
    var savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        document.body.classList.add("dark-theme");
    }
    // Function to clear the saved theme from local storage
    function clearTheme() {
        localStorage.removeItem("theme");
    }

    // Add event listener to the mode element
    var modeElement = document.getElementById("mode");
    modeElement.addEventListener("click", toggleTheme);

    // Call clearTheme() function when the user logs out
    function logout() {
        //clearTheme();
        // Redirect to the PHP logout script
        window.location.href = "../PHP/logout.php";
    }
</script>