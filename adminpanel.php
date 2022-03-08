<?php
session_start();

if ($_SESSION['admin'] == 0) {
    header("Location: index.php");
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
    <h1 class="info">ZARZĄDZANIE HASŁAMI I KATEGORIAMI</h1>
    <br>

    <br>

    <div class="admindane">
        <div id="admincancel">
            <a href="gra.php"><button class="guzik">
                    WRÓĆ
                </button></a><br><span style="color:green"><?php
                                                            if (isset($_SESSION['x_pass'])) {
                                                                echo $_SESSION['x_pass'];
                                                                unset($_SESSION['x_pass']);
                                                            }
                                                            ?></span>
        </div>
        <br>
        <div id="kategorie">

            <i>KATEGORIE</i>
            <br>
            <a href='addkateg.php'><button class='guzik'>DODAJ</button></a>
            <br>
            <?php


            require_once "connect.php";

            $polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
            $polaczenie->query("SET NAMES 'utf8'");
            $sql = "SELECT ID,kategoria FROM kategorie";
            $kategorie = $polaczenie->query($sql);


            //  $ranking = $rank->fetch_assoc();

            //$ranklogin = $ranking['Login'];

            //$rankpkt = $ranking['punkty'];




            if ($kategorie->num_rows > 0) {



                echo "<table class='tabela'> <tr> <th>ID</th> <th>Kategoria</th> <th>Edytuj</th> <th>Usuń</th>";
                while ($kategg = $kategorie->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>";
                    echo $kategg["ID"] . ". ";
                    echo "</td>";
                    echo "<td>";
                    echo $kategg["kategoria"];
                    echo "</td>";

                    echo "<td>" . "<a href='Editkateg.php?id={$kategg["ID"]}'>" . "<button class='button button1' >" . "Edytuj" . "</button></a></td>";
                    echo "<td>" . "<a href='deletekat.php?id={$kategg["ID"]}'>" . "<button class='button button2' >" . "Usuń" . "</button></a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br>";
            }





            //mysqli_close($polaczenie);


            ?>






        </div><br>
        <div id="hasla">

            <i>HASŁA</i>
            <br>

            <a href='addhaslo.php'><button class='guzik'>DODAJ</button></a>

            <br>
            <?php



            require_once "connect.php";

            $polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
            $polaczenie->query("SET NAMES 'utf8'");

            $sql = "SELECT hasla.ID, hasla.haslo, kategorie.kategoria FROM `hasla` INNER JOIN kategorie ON hasla.kategoria=kategorie.ID";

            $haslo = $polaczenie->query($sql);

            //$polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);
            // $polaczenie->query("SET NAMES 'utf8'");

            //$haslo = $polaczenie->query("SELECT ID, haslo FROM hasla ORDER BY `ID`  ASC");


            //  $ranking = $rank->fetch_assoc();

            //$ranklogin = $ranking['Login'];

            //$rankpkt = $ranking['punkty'];




            if ($haslo->num_rows > 0) {

                echo "<table class='tabela'> <tr> <th>ID</th> <th>Hasło</th> <th>Kategoria</th> <th>Edytuj</th> <th>Usuń</th>";
                while ($pass = $haslo->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>";
                    echo $pass["ID"] . ". ";
                    echo "</td>";
                    echo "<td>";
                    echo $pass["haslo"];
                    echo "</td>";
                    echo "<td>";
                    echo $pass["kategoria"];
                    echo "</td>";

                    echo "<td>" . "<a href='Editpass.php?id={$pass["ID"]}'>" . "<button class='button button1' >" . "Edytuj" . "</button></a></td>";
                    echo "<td>" . "<a href='deletepass.php?id={$pass["ID"]}'>" . "<button class='button button2' >" . "Usuń" . "</button></a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br>";
            }




            mysqli_close($polaczenie);



            ?>

        </div>
    </div>





</body>



</html>