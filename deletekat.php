
<?php

session_start();
if ($_SESSION['admin'] == 0) {
    header("Location: index.php");
}

require_once "connect.php";

$polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
$polaczenie->query("SET NAMES 'utf8'");


$passid = $_GET['id'];





$sql3 = "DELETE FROM kategorie WHERE ID = '$passid'";

$polaczenie->query($sql3);

unset($_SESSION['idpass']);
$_SESSION['x_pass'] = "KATEGORIA USUNIĘTA";

mysqli_close($polaczenie);

header("Location: adminpanel.php");

?>