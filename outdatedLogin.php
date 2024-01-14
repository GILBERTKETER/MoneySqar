/*
session_start();


// Create a new MySQLi object and establish a connection
$mysqli = new mysqli("localhost", "root", "", "Money_Sqar_SNet_Technologies");


// Check the connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

function sanitize($data)
{
global $mysqli;
return mysqli_real_escape_string($mysqli, $data);
}
$Email_Adress = sanitize(($_POST['email']));
$password = sanitize($_POST['password']);
$_SESSION['LOGGED_IN_EMAIL'] = $_POST['email'];
$_SESSION['LOGGED_IN_PASSWORD'] = $_POST['password'];








$sql = "SELECT * FROM moneysqar_registered_users
WHERE ('$_POST[email]' = Email_Address AND '$_POST[password]' = Password)";
//$stmt = $mysqli->prepare($sql);
//$stmt->execute();
$password_check = "SELECT Password FROM moneysqar_registered_users
WHERE ('$_POST[email]' = Email_Address)";

$Result = mysqli_query($mysqli, $sql);
$Result_Password_Check = mysqli_query($mysqli, $password_check);

//email check

$email_check = "SELECT * FROM moneysqar_registered_users
WHERE Email_Address = '$Email_Adress'";

$Result_email_Check = mysqli_query($mysqli, $email_check);

if (mysqli_num_rows($Result) > 0) {
if (isset($_SESSION['LOGGED_IN_EMAIL']) && isset($_POST['login'])) {
$_SESSION['LOGGED_IN_EMAIL'] = $_POST['email'];
/*$cookieName = 'loggedIn';
$cookieValue = 'true';
$cookieExpiration = time() + 86400;
setcookie($cookieName, $cookieValue, $cookieExpiration, '/');



//header("Location: ../HTML FILES/index.php");


echo "<!--<script>
    window.location.href = '../HTML FILES/index.php';
</script>";
}
exit();
} else if ('$_POST[password]' != $Result_Password_Check) {
$error = "Incorrect passowrd combination!";
header("Location: ../HTML FILES/Login_systemmain.php?error=" . urlencode($error));
//echo "<script>
    window.location.href = '../HTML FILES/Login_systemmain.php?'
    error = " . urlencode($error) . "';
</script>";
if (mysqli_num_rows($Result_email_Check) == 0) {
$error = "Email Is Not Registered!";
header("Location: ../HTML FILES/Login_systemmain.php?error=" . urlencode($error));
}
}
}


// Close the connection
$mysqli->close();