<?php


session_start();

if(!isset($_SESSION['deleted']))
{
    header('Location: index.php');
        
    exit();
    
    
    
}else{
    unset($_SESSION['deleted']);
}

session_unset();




     ?>

<html lang="pl">
    
    <head>
           <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
        <meta charset="utf-8">
        <title>♣ERYK♣</title>

        <link rel="stylesheet" href="style.css" type="text/css">
    
    
    </head>
    
    <body>
        <div class="dane" class="pojemnik">
        <?php
    echo  '<span style="color:#d60000">Konto zostało usunięte ☺</span>';
        
     ?>
        <br><br><br>
      
        
        <a  href="index.php"><button class="guzik">STRONA GŁÓWNA</button></a>
            </div>
    </body>


</html>