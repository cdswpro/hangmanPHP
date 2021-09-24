<?php
session_start();
if($_SESSION['admin']==0)
{
    header("Location: index.php");
}

       


            if(isset($_POST['haslo'])){
                
            
                
                require_once "connect.php";

            $polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);
            $polaczenie->query("SET NAMES 'utf8'");
            
            
                
            $zbazy = "SELECT ID FROM kategorie WHERE kategoria = '{$_POST['kategoria']}'";
            $dbaza = $polaczenie->query($zbazy);
            $dkateg = $dbaza->fetch_assoc();
                
            $idkat = $dkateg['ID'];    
            echo $dkateg['ID'];
            
            $zbazy2 = "SELECT haslo FROM hasla WHERE haslo ='{$_POST['haslo']}'";
            $is = $polaczenie->query($zbazy2);
            $tab = $is->fetch_assoc();
                
            $katid = $_POST['kategoria'];
            $haslo = $_POST['haslo'];
            
            if(strtoupper($tab['haslo']) != strtoupper($_POST['haslo'])){
            $sql = "INSERT INTO hasla (ID, haslo, kategoria) VALUES ('', '$haslo', '$katid')";
                 $polaczenie->query($sql);
                 $polaczenie->close();
                $_SESSION['e_adda'] = "NOWE HASŁO ZOSTAŁO DODANE"; 
                
            }else{
              $_SESSION['e_add'] = "ISTNIEJE JUŻ TAKIE HASŁO";  
            }
                
                
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
        <h1>DODAJ NOWE HASŁO</h1>
        
        </section>
    <article class="dane">
        <div class="trescPost">
            
            <form method="post">
            NOWE HASŁO<br>
            <input required type="text" name="haslo">
                <br>
                <span style="color:red">
                <?php
                    if(isset($_SESSION['e_add'])){
                        echo $_SESSION['e_add'];
                        unset($_SESSION['e_add']);
                    }
                    
                    ?>
                
                </span>
                <span style="color:green">
                <?php
                    if(isset($_SESSION['e_adda'])){
                        echo $_SESSION['e_adda'];
                        unset($_SESSION['e_adda']);
                    }
                    
                    ?>
                
                </span>
                <br>
                <?php
                  require_once "connect.php";

            $polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);
            $polaczenie->query("SET NAMES 'utf8'");
                
                
                  $sql2 = "SELECT * FROM kategorie";
           $result2 = $polaczenie->query($sql2);
        
            
                // output data of each row
                echo "<select class='guzik' name='kategoria'>";
                while($row2 = $result2->fetch_assoc()) 
                {
                    if ($row2["ID"]==$IDkat){
                        echo "<option selected value='{$row2["ID"]}'>".$row2["kategoria"]."</option>";
                    }
                    else {echo "<option value='{$row2["ID"]}'>".$row2["kategoria"]."</option>";
                }
                }
                echo "</select>";
            
                ?>
                <br>
                <input type="submit" value="DODAJ">
            </form>
       
    </div>
    <br>
        <a href="adminpanel.php"><button class="button button1">ANULUJ</button></a>
   
        
        </article>
    
    
    </body>

</html>
