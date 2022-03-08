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
    <section class="info">
        <h1>EDYCJA HASŁA</h1>

    </section>
    <article class="dane">
        <div class="trescPost">
            <?php
            require_once "connect.php";

            $polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
            $polaczenie->query("SET NAMES 'utf8'");

            $idpass = $_GET['id'];
            $sql = "SELECT ID, haslo, kategoria FROM hasla WHERE ID='$idpass'";

            $result = $polaczenie->query($sql);


            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $IDpass = $row["ID"];
                $haslo = $row["haslo"];
                $IDkat = $row["kategoria"];
            }
            $_SESSION['idpass'] = $IDpass;



            echo  "<form action='editedpass.php' method='post'>";
            echo "Hasło:<br>";
            echo  "<input required type='text' name='haslo' value='$haslo'>";
            echo       "<br><br>Kategoria:<br><br>";


            $sql2 = "SELECT * FROM kategorie";
            $result2 = $polaczenie->query($sql2);


            // output data of each row
            echo "<select class='guzik' name='kategoria'>";
            while ($row2 = $result2->fetch_assoc()) {
                if ($row2["ID"] == $IDkat) {
                    echo "<option selected value='{$row2["ID"]}'>" . $row2["kategoria"] . "</option>";
                } else {
                    echo "<option value='{$row2["ID"]}'>" . $row2["kategoria"] . "</option>";
                }
            }
            echo "</select>";






            echo "<br><br><br><input type='submit' value='Zapisz'>";
            echo "</form>";
            $polaczenie->close();
            ?>
        </div>

        <a href="adminpanel.php"><button class="button">ANULUJ</button></a>


    </article>


</body>

</html>