
<?php

session_start();

require_once "connect.php";

if ($_SESSION['admin'] == 0) {
    header("Location: index.php");
}

$polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
$polaczenie->query("SET NAMES 'utf8'");


$passid = $_GET['id'];

$sql3 = "DELETE FROM hasla WHERE ID = '$passid'";

$polaczenie->query($sql3);

unset($_SESSION['idpass']);
$_SESSION['x_pass'] = "HASŁO USUNIĘTE";

mysqli_close($polaczenie);

header("Location: adminpanel.php");

?>