<?php

//awatar wstawiać , nowe haslo dodaje admin


//panel admina dodanie kategorii i haseł


 include 'ChromePhp.php';
    ChromePhp::log('Hello console!');
    ChromePhp::log($_SERVER);
    ChromePhp::warn('something went wrong!');

session_start();

if (!isset($_SESSION['zalogowany'])){
    header('Location: index.php');
    exit();
}
     ?>

<!DOCTYPE HTML>
<!--za punkty zmiana wisielca
awatar uzytkownika jako wisielec

-->

<html lang="pl">
    <head>
        <script src="https://use.fontawesome.com/9df2ea7df7.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>♣ERYK♣</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="style.css" type="text/css">
        
            <script>  
                    
$(document).ready(function(){
    
setInterval(function() {
$("#time").load('data.php');
}, 100);
 
}); 
                
   
<?php

require_once "connect.php";
//$kateg = rand(1,5);
//$idhasla = rand(1,5);
$polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);
$polaczenie->query("SET NAMES 'utf8'");

$kodsql = "SELECT hasla.haslo, kategorie.kategoria FROM hasla INNER JOIN kategorie ON hasla.kategoria = kategorie.ID ORDER BY RAND() LIMIT 1";

$kategoria = $polaczenie->query($kodsql);

/*
switch ($kateg) {
                  case 1:
                    $haslo = $polaczenie->query("SELECT haslo FROM hasla WHERE kategoria='$kateg' AND ID='$idhasla' ");
                    break;
                  case 2:
                    $idhaslo = $idhasla + 5;
                    $haslo = $polaczenie->query("SELECT haslo FROM hasla WHERE kategoria='$kateg' AND ID='$idhaslo' ");
                    break;
                  case 3:
                    $idhaslo = $idhasla + 10;
                    $haslo = $polaczenie->query("SELECT haslo FROM hasla WHERE kategoria='$kateg' AND ID='$idhaslo' ");
                    break;
                  case 4:
                    $idhaslo = $idhasla + 15;
                    $haslo = $polaczenie->query("SELECT haslo FROM hasla WHERE kategoria='$kateg' AND ID='$idhaslo' ");
                    break;
                  case 5:
                    $idhaslo = $idhasla + 20;
                    $haslo = $polaczenie->query("SELECT haslo FROM hasla WHERE kategoria='$kateg' AND ID='$idhaslo' ");

                }




$kat1 = $kategoria->fetch_assoc();
$haslo1 = $haslo->fetch_assoc();
*/
 
$baza = $kategoria->fetch_assoc();               

$stringkateg = $baza['kategoria'];
$wypiszhaslo = $baza['haslo'];

echo 'var kateg ="'.$stringkateg.'";';
echo 'var haslo ="'.$wypiszhaslo.'";';









$polaczenie->close();





?>



                                haslo = haslo.toLocaleUpperCase();
                                kateg = kateg.toLocaleUpperCase();

                                var dlugosc = haslo.length;
                                var ile_skuch = 0;
                                var haslo1 = "";

                                for(var i=0 ; i<dlugosc ; i++){

                                    if(haslo.charAt(i)==" ")haslo1=haslo1 + " ";
                                    else haslo1= haslo1 + "-";    

                                }



                                function wypisz_haslo(){


                               document.getElementById("plansza").innerHTML = haslo1;
                               document.getElementById("kat").innerHTML = "Kategoria: "+kateg;


                                }



                                window.onload = start;



                                var litery = new Array(35);

                                litery[0] = "A";
                                litery[1] = "Ą";
                                litery[2] = "B";
                                litery[3] = "C";
                                litery[4] = "Ć";
                                litery[5] = "D";
                                litery[6] = "E";
                                litery[7] = "Ę";
                                litery[8] = "F";
                                litery[9] = "G";
                                litery[10] = "H";
                                litery[11] = "I";
                                litery[12] = "J";
                                litery[13] = "K";
                                litery[14] = "L";
                                litery[15] = "Ł";
                                litery[16] = "M";
                                litery[17] = "N";
                                litery[18] = "Ń";
                                litery[19] = "O";
                                litery[20] = "Ó";
                                litery[21] = "P";
                                litery[22] = "Q";
                                litery[23] = "R";
                                litery[24] = "S";
                                litery[25] = "Ś";
                                litery[26] = "T";
                                litery[27] = "U";
                                litery[28] = "V";
                                litery[29] = "W";
                                litery[30] = "X";
                                litery[31] = "Y";
                                litery[32] = "Z";
                                litery[33] = "Ź";
                                litery[34] = "Ż";


                                function start()
                                {
                                   var tresc_diva ="";

                                 for(i=0 ; i<=34 ; i++){

                                     var element = "lit"+ i;

                                     tresc_diva = tresc_diva + '<div class="litera" onclick="sprawdz('+i+')" id="'+element+'">'+litery[i]+'</div>';

                                     if((i+1) % 7 == 0) tresc_diva = tresc_diva + '<div style = "clear:both;"></div>';
                                 }    

                                document.getElementById("alfabet").innerHTML = tresc_diva;



                                    wypisz_haslo();
                                }


                                String.prototype.ustawZnak = function(miejsce , znak){

                                    if(miejsce > this.length - 1)return this.toString();
                                    else return this.substr(0,miejsce) + znak + this.substr(miejsce+1);

                                }




                                function sprawdz(nr){

                                    var trafoina = false;


                                    for(i=0 ; i<dlugosc ; i++){

                                        if(haslo.charAt(i)==litery[nr]){
                                          haslo1 = haslo1.ustawZnak(i,litery[nr]);  
                                          trafoina = true;  
                                        }

                                    }

                                    if(trafoina==true){

                                    var element = "lit"+ nr;    

                                        document.getElementById(element).style.background="#003300";
                                        document.getElementById(element).style.color="#00C000";
                                        document.getElementById(element).style.border = "3px solid #00C000";
                                        document.getElementById(element).style.cursor = "default";

                                       wypisz_haslo(); 
                                    }
                                    else
                                    {

                                      var element = "lit"+ nr;    

                                        document.getElementById(element).style.background="#330000";
                                        document.getElementById(element).style.color="#C00000";
                                        document.getElementById(element).style.border = "3px solid #C00000";
                                        document.getElementById(element).style.cursor = "default";  
                                        document.getElementById(element).setAttribute("onclick",";");



                                        ile_skuch++;
                                        var obraz = "img/s"+ile_skuch+".jpg";
                                        document.getElementById("szubienica").innerHTML = '<img src="'+obraz+'"alt="">';
                                    }
                                    
                                    

                                    //wygrana
                                    if(haslo == haslo1){
                                                                              
                                        
                                        $(document).ready(function(){
                                             $("#alfabet").html("Podano dobre hasło:</br> "+haslo+'<br/><br/><a class="reset"  href="addpkt.php">Jeszcze raz???</a>') ; 
                                        });
                                       
                                        $(document).ready(function(){
                                             $("#logout").html('<a class="linki" href="wadd.php">Wyloguj</a>') ; 
                                        });
                                      
                                        
                                  //  document.getElementById("alfabet").innerHTML = "Podano dobre hasło:</br> "+haslo+'<br/><br/><a class="reset"  href="addpkt.php">Jeszcze raz???</a>';
                                        
                                        
                                  //  document.getElementsById("logout").innerHTML = '<a class="linki" href="wadd.php">Wyloguj</a>';   
                                     
                                        
                                    }
                                    
                                    
                                    //przegrana
                                    if(ile_skuch>=7){
                                        
                                         $(document).ready(function(){
                                             $("#alfabet").html("Przegrana!!! hasło:</br> "+haslo+'<br/><br/><a class="reset" href="nadd.php">Jeszcze raz???</a>') ; 
                                        });
                                       
                                        $(document).ready(function(){
                                             $("#logout").html('<a class="linki" href="wnadd.php">Wyloguj</a>') ; 
                                        });
                                        
                                        
                                        
                                      //  document.getElementsById("logout").innerHTML = '<a class="linki" href="wnadd.php">Wyloguj</a>';
                                        
                                  //  document.getElementById("alfabet").innerHTML = "Przegrana!!! hasło:</br> "+haslo+'<br/><br/><a class="reset" href="nadd.php">Jeszcze raz???</a>'; 
                                        
                                        

                                                }
                                }
                
                
$(document).ready(function(){  //pokaż ukrtj ranking
        $("#show-rank").click(function(){
            $(".ranking").toggleClass("showed");
        });
        
        $("#hide-rank").click(function(){
           $(".ranking").toggleClass("showed");
        });
    
     $("#show-opt").click(function(){ //pokaż ukryj opcje
            $(".options").toggleClass("showed-opt");
        });
        
        $("#hide-opt").click(function(){
           $(".options").toggleClass("showed-opt");
        });
   
        });
        

        </script>
    
    
    </head>
    
    <body>
        <div id="show-rank">
            
            <img id="showimg" src="svg/list-ol-solid.svg">
            
           
            
        </div>
         
        <div class="ranking">RANKING<br>
            <div id="hide-rank">
                <img id="hideimg" src="svg/times-circle-regular.svg">
            </div>
       
<?php

require_once "connect.php";

$polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);

$ranking = $polaczenie->query("SELECT Login, punkty FROM loginy ORDER BY `Punkty`  DESC");


//  $ranking = $rank->fetch_assoc();

//$ranklogin = $ranking['Login'];

//$rankpkt = $ranking['punkty'];




if($ranking->num_rows > 0){
    $num = 1;
     while($gracz = $ranking->fetch_assoc()){
         echo $num.".";
        echo $gracz["Login"]." ";
        echo "PKT: ";    
        echo $gracz["punkty"];
         echo "<br>";
         $num++;
     }
}




mysqli_close($polaczenie);

?>
        
        </div>
        <div id="show-opt">
            
            <img id="showopt" src="svg/user-cog-solid.svg">
            
           
            
        </div>
         
        <div class="options">USTAWIENIA<br>
            <div id="hide-opt">
                <img id="hideopt" src="svg/times-circle-regular.svg">
            </div><br>
            
            <label>
            
            <img class="item" name="del" src="svg/user-times-solid.svg">
            
            <a href="deleteuser.php"><button class="guzik">
                USUŃ KONTO
                </button></a></label><br><br>
           <label>
            
            <img class="item" name="del" src="svg/user-edit-solid.svg">
            
            <a href="changepass.php"><button class="guzik">
                ZMIEŃ HASŁO
                </button></a></label>
            
            <br><br>
           <label>
            
            <img class="item" name="del" src="svg/images-solid.svg">
            
            <a href="changeimg.php"><button class="guzik">
                ZMIEŃ AWATAR
                </button></a></label>
            
            
            <br><br>
           <label>
            
            <img class="item" name="del" src="svg/user-lock-solid.svg">
            
            <a href="changepass.php"><a  href="logout.php"><button class="guzik">
                WYLOGUJ
                </button></a></a></label><br><br>
            <?php
            if($_SESSION['admin']==1){
           echo '<label>';
            
           echo '<img class="item" name="del" src="svg/tools-solid.svg">';
            
           echo '<a href="changepass.php"><a  href="adminpanel.php"><button class="guzik">';
           echo  'ZARZĄDZANIE GRĄ';
               echo '</button></a></a></label>';
            }
            ?>
            </div>
        
        
        <div class="pojemnik" class="w3-row-padding">
           <header class="dane" class="w3-third">
               
               <img id="awatar" src="awatar/<?php echo "{$_SESSION['user']}";?>.png">   
<?php
if($_SESSION['admin']==1)
{
echo "<span style='color:yellow'>Zalogowany jako: <img name='crown'  src='svg/crown-solid.svg'>".$_SESSION['user']."</span>";
echo"<br>";
echo "MOJE PUNKTY: ".$_SESSION['punkty']."";
echo"<br>";   
}else
{
echo "Zalogowany jako: ".$_SESSION['user'];
    
echo"<br>";
echo "MOJE PUNKTY: ".$_SESSION['punkty']."";
echo"<br>";
}


?>
          
            
            </header>
            
            <br>
       <center> ↓↓↓ Klikaj literki aby odgadnąć hasło ↓↓↓</center>
            <div id="kat" class="w3-third">
            
            </div>
            
        <section id="plansza" class="w3-third"></section>
        
        
        <article id="szubienica" class="w3-third">
        <img src="img/s0.jpg">
            </article>
            
        <aside id="alfabet" class="w3-third"></aside>
        <footer style="clear: both;" id="stopka" class="w3-third">
        
            <span id="time"></span>
                                                
           ☺Eryk☺
            </footer>
        
        </div>
    
    
    </body>


</html>

