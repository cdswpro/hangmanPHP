<?php
session_start();

if((!isset($_POST['login'])) || (!isset($_POST['pass'])))
{
 header("Location: index.php");
    exit();
}

require_once "connect.php";

$polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);



$login = $_POST['login'];
$pass = $_POST['pass'];

$login = htmlentities($login, ENT_QUOTES, "UTF-8");






if($wynik = $polaczenie->query(sprintf("SELECT * FROM loginy WHERE Login='%s'",
mysqli_real_escape_string($polaczenie,$login))))
{
   $ile = $wynik->num_rows;
    if($ile>0){
        $wiersz = $wynik->fetch_assoc();
        
        if(password_verify($pass,$wiersz['Haslo']))
        {
                $_SESSION['zalogowany'] = true;




                $_SESSION['admin'] = $wiersz['Admin'];
                $_SESSION['id'] = $wiersz['ID'];
                $_SESSION['user'] = $wiersz['Login'];
                $_SESSION['pass'] = $wiersz['Haslo'];
                $_SESSION['punkty'] = $wiersz['Punkty'];

                unset($_SESSION['blad']);
                $wynik->close();

                header('Location: gra.php');
        }else
        {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
        
            header("Location: index.php");
            
        }
        
    }else{
        
        $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
        
        header("Location: index.php");
        
    }
    
}else
{
    echo "ERROR SQL";
}

$polaczenie->close();
?>