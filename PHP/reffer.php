<?php
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
}


//get the username
$email = $_SESSION['LOGGED_IN_EMAIL'];
$UserName_sql = "SELECT * FROM moneysqar_registered_users
                WHERE(Email_Address = '$email');";
$exec_userName_sql = mysqli_query($mysqli, $UserName_sql);
while ($row_exec_userName_sql = mysqli_fetch_assoc($exec_userName_sql)) {
    $username = $row_exec_userName_sql['User_Name'];
}


//////////////////////////////////////////////



$Activated_downlines = "SELECT COUNT(*) AS Counts FROM moneysqar_registered_users 
                        WHERE(refferer_UserName = '$username'AND Activation_Amount = 500);";

$ex_Activated_downlines = mysqli_query($mysqli, $Activated_downlines);
if (mysqli_num_rows($ex_Activated_downlines) > 0) {
    while ($row = mysqli_fetch_assoc($ex_Activated_downlines)) {

        $countlevel1 = $row['Counts']; //number of level 1 refferals
        if ($countlevel1 >= 20) {
            //insert 100 to the welcome bonus table
            $insertBonus = "UPDATE moneysqar_registered_users SET Welcome_Bonus = 100 WHERE(Email_Address = '$email');";
            $exec_insertBonus = mysqli_query($mysqli, $insertBonus);
        } else {
            $insert0Bonus = "UPDATE moneysqar_registered_users SET Welcome_Bonus = 0 WHERE(Email_Address = '$email');";
            $exec_insert0Bonus = mysqli_query($mysqli, $insert0Bonus);
        }
    }
} else {
    $countlevel1 = 0;
}


//level2 check
$Total_Level2_Downlines = 0;

//LEVEL 1 USER NAMES BEGIN
$Level1_User_Names = '';
$UserNames_Level1 = "SELECT * FROM moneysqar_registered_users
WHERE(refferer_UserName = '$username'  AND Activation_Amount=500);";
$exec_UserNames_Level1 = mysqli_query($mysqli, $UserNames_Level1);
if (mysqli_num_rows($exec_UserNames_Level1) > 0) {

    while ($row_UserNames_Level1 = mysqli_fetch_assoc($exec_UserNames_Level1)) {
        $Level1_User_Names = $row_UserNames_Level1['User_Name'];




        //LETS CHECK THE LEVEL 2 USERNAMES
        $UserNames_level2 = "SELECT COUNT(*) AS COUNTS FROM moneysqar_registered_users
    WHERE (refferer_UserName = '$Level1_User_Names' AND Activation_Amount=500);";
        $exec_UserNames_level2 = mysqli_query($mysqli, $UserNames_level2);

        while ($row_UserNames_level2 = mysqli_fetch_assoc($exec_UserNames_level2)) {
            $Total_Level2_Downlines = $Total_Level2_Downlines + intval($row_UserNames_level2['COUNTS']);
        }
    }
} else {
    $Total_Level2_Downlines = 0;
}
///////////////////////////////
//LEVEL 3 USERNAMES QUERY
$Total_Level3_downlines = 0;

/////////////////////////////////////////
$UserNames_level22 = "SELECT *  FROM moneysqar_registered_users
  WHERE (refferer_UserName = '$Level1_User_Names'  AND Activation_Amount=500);";
$exec_UserNames_level22 = mysqli_query($mysqli, $UserNames_level22);

while ($row_UserNames_level22 = mysqli_fetch_assoc($exec_UserNames_level22)) {
    $level22_User_Names = $row_UserNames_level22['User_Name'];
    /////////////////////////////////////

    $UserNames_Level3 = "SELECT COUNT(*) AS LEVEL3_COUNTS FROM moneysqar_registered_users
  WHERE(refferer_UserName = '$level22_User_Names' AND Activation_Amount=500);";

    $exec_UserNames_Level3 = mysqli_query($mysqli, $UserNames_Level3);


    while ($row_UserNames_Level3 = mysqli_fetch_assoc($exec_UserNames_Level3)) {

        $level3_User_Names = $row_UserNames_Level3['LEVEL3_COUNTS'];
        $Total_Level3_downlines = $Total_Level3_downlines + intval($level3_User_Names);
    }
}
/////////////////////////////////////////////
//===================================


$refferalEarnings = ($countlevel1 * 150) + ($Total_Level2_Downlines * 100) + ($Total_Level3_downlines * 50);
//insert into the refferals table
$check_refferals = "SELECT * FROM refferals_earnings
  WHERE(Email_Address = '$email');";
$exec_check_refferals = mysqli_query($mysqli, $check_refferals);
if (mysqli_num_rows($exec_check_refferals) > 0) {
    while ($row_exec_check_refferals = mysqli_fetch_assoc($exec_check_refferals)) {
        $fetched_level1 = $row_exec_check_refferals['Level_1'];
        $fetched_level2 = $row_exec_check_refferals['Level_2'];
        $fetched_level3 = $row_exec_check_refferals['Level_3'];
        //update the record
        $update_record = "UPDATE refferals_earnings
                              SET Level_1 = '$countlevel1',
                              Level_2 = '$Total_Level2_Downlines',
                              Level_3 = '$Total_Level3_downlines',
                              Total_Earnings = '$refferalEarnings';";

        $exec_update_record = mysqli_query($mysqli, $update_record);
    }
} else {
    //insert the record
    $insert_record = "INSERT INTO refferals_earnings (Email_Address,Level_1,Level_2,Level_3,Total_Earnings)
                        VALUES('$email','$countlevel1','$Total_Level2_Downlines','$Total_Level3_downlines','$refferalEarnings');";
    $exec_insert_record = mysqli_query($mysqli, $insert_record);
}
//--------------------------------
//import the levels
$email = $_SESSION['LOGGED_IN_EMAIL'];
$Level_Check = "SELECT * FROM refferals_earnings
  WHERE (Email_Address = '$email');";
$exec_Level_Check = mysqli_query($mysqli, $Level_Check);

if (mysqli_num_rows($exec_Level_Check) > 0) {
    while ($row_exec_level_check = mysqli_fetch_assoc($exec_Level_Check)) {
        $lvl1 = $row_exec_level_check['Level_1'];
        $lvl2 = $row_exec_level_check['Level_2'];
        $lvl3 = $row_exec_level_check['Level_3'];

        $active = ($lvl1 + $lvl2 + $lvl3);
        $activ_lvls = ($lvl1 + $lvl2 + $lvl3);
    }
} else {
    $active = 0;
}
//--------------------------------