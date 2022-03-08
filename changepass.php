  <html>

  <?php

    session_start();
    if (isset($_POST['passold'])) {
        $ok = true;

        require_once "connect.php";

        $polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);


        if ($polaczenie->connect_errno != 0) {
            echo '<span style="color:red">Błąd połączenia</span>';
        } else {

            $login = $_SESSION['user'];
            $hasloo = $_POST["passold"];
            $pass1 = $_POST['passnew'];
            $pass2 = $_POST['passnew2'];
            $user = $_SESSION['user'];

            $passdb = $polaczenie->query("SELECT Haslo FROM loginy WHERE Login='$login'");

            $haslo1 = $passdb->fetch_assoc();

            //sprawdz stare haslo



            if (!(password_verify($hasloo, $haslo1['Haslo']))) {
                $ok = false;
                $_SESSION['e_pass'] = "PODANO NIEPOPRAWNE HASŁO<br>";
            }



            if ($pass1 == $hasloo) {

                $ok = false;
                $_SESSION['e_pass'] = "NOWE HASŁO NIE MOŻE BYĆ TAKIE SAMO JAK STARE";
            }


            if ($pass1 != $pass2) {

                $ok = false;
                $_SESSION['e_pass'] = "PODANE HASŁA NIE SĄ IDENTYCZNE";
            }

            if ($hasloo == "" || $pass1 == "" || $pass2 == "") {
                $ok = false;
                $_SESSION['e_pass'] = "POLE JEST PUSTE";
            }
        }
        if ((strlen($pass1) < 8) || (strlen($pass1) > 20)) {
            $ok = false;
            $_SESSION['e_pass'] = "Hasło musi posiadać od 8 do 20 znaków.";
        }

        if ($ok == true) {


            $pass_hash1 = password_hash($pass1, PASSWORD_DEFAULT);
            $sql = "UPDATE loginy SET Haslo ='$pass_hash1' WHERE Login ='$user'";
            $polaczenie->query($sql);
            $polaczenie->close();
            header("Location: gra.php");
        }
    }


    ?>


  <head>
      <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
      <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" href="style.css" type="text/css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>♣ERYK♣</title>



  </head>

  <body>
      <h1 id="info">ZMIEŃ SWOJE HASŁO</h1>
      <br>
      <?php echo "Zalogowany jako: " . $_SESSION['user'];
        echo "<br>";
        ?>
      <div class="dane">
          <form method="post">
              TWOJE HASŁO
              <input type="password" name="passold"><br>
              <span style="color:red">

              </span>
              <br>
              NOWE HASŁO:
              <input type="password" name="passnew">

              <br>
              <br>

              POWTÓRZ HASŁO:
              <input type="password" name="passnew2">
              <br>



              <input type="submit" class="guzik" value="ZMIEŃ HASŁO">
              <br>
              <span>
                  <?php
                    if (isset($_SESSION['e_pass'])) {
                        echo '<div style="color:red">' . $_SESSION['e_pass'] . '</div>';
                        unset($_SESSION['e_pass']);
                    }

                    ?>
              </span>

          </form>
          <a href="gra.php"><button class="guzik">
                  ANULUJ
              </button></a>
      </div>

  </body>



  </html>