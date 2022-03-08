  <html>

  <?php

    session_start();
    if (isset($_POST['pass1'])) {
        require_once "connect.php";

        $polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);
        if ($polaczenie->connect_errno != 0) {
            echo '<span style="color:red">Błąd połączenia</span>';
        } else {

            $login = $_SESSION['user'];



            $passdb = $polaczenie->query("SELECT Haslo FROM loginy WHERE Login='$login'");

            $haslo1 = $passdb->fetch_assoc();




            $hasloo = $_POST["pass1"];


            if (password_verify($hasloo, $haslo1['Haslo'])) {

                $delete = $polaczenie->query("DELETE FROM loginy WHERE loginy.Login = '$login';");
                $_SESSION['deleted'] = true;
                header("Location: deleted.php");
            } else {
                $_SESSION['zlehaslo'] = "PODANO NIEPOPRAWNE HASŁO<br>";
            }
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
      <h1 id="info">PODAJ HASŁO ABY USUNĄĆ KONTO</h1>
      <br>
      <?php echo "Zalogowany jako: " . $_SESSION['user'];
        echo "<br>";
        ?>
      <div class="dane">
          <form method="post">
              TWOJE HASŁO<br>
              <input type="password" name="pass1"><br>
              <span style="color:red">
                  <?php
                    if (isset($_SESSION['zlehaslo'])) {
                        echo $_SESSION['zlehaslo'];
                        unset($_SESSION['zlehaslo']);
                    }
                    ?>

              </span>
              <input type="submit" class="guzik" value="USUŃ KONTO">


          </form>
          <a href="gra.php"><button class="guzik">
                  ANULUJ
              </button></a>
      </div>

  </body>



  </html>