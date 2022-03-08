<?php
session_start();
if ($_SESSION['admin'] == 0) {
    header("Location: index.php");
}




if (isset($_POST['kateg'])) {



    require_once "connect.php";

    $polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
    $polaczenie->query("SET NAMES 'utf8'");

    $kateg = $_POST['kateg'];

    $zbazy = "SELECT kategoria FROM kategorie WHERE kategoria ='$kateg'";
    $is = $polaczenie->query($zbazy);
    $tab = $is->fetch_assoc();




    if (strtoupper($tab['kategoria']) != strtoupper($kateg)) {
        $sql = "INSERT INTO kategorie (kategoria) VALUES ('$kateg')";
        $polaczenie->query($sql);
        $polaczenie->close();
        $_SESSION['e_adda'] = "KATEGORIA ZOSTAŁA DODANA";
    } else {
        $_SESSION['e_add'] = "ISTNIEJE JUŻ TAKA KATEGORIA";
    }
}













?>

<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>♣ERYK♣</title>

</head>

<body>
    <section>
        <h1>DODAJ NOWĄ KATEGORIĘ</h1>

    </section>
    <article class="dane">
        <div class="trescPost">

            <form method="post">
                NAZWA KATEGORII<br>
                <input required type="text" name="kateg">
                <br>
                <span style="color:red">
                    <?php
                    if (isset($_SESSION['e_add'])) {
                        echo $_SESSION['e_add'];
                        unset($_SESSION['e_add']);
                    }

                    ?>

                </span>
                <span style="color:green">
                    <?php
                    if (isset($_SESSION['e_adda'])) {
                        echo $_SESSION['e_adda'];
                        unset($_SESSION['e_adda']);
                    }

                    ?>

                </span>
                <br>
                <input type="submit" value="DODAJ">
            </form>

        </div>
        <br>
        <a href="adminpanel.php"><button class="button button1">ANULUJ</button></a>


    </article>


</body>

</html>