 <?php
  session_start();


  $addpkt = $_SESSION['punkty'] - 1;
  $kto = $_SESSION['user'];




  require_once "connect.php";

  $polaczenie1 = new mysqli($host, $db_user, $db_pass, $db_name);
  $polaczenie1->query("UPDATE loginy SET Punkty= '$addpkt' WHERE Login = '$kto'");


  $nowepkt = $polaczenie1->query("SELECT  Punkty FROM loginy WHERE Login = '$kto'");

  unset($_SESSION['punkty']);

  $wiersz = $nowepkt->fetch_assoc();
  $_SESSION['punkty'] = $wiersz['Punkty'];


  $polaczenie1->close();





  header("Location: logout.php");

  ?>