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
    <title>Computer_Project_Inquiry-Money_Sqar_Technologies</title>

    <!--STYLESHEET LINK-->
    <link rel="stylesheet" href="../CSS FILES/style.css">
    <link rel="stylesheet" href="../CSS FILES/computer_project.css">
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


    <style>
        .aside_to_left_right {
            left: 0px;
        }

        .main_to_left_right {
            margin-left: 100%;
        }

        .transform {
            transform: translate(380px);
        }
    </style>
</head>

<body>


    <!--NAV BAR BEGINS-->
    <?php
    include('../PHP/navigation.php');
    ?>
    <!--END OF NAV BAR-->
    <div id="bar_left">
        <i class="fa-solid fa-bars-staggered fa-2x"></i>
    </div>

    <style>

    </style>
    <div class="computer-project-area">

        <aside id="on_sell_projects">
            <div id="close-btn">
                <i id="close_buttn" class="fa-solid fa-xmark fa-2xl"></i>

            </div>
            <div class="container-area">
                <div class="project-card">
                    <h2>computer studies project</h2>
                    <div class="flex-project">
                        <h5 id="name">name :</h5>
                        <h5>Nekta management system</h5>
                    </div>
                    <div class="flex-project">
                        <h5 id="year">year :</h5>
                        <h5>2022</h5>
                    </div>
                    <div class="details-project">
                        <p>the project is available in all milestones at once.</p>
                        <h3>purchase today</h3>
                    </div>

                    <div class="price">
                        <h1 class="strike">Ksh. 5,000</h1>
                        <h1 class="amount">Ksh. 3,500</h1>
                    </div>

                    <div class="button-project">

                        <form action="../PHP/computer_project_handle.php" method="post">
                            
                            <input name="file" type="text" value="sample.txt" hidden>
                            <input name="cost" type="number" value="3500" hidden>
                            <?php
                            // ===========================
                            $path = '../Files/';
                            $file = 'sample.txt';
                            $email = $_SESSION['LOGGED_IN_EMAIL'];
                            $hiddenbt2 = '';
                            $query_tips = "SELECT * FROM computerprojectfiles where(Document = '$file' and Email_Address  = '$email');";
                            $exec_query_tips = mysqli_query($mysqli, $query_tips);

                            if (mysqli_num_rows($exec_query_tips) > 0) {
                                while ($row_query_tips = mysqli_fetch_assoc($exec_query_tips)) {
                                    $verification = $row_query_tips['Verification'];
                                    if ($verification == 'verified') {
                                        $hiddenbt2 = '';
                                    } else {
                                        $hiddenbt2 = 'hidden';
                                    }
                                }
                            } else {
                                $hiddenbt2 = 'hidden';
                            }
                            // ============

                            ?>
                            <button name="purchaseFile" type="submit">purchase now</button>
                        </form>
                        <a href="<?php echo $path . $file; ?>" <?php echo $hiddenbt2; ?> download>Download</a>

                    </div>

                </div>
                <div class="project-card">
                    <h2>computer studies project</h2>
                    <div class="flex-project">
                        <h5 id="name">name :</h5>
                        <h5>Nekta management system</h5>
                    </div>
                    <div class="flex-project">
                        <h5 id="year">year :</h5>
                        <h5>2022</h5>
                    </div>
                    <div class="details-project">
                        <p>the project is available in all milestones at once.</p>
                        <h3>purchase today</h3>
                    </div>

                    <div class="price">
                        <h1 class="strike">Ksh. 5,000</h1>
                        <h1 class="amount">Ksh. 3,500</h1>
                    </div>

                    <div class="button-project">

                        <form action="../PHP/computer_project_handle.php" method="post">
                            <input name="file2" type="text" value="sample2.txt" hidden>
                            <input name="cost" type="number" value="3500" hidden>

                            <?php
                            // ===========================
                            $path = '../Files/';
                            $file2 = 'sample2.txt';
                            $email = $_SESSION['LOGGED_IN_EMAIL'];
                            $hiddenbt3 = '';
                            $query_tips2 = "SELECT * FROM computerprojectfiles where(Document = '$file2' and Email_Address  = '$email');";
                            $exec_query_tips2 = mysqli_query($mysqli, $query_tips2);

                            if (mysqli_num_rows($exec_query_tips2) > 0) {
                                while ($row_query_tips2 = mysqli_fetch_assoc($exec_query_tips2)) {
                                    $verification2 = $row_query_tips2['Verification'];
                                    if ($verification2 == 'verified') {
                                        $hiddenbt3 = '';
                                    } else {
                                        $hiddenbt3 = 'hidden';
                                    }
                                }
                            } else {
                                $hiddenbt3 = 'hidden';
                            }
                            // ============

                            ?>
                            <button name="purchaseFile2" type="submit">purchase now</button>
                        </form>
                        <a href="<?php echo $path . $file2; ?>" <?php echo $hiddenbt3; ?> download>Download</a>

                    </div>


                </div>
                <div class="project-card">
                    <h2>computer studies project</h2>
                    <div class="flex-project">
                        <h5 id="name">name :</h5>
                        <h5>Nekta management system</h5>
                    </div>
                    <div class="flex-project">
                        <h5 id="year">year :</h5>
                        <h5>2022</h5>
                    </div>
                    <div class="details-project">
                        <p>the project is available in all milestones at once.</p>
                        <h3>purchase today</h3>
                    </div>

                    <div class="price">
                        <h1 class="strike">Ksh. 5,000</h1>
                        <h1 class="amount">Ksh. 3,500</h1>
                    </div>

                    <div class="button-project">

                        <form action="../PHP/computer_project_handle.php" method="post">
                            <input name="file3" type="text" value="sample3.txt" hidden>
                            <input name="cost" type="number" value="3500" hidden>

                            <?php
                            // ===========================
                            $path = '../Files/';
                            $file3 = 'sample3.txt';
                            $email = $_SESSION['LOGGED_IN_EMAIL'];
                            $hiddenbt4 = '';
                            $query_tips3 = "SELECT * FROM computerprojectfiles where(Document = '$file3' and Email_Address  = '$email');";
                            $exec_query_tips3 = mysqli_query($mysqli, $query_tips3);

                            if (mysqli_num_rows($exec_query_tips3) > 0) {
                                while ($row_query_tips3 = mysqli_fetch_assoc($exec_query_tips3)) {
                                    $verification3 = $row_query_tips3['Verification'];
                                    if ($verification3 == 'verified') {
                                        $hiddenbt4 = '';
                                    } else {
                                        $hiddenbt4 = 'hidden';
                                    }
                                }
                            } else {
                                $hiddenbt4 = 'hidden';
                            }
                            // ============

                            ?>
                            <button name="purchaseFile3" type="submit">purchase now</button>
                        </form>
                        <a href="<?php echo $path . $file3; ?>" <?php echo $hiddenbt4; ?> download>Download</a>

                    </div>

                </div>
            </div>

        </aside>
        <main class="main_section" id="section_main">

            <div class="this-year">
                <?php
                $path = '../ASSETS/';
                $image = 'tech5.png';
                ?>
                <div class="project-view">
                    <img src="<?php echo $path . $image; ?>" alt="">

                </div>
                <div class="this-year-details">
                    <h2>This year computer studies project</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni animi dolores quisquam sit fugit
                        laudantium est. Esse quisquam dolore laudantium fuga, consequatur officia dignissimos, nam eius
                        placeat, reiciendis laborum cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
                        voluptatem mollitia sapiente tempora consequuntur nostrum sequi iusto assumenda deleniti, eum
                        eaque accusantium quasi inventore obcaecati unde dolorum. Architecto, eveniet doloremque.</p>

                    <h3>available milestones</h3>
                    <ol>
                        <li>milestone 1 - <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dicta
                                sapiente corrupti ex voluptate?</p>
                        </li>
                        <li>milestone 2 - <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae consectetur
                                ex nihil voluptatum ! </p>
                        </li>
                        <li>milestone 3 - <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur, odio
                                quo, harum porro facilis !</p>
                        </li>
                    </ol>


                    <div class="flex-this-year-details">
                        <h5 id="strike">Ksh. 5500</h5>
                        <h6>40% discount</h6>
                        <?php $amount = 3500; ?>
                        <h5>Ksh. <?php echo $amount; ?></h5>
                    </div>

                    <?php
                    // ===========================
                    $email = $_SESSION['LOGGED_IN_EMAIL'];
                    $hiddenbt = '';
                    $query_tips = "SELECT * FROM computerproject where(Image_URL = '$image' and Email_Address  = '$email');";
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
                    <div class="this-year-button" style="display:flex; gap:20px;">
                        <form action="../PHP/computer_project_handle.php" method="post">
                            <input type="submit" name="BuyProject" value="Purchase now">
                            <input type="text" name="imageURL" value="<?php echo $image; ?>" hidden>
                            <input type="text" name="amount" value="<?php echo $amount; ?>" hidden>
                            <a href="<?php echo $path . $image; ?>" <?php echo $hiddenbt; ?> download>Download</a>
                        </form>
                    </div>
                </div>


            </div>
            <div class="flex_bottom">


                <div class="withdraw">
                    <h2>project inquiry</h2>
                    <div class="withdrawal_content">
                        <div class="account_balance">
                            <h3> in need of another project? Dont worry. Everything sorted for you.</h3>
                        </div>

                        <div class="flex_withdraw">
                            <div class="details-other">
                                <p>please note that the form submitted will be reviewed and feedback given in seven days time.
                                    Upon recieving and approval of developement, the schedule feasibility will be within the
                                    next two months due to massive inquiries.Note if you click the submit,we will deduct Ksh. 3500.</p>

                                <p id="date_of_interview" style="color:var(--color-secondary);"><?php
                                                                                                $interviewDate = '';
                                                                                                $datetoInterview = "SELECT * FROM  computerprojectinquiries WHERE(Email_Address = '$email');";
                                                                                                $exec_dateofInteview = mysqli_query($mysqli, $datetoInterview);
                                                                                                if (mysqli_num_rows($exec_dateofInteview) > 0) {
                                                                                                    while ($row_date = mysqli_fetch_assoc($exec_dateofInteview)) {
                                                                                                        $interviewDate = $row_date['Date_Of_Interview'];
                                                                                                        $course = $row_date['Type_Of_Project'];
                                                                                                    }
                                                                                                    echo 'You have Applied Already for ' . $course . '.Your Interview Date is ' . $interviewDate . 'and will cost ksh .3500';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                }
                                                                                                ?></p>

                            </div>
                            <div class="withdrawal_threshold">
                                <form action="../PHP/computer_project_handle.php" method="post">
                                    <p>fill the form below to inquire.</p>
                                    <input type="text" name="username" value="<?php echo $_SESSION['LOGGED_IN_USERNAME']; ?>" id="username" readonly>

                                    <input type="text" name="inquireEmail" id="email" value="<?php echo $_SESSION['LOGGED_IN_EMAIL']; ?>" readonly>

                                    <input type="text" name="typeOfProject" placeholder="Type of project" id="typeof">
                                    <input type="number" name="amount" value="3500" id="amount" hidden>




                                    <button type="submit" name="inquire">submit</button>

                                </form>
                            </div>


                        </div>

                    </div>

                </div>

                <div class="flex-other-kind-project-2">
                    <h3>Do you want to learn advanced microsoft office (packages) ?</h3>
                    <h2>Apply for the training today which is done every saturday as from 6pm E.A.T.</h2>
                    <div class="flex-apply">
                        <div class="details-apply-today">
                            <h3>Be sure to be a pro in the office package you selected.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis sint harum nam quo
                                commodi ex vel voluptates autem accusamus exercitationem veniam ipsam tenetur maxime ullam
                                veritatis, provident delectus fuga.</p>

                            <div class="available-packages">
                                <h2>packages available</h2>

                                <ol>
                                    <li>Microsoft word</li>
                                    <li>Microsoft excel</li>
                                    <li>Microsoft Access</li>
                                    <li>Microsoft powerpoint</li>
                                    <li>Microsoft publisher</li>
                                </ol>
                            </div>
                            <p id="date_of_interview" style="color:var(--color-secondary); font-size: 1rem;">
                                <?php
                                $interviewDateOffice = '';
                                $datetofInterview = "SELECT * FROM  computer_offices_applications WHERE(Email_Address = '$email');";
                                $exec_dateofInteview = mysqli_query($mysqli, $datetofInterview);
                                if (mysqli_num_rows($exec_dateofInteview) > 0) {
                                    while ($row_date = mysqli_fetch_assoc($exec_dateofInteview)) {
                                        $interviewDateOffice = $row_date['Interview_Date'];
                                        $course = $row_date['Type_Of_Office'];
                                    }
                                    echo 'You have Applied Already for ' . $course . '.Your Interview Date is ' . $interviewDateOffice . 'and will cost ksh .3500';
                                } else {
                                    echo '';
                                }
                                ?></p>


                        </div>

                        <div class="form">
                            <form action="../PHP/computer_project_handle.php" method="POST">

                                <input type="text" name="email_address" value="<?php
                                                                                echo $_SESSION['LOGGED_IN_EMAIL'];

                                                                                ?>">
                                <input type="text" name="username" value="<?php
                                                                            echo $_SESSION['LOGGED_IN_USERNAME'];

                                                                            ?>">

                                <!-- <input type="text" id="typeofoffice" placeholder="Type of Office"> -->
                                <select name="officeType" required>
                                    <option value="Microsoft Word">Microsoft Word</option>
                                    <option value="Microsoft Excel">Microsoft Excel</option>
                                    <option value="Microsoft Access">Microsoft Access</option>
                                    <option value="Microsoft Powerpoint">Microsoft Powerpoint</option>
                                    <option value="Microsoft Publisher">Microsoft Publisher</option>

                                </select>


                                <!-- <input type="textarea" placeholder="Details" id="details-apply"> -->

                                <div class="flex-this-year-details" id="flex-this-year-details">
                                    <h5 id="strike">Ksh. 5500</h5>
                                    <h6>40% discount</h6>
                                    <h5>Ksh. 3500</h5>
                                </div>
                                <input type="number" name="amount" id="" value="3500" hidden>
                                <button type="submit" id="apply" name="apply">apply</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </main>

        <div class="onother-kind-project">





        </div>

    </div>


    <script>
        var bar = document.getElementById("bar_left");
        var main_section = document.getElementById("section_main");
        var aside = document.getElementById("on_sell_projects");
        var close = document.getElementById("close_buttn");
        bar.onclick = function() {
            bar.style.display = "none";
            main_section.classList.toggle("main_to_left_right");
            aside.classList.toggle("aside_to_left_right");
        }
        close.onclick = function() {
            bar.style.display = "block";
            main_section.classList.toggle("main_to_left_right");
            aside.classList.toggle("aside_to_left_right");
        }
    </script>
    <script src="../JS FILES/script.js"></script>
</body>

</html>