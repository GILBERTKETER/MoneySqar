<?php
include('../PHP/connection.php');
if (!isset($_SESSION['LOGGED_IN_EMAIL'])) {
    header("Location:../HTML FILES/Login_systemmain.php");
    exit();
}


//import data from different tables
//BetTips Earnings
$email_id = $_SESSION['LOGGED_IN_EMAIL'];
$_BetTips = "SELECT SUM(Total_Earned) AS BetTipsEarnings FROM bettips_table
                WHERE(Email_Address = '$email_id');";

$exec_BetTips = mysqli_query($mysqli, $_BetTips);
$BetTips_Earnings = 0;
//fetch the bets earnings
if (mysqli_num_rows($exec_BetTips) > 0) {
    while ($row_exec_BetTips = mysqli_fetch_assoc($exec_BetTips)) {
        $BetTips_Earnings = $BetTips_Earnings + intval($row_exec_BetTips['BetTipsEarnings']);
    }
} else {
    $BetTips_Earnings = 0;
}


//coin_Tossing Earnings

$Coin_Tossing = "SELECT * FROM coin_tossing
                WHERE(Email_Address = '$email_id');";

$exec_Coin_Tossing = mysqli_query($mysqli, $Coin_Tossing);
$Coin_Tossing_Earnings = 0;
$amountUsedTossing = 0;
//fetch the Coin_Tossing earnings
if (mysqli_num_rows($exec_Coin_Tossing) > 0) {

    while ($row_exec_Coin_Tossing = mysqli_fetch_assoc($exec_Coin_Tossing)) {
        $amountUsedTossing = $row_exec_Coin_Tossing['Amount_Used'];
        $Coin_Tossing_Earnings = $Coin_Tossing_Earnings + intval($row_exec_Coin_Tossing['Tossing_Earnings']);
    }
} else {
    $Coin_Tossing_Earnings = 0;
}



//lucky_number Earnings

$Lucky_Number = "SELECT * FROM luckynumber_table
                WHERE(Email_Address = '$email_id');";

$exec_Lucky_Number = mysqli_query($mysqli, $Lucky_Number);
$Lucky_Number_Earnings = 0;
//fetch the luckynumber earnings
if (mysqli_num_rows($exec_Lucky_Number) > 0) {
    while ($row_exec_Lucky_Number = mysqli_fetch_assoc($exec_Lucky_Number)) {
        $amountLuckyUsed = $row_exec_Lucky_Number['Amount_Used'];
        $Lucky_Number_Earnings = $Lucky_Number_Earnings + intval($row_exec_Lucky_Number['Lucky_Number_Earnings']);
    }
} else {
    $Lucky_Number_Earnings = 0;
}



//Spinwheel Earnings

$Spin_Wheel = "SELECT * FROM spinwheel_table
                WHERE(Email_Address = '$email_id');";

$exec_Spin_Wheel = mysqli_query($mysqli, $Spin_Wheel);
$Spin_Wheel_Earnings = 0;
$amount_used = 0;
//fetch the spinwheel earnings
if (mysqli_num_rows($exec_Spin_Wheel) > 0) {
    while ($row_exec_Spin_Wheel = mysqli_fetch_assoc($exec_Spin_Wheel)) {
        $amount_used = $row_exec_Spin_Wheel['Amount_Used'];
        $spin_amount = $row_exec_Spin_Wheel['Spinwheel_Earnings'];
        $Spin_Wheel_Earnings = $Spin_Wheel_Earnings + $spin_amount;
    }
} else {
    $Spin_Wheel_Earnings = 0;
    $amount_used = 0;
}




//Deposits

$Deposits = "SELECT SUM(Amount) AS Deposits_Made FROM deposits_table
                WHERE(Email_Address = '$email_id');";

$exec_Deposits = mysqli_query($mysqli, $Deposits);
$Deposits_Made = 0;
//fetch the Deposits earnings
if (mysqli_num_rows($exec_Deposits) > 0) {
    while ($row_exec_Deposits = mysqli_fetch_assoc($exec_Deposits)) {
        $Deposits_Made = $Deposits_Made + intval($row_exec_Deposits['Deposits_Made']);
    }
} else {
    $Deposits_Made = 0;
}



//Refferals

$Refferals = "SELECT SUM(Total_Earnings) AS Refferal_earnings FROM refferals_earnings
                WHERE(Email_Address = '$email_id');";

