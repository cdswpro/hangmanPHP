<?php

session_start();

if (isset($_POST['email'])) {
    //udana walidacja? tak
    $wszystko_ok = TRUE;


    //sprawdź login
    $login = $_POST['login'];

    //dlugość loginu
    if ((strlen($login) < 5) || (strlen($login) > 20)) {

        $wszystko_ok = false;
        $_SESSION['e_login'] = "Login musi zawierać od 5 do 20 znaków.";
    }
    if (ctype_alnum($login) == false) {
        $wszystko_ok = false;
        $_SESSION['e_login'] = "Login może zawierać tylko litery i cyfry(bez polskich znaków).";
    }

    //email

    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL); //sanityzacja adresu usuwa niedozwolone znaki

    if ((filter_var($emailB, FILTER_SANITIZE_EMAIL) == false) || ($emailB != $email)) {

        $wszystko_ok = false;
        $_SESSION['e_email'] = "Podaj poprawny email.";
    } //sprawdz email z eamilB


    //sprawdz hasła

    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ((strlen($pass1) < 8) || (strlen($pass1) > 20)) {
        $wszystko_ok = false;
        $_SESSION['e_pass'] = "Hasło musi posiadać od 8 do 20 znaków.";
    }

    if ($pass1 != $pass2) {
        $wszystko_ok = false;
        $_SESSION['e_pass'] = "Podane hasła nie są identyczne.";
    }



    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
    //zahaszuj hasło użyj najmocniejszej metody szyfrującej czyli bcrypt


    //zapamiętaj wprowadzone dane wpisz do value w form 

    $_SESSION['fr_login'] = $login;
    $_SESSION['fr_email'] = $email;


    require_once "connect.php";




    $polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
    if ($polaczenie->connect_errno != 0) {
        echo '<span style="color:red">Błąd połączenia</span>'; //rzuć nowym wyjątkiem;
    } else {

        //czy email juz istnieje?

        $rezultat = $polaczenie->query("SELECT ID FROM loginy WHERE Email='$email'");

        if (!$rezultat) echo '<span style="color:red">Błąd maila</span>'; //okreslenie błędu połączenia

        $ile_takich_maili = $rezultat->num_rows;

        if ($ile_takich_maili > 0) {
            $wszystko_ok = false;
            $_SESSION['e_email'] = "Istnieje taki email w bazie.";
        }

        //czy login juz istnieje?

        $rezultat = $polaczenie->query("SELECT ID FROM loginy WHERE Login='$login'");

        if (!$rezultat) echo '<span style="color:red">Błąd loginu</span>'; //okreslenie błędu połączenia

        $ile_takich_loginow = $rezultat->num_rows;
        if ($ile_takich_loginow > 0) {
            $wszystko_ok = false;
            $_SESSION['e_login'] = "Istnieje taki Login w bazie.";
        }

        //awatar
        if (empty($_FILES["obrazek"]["name"]) == 0) {
            $nazwa_  = $_POST["login"];

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


        if ($wszystko_ok == true) {
            //działa wszystko, zarejesttruj klienta
            if ($polaczenie->query("INSERT INTO loginy VALUES (NULL,'$login', '$pass_hash', '$email',0,'',0)")) {

                $_SESSION['udanarejestracja'] = true;
                header('Location: witam.php');
            } else {
                echo '<span style="color:red">Błąd rejestracji</span>';
            }
        }


        $polaczenie->close();
    }
} //cały fomr



?>




<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <meta charset="utf-8">
    <title>♣ERYK♣</title>

    <link rel="stylesheet" href="style.css" type="text/css">



</head>

<body>
    <header class="pojemnik">
        <div class="dane">

            <form method="post" enctype='multipart/form-data'>
                LOGIN:
                <input type="text" value="<?php
                                            if (isset($_SESSION['fr_login'])) {
                                                echo $_SESSION['fr_login'];
                                                unset($_SESSION['fr_login']);
                                            }
                                            ?>" name="login">
                <?php
                if (isset($_SESSION['e_login'])) {
                    echo '<div style="color:red">' . $_SESSION['e_login'] . '</div>';
                    unset($_SESSION['e_login']);
                }
                ?>
                <br>
                <br>

                E-MAIL:
                <input type="text" value="<?php
                                            if (isset($_SESSION['fr_email'])) {
                                                echo $_SESSION['fr_email'];
                                                unset($_SESSION['fr_email']);
                                            }
                                            ?>" name="email">
                <?php
                if (isset($_SESSION['e_email'])) {
                    echo '<div style="color:red">' . $_SESSION['e_email'] . '</div>';
                    unset($_SESSION['e_email']);
                }
                ?>
                <br>
                <br>

                HASŁO:
                <input type="password" name="pass1">
                <?php
                if (isset($_SESSION['e_pass'])) {
                    echo '<div style="color:red">' . $_SESSION['e_pass'] . '</div>';
                    unset($_SESSION['e_pass']);
                }
                ?>
                <br>
                <br>

                POWTÓRZ HASŁO:
                <input type="password" name="pass2">
                <br>
                <br>

                DODAJ AWATAR: <input type="file" name="obrazek"><br><br>
                <?php
                if (isset($_SESSION['e_awatar'])) {
                    echo '<div style="color:red">' . $_SESSION['e_awatar'] . '</div>';
                    unset($_SESSION['e_awatar']);
                }
                ?>

                <input type="submit" value="ZAREJESTRUJ"><br>
                <br>


            </form>
            <a href="index.php"><button class="guzik">ANULUJ REJESTRACJĘ</button></a>
        </div>
    </header>
</body>

</html>