<?php
session_start();


if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
    header('Location: gra.php');
    exit();
    
}
     ?>

<!DOCTYPE HTML>
<!--za punkty zmiana wisielca
awatar uzytkownika jako wisielec

-->
<html lang="pl">
    
    <head>
           <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <meta charset="utf-8">
        <title>♣ERYK♣</title>

        <link rel="stylesheet" href="style.css" type="text/css">
        
<script type="text/javascript">
    
   


      
    
$(document).ready(function(){
    
setInterval(function() {
$("#time").load('data.php');
}, 100);
 
}); 

        </script>
       
    
    
    </head>
    
    <body>
       
        <header  class="pojemnik">
         
            <br>
            <br>
            <br>
            
            <div id="logowanko" class="dane">
                 <span id="time" ></span>
               <form action="zaloguj.php" method="post">
                
  <label for="login">LOGIN:</label><br>
  
  <input type="text" name="login" ><br>  
  <label for="pass">HASŁO:</label><br>
             
  <input type="password" name="pass"><br>
   
  <input id="zaloguj" type="submit" value='ZALOGUJ'><br>
               
                   <?php 
                    if(isset($_SESSION['blad'])){
                        echo $_SESSION['blad'];
                        unset($_SESSION['blad']);
                    }
                   ?>
    <br>
    <br>
  

</form>
                Nie masz konta? <a href="rejestr.php"><button class="guzik">ZAREJESTRUJ SIĘ</button></a>
                
                <br><br>
            </div>
            
           

        
       
    
        </header>
       
    </body>


</html>

