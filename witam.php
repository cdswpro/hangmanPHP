<?php

session_start();

if (!isset($_SESSION['udanarejestracja'])) {
    header('Location: index.php');

    exit();
} else {
    unset($_SESSION['udanarejestracja']);
}


//usuwanie zmiennych do zapamiętania podczas rejestracji

if (isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);

//usuwanie errorów

if (isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
if (isset($_SESSION['e_pass'])) unset($_SESSION['e_pass']);

?>
<!DOCTYPE HTML>

<html lang="pl">

<head>
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <meta charset="utf-8">
    <title>♣ERYK♣</title>

    <link rel="stylesheet" href="style.css" type="text/css">


</head>

<body>
    <div class="dane" class="pojemnik">
        <?php
        echo  '<span style="color:green">Konto zostało założone, możesz się zalogować ☺</span>';

        ?>
        <br><br><br>


        <a href="index.php"><button class="guzik">STRONA GŁÓWNA</button></a>
    </div>
</body>


</html>