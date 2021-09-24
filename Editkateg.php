<?php
session_start();
if($_SESSION['admin']==0)
{
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
        <h1>EDYCJA KATEGORII</h1>
        
        </section>
    <article class="dane">
        <div class="trescPost">
        <?php
          require_once "connect.php";

            $polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);
            $polaczenie->query("SET NAMES 'utf8'");
            
            $idpass = $_GET['id']; 
          
              $_SESSION['idpass'] = $idpass;
           
            
          
          echo  "<form action='editedkateg.php' method='post'>";
          
    
     echo       "<br><br>Kategoria:<br><br>";

         
           $sql2 = "SELECT * FROM kategorie WHERE ID='$idpass'";
           $result2 = $polaczenie->query($sql2);
        
            
                // output data of each row
                
                while($row2 = $result2->fetch_assoc()) 
                {
                    if ($row2["ID"]==$idpass){
                        echo "<input type='text' name='haslo' value='{$row2['kategoria']}'>";
                    }
                
                }
                
          
            
            

           
           
            
           echo "<br><br><br><input type='submit' value='Zapisz'>";
        echo "</form>";
            $polaczenie->close();
                 ?>
    </div>
    
        <a href="adminpanel.php"><button class="button">ANULUJ</button></a>
   
        
        </article>
    
    
    </body>

</html>
