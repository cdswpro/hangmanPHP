<?php

session_start();
require_once"connect.php";

$plik = fopen("mail.txt", "r");
//$mails = fread($plik,filesize("mail.txt"));

$polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);


while(! feof($plik))
  {
  $mail = fgets($plik);

  $polaczenie->query("INSERT INTO mail VALUES (NULL,'$mail')"); 
    
  echo $mail,"<br>";
    
  }

fclose($plik);


?>