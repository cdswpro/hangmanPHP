<?php

//awatar
if (empty($_FILES["obrazek"]["name"]) == 0) {
    $nazwa_  = $_SESSION['user'];

    $target_dir = "awatar/";

    $target_file = $target_dir . basename($_FILES["obrazek"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($imageFileType != "png") {

        $wszystko_ok = false;
        $_SESSION['e_awatar'] = "DOZWOLONY TYLKO FORMAT PNG";
    }



    if (!(move_uploaded_file($_FILES["obrazek"]["tmp_name"], $target_dir . $nazwa_ . "." . $imageFileType))) {

        $wszystko_ok = false;
        $_SESSION['e_awatar'] = "NIEZNANY BŁĄD PRZY WYSYŁANIU PLIKU";
    }
} else {
    $wszystko_ok = false;
    $_SESSION['e_awatar'] = "MUSISZ DODAĆ AWATAR";
}

header("Location: gra.php");