$exec_Refferals = mysqli_query($mysqli, $Refferals);
$Refferals_Earnings = 0;
//fetch the Refferals earnings
if (mysqli_num_rows($exec_Refferals) > 0) {
    while ($row_exec_Refferals = mysqli_fetch_assoc($exec_Refferals)) {
        $Refferals_Earnings = $Refferals_Earnings + intval($row_exec_Refferals['Refferal_earnings']);
    }
} else {
    $Refferals_Earnings = 0;
}



//Trivia

$Trivia = "SELECT SUM(Trivia_Earnings) AS Trivia_Earnings2 FROM trivia_table
                WHERE(Email_Address = '$email_id');";

$exec_Trivia = mysqli_query($mysqli, $Trivia);
$Trivia_Earnings = 0;
//fetch the Trivia earnings
if (mysqli_num_rows($exec_Trivia) > 0) {
    while ($row_exec_Trivia = mysqli_fetch_assoc($exec_Trivia)) {
        $Trivia_Earnings = $Trivia_Earnings + intval($row_exec_Trivia['Trivia_Earnings2']);
    }
} else {
    $Trivia_Earnings = 0;
}


//Youtube Video-Earnings

$Video = "SELECT sum(Amount_Earned) AS EARNED FROM youtube_video
                WHERE(Email_Address = '$email_id');";

$exec_Video = mysqli_query($mysqli, $Video);
$Video_Earnings_Amount = 0;
//fetch the video earnings
if (mysqli_num_rows($exec_Video) > 0) {
    while ($row_exec_Video = mysqli_fetch_assoc($exec_Video)) {
        $totalEarnings = $row_exec_Video['EARNED'];
        $Video_Earnings_Amount = $Video_Earnings_Amount + intval($totalEarnings);
    }
} else {
    $Video_Earnings_Amount = 0;
}


//tiktok Video-Earnings

$VideoTik = "SELECT SUM(Amount_Earned) AS Earned FROM tiktok_earnings
                WHERE(Email_Address = '$email_id');";

$exec_VideoTik = mysqli_query($mysqli, $VideoTik);
$Video_Earnings_AmountTik = 0;
//fetch the video earnings
if (mysqli_num_rows($exec_VideoTik) > 0) {
    while ($row_exec_VideoTik = mysqli_fetch_assoc($exec_VideoTik)) {
        $totalEarningsTik = $row_exec_VideoTik['Earned'];
        $Video_Earnings_AmountTik = $Video_Earnings_AmountTik + intval($totalEarningsTik);
    }
} else {
    $Video_Earnings_AmountTik = 0;
}



//-withdrawals

$Withdrawals = "SELECT SUM(Amount) AS withdrwals FROM withdrawals_table
                WHERE(Email_Address = '$email_id');";

$exec_Withdrawals = mysqli_query($mysqli, $Withdrawals);
$Withdrawn_Amount = 0;
//fetch the Withdrawn_Amount 
if (mysqli_num_rows($exec_Withdrawals) > 0) {
    while ($row_exec_Withdrawals = mysqli_fetch_assoc($exec_Withdrawals)) {
        $Withdrawn_Amount = $Withdrawn_Amount + intval($row_exec_Withdrawals['withdrwals']);
    }
} else {
    $Withdrawn_Amount = 0;
}




//-welcome bonus

$welcome_Bonus = "SELECT * FROM moneysqar_registered_users
                WHERE(Email_Address = '$email_id');";

$exec_welcome_Bonus = mysqli_query($mysqli, $welcome_Bonus);
$welcome_bonus_Amount = 0;
//fetch the Withdrawn_Amount 
if (mysqli_num_rows($exec_welcome_Bonus) > 0) {
    while ($row_exec_welcome_Bonus = mysqli_fetch_assoc($exec_welcome_Bonus)) {
        $welcome_bonus_Amount = $welcome_bonus_Amount + intval($row_exec_welcome_Bonus['Welcome_Bonus']);
    }
} else {
    $welcome_bonus_Amount = 0;
}

//Account balance manipulation
//we should also subtract the support amount.
$support_Amount = "SELECT SUM(Support_Amount) AS SUPPORT FROM support_db";
$exec_supportAmount = mysqli_query($mysqli, $support_Amount);
$support = '';
if (mysqli_num_rows($exec_supportAmount) > 0) {
    while ($row_support = mysqli_fetch_assoc($exec_supportAmount)) {
        $support = $row_support['SUPPORT'];
    }
} else {
    $support = 0;
}

//lets add the payments every user pays during odd purchase.

$odds = "SELECT SUM(Amount) AS cost_of_odds FROM purchasebettips WHERE(Email_Address = '$email_id');";
$exec_odds = mysqli_query($mysqli, $odds);
$amount_Of_Odds = 0;
if (mysqli_num_rows($exec_odds) > 0) {
    while ($row_odds = mysqli_fetch_assoc($exec_odds)) {
        $amount_Of_Odds = $row_odds['cost_of_odds'];
    }
} else {
    $amount_Of_Odds = 0;
}

//computer project
$compAmount = "SELECT SUM(Amount) AS AMOUNT FROM computerproject WHERE(Email_Address = '$email_id' AND Verification = 'verified');";
$exec_compAmount = mysqli_query($mysqli, $compAmount);
$compAmountUsed = 0;
if (mysqli_num_rows($exec_compAmount) > 0) {
    while ($rowComp = mysqli_fetch_assoc($exec_compAmount)) {
        $compAmountUsed = $rowComp['AMOUNT'];
    }
} else {
    $compAmountUsed = 0;
}

//computer project files
$FilesAmount = "SELECT SUM(Cost) AS COST FROM computerprojectfiles WHERE(Email_Address = '$email_id' AND Verification = 'verified');";
$exec_FilesAmount = mysqli_query($mysqli, $FilesAmount);
$FilesAmountUsed = 0;
if (mysqli_num_rows($exec_compAmount) > 0) {
    while ($rowCompFiles = mysqli_fetch_assoc($exec_FilesAmount)) {
        $FilesAmountUsed = $rowCompFiles['COST'];
    }
} else {
    $FilesAmountUsed = 0;
}


//computer project inquiries
$Inquiries = "SELECT SUM(Cost) AS COST FROM computerprojectinquiries WHERE(Email_Address = '$email_id');";
$exec_Inquiries = mysqli_query($mysqli, $Inquiries);
$InquiriesUsed = 0;
if (mysqli_num_rows($exec_Inquiries) > 0) {
    while ($rowInquiries = mysqli_fetch_assoc($exec_Inquiries)) {
        $InquiriesUsed = $rowInquiries['COST'];
    }
} else {
    $InquiriesUsed = 0;
}


//computer project application
$application = "SELECT SUM(Cost) AS COST FROM computer_offices_applications WHERE(Email_Address = '$email_id');";
$exec_application = mysqli_query($mysqli, $application);
$ApplicationCost = 0;
if (mysqli_num_rows($exec_application) > 0) {
    while ($Rowapplication = mysqli_fetch_assoc($exec_application)) {
        $ApplicationCost = $Rowapplication['COST'];
    }
} else {
    $ApplicationCost = 0;
}

$Account_Balance = (10000 + $BetTips_Earnings + $Coin_Tossing_Earnings + $Lucky_Number_Earnings +
    $Spin_Wheel_Earnings + $Deposits_Made + $Refferals_Earnings + $Trivia_Earnings +
    $Video_Earnings_Amount + $welcome_bonus_Amount + $Video_Earnings_AmountTik) - ($amount_Of_Odds + $Withdrawn_Amount + $support + $amount_used + $Lucky_Number_Earnings + $amountUsedTossing + $compAmountUsed + $FilesAmountUsed + $InquiriesUsed + $ApplicationCost);


///proffits made
$profits = ($BetTips_Earnings + $Coin_Tossing_Earnings + $Lucky_Number_Earnings +
    $Spin_Wheel_Earnings  + $Refferals_Earnings + $Trivia_Earnings +
    $Video_Earnings_Amount + $welcome_bonus_Amount + $Withdrawn_Amount) - ($Deposits_Made);


//expenses and the profit

//profits-activation amount
//lets get the activation amount
$activation_amount = "SELECT * FROM moneysqar_registered_users
                        WHERE(Email_Address = '$email_id');";
$exec_activation_amount = mysqli_query($mysqli, $activation_amount);
$Activ_Amount = 0;
if (mysqli_num_rows($exec_activation_amount) > 0) {
    while ($row_exec_activation_amount = mysqli_fetch_assoc($exec_activation_amount)) {
        $Activ_Amount = $row_exec_activation_amount['Activation_Amount'];
    }
} else {
    $Activ_Amount = 0;
}

$_expense_To_Profits = $profits - $Activ_Amount;
