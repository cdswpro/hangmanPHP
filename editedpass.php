
<?php

session_start();

if($_SESSION['admin']==0)
{
    header("Location: index.php");
}

require_once "connect.php";

            $polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);
         $polaczenie->query("SET NAMES 'utf8'");

$kateg = $_POST['kategoria'];

$haslo = $_POST['haslo'];

$id = $_SESSION['idpass'];





$sql3 = "UPDATE hasla SET haslo = '$haslo', kategoria = '$kateg' WHERE ID = '$id'";

$polaczenie->query($sql3);

unset($_SESSION['idpass']);
$_SESSION['x_pass']="HASŁO ZMIENIONE";



header("Location: adminpanel.php");

?>