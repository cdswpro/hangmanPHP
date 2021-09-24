  

<html>
    
  <?php 
    
   session_start();
    

    $wszystko_ok=true;
  
            
          //awatar
        
        
             if(empty($_FILES["obrazek"]["name"])==0) {
             $nazwa_  = $_SESSION['user'];
    
            $target_dir = "awatar/";
            
           
                
                
       
                $target_file = $target_dir . basename($_FILES["obrazek"]["name"]);
                 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            
             
            
            
               
               
           
            
      
            if( $imageFileType != "png" ) {
                
                $wszystko_ok = false;
                    $_SESSION['e_awatar'] = "DOZWOLONY TYLKO FORMAT PNG";
            }
                
         
           if($wszystko_ok==true){
                if (!(move_uploaded_file($_FILES["obrazek"]["tmp_name"], $target_dir.$nazwa_.".".$imageFileType))) {
                
                    $wszystko_ok = false;
                    $_SESSION['e_awatar'] = "NIEZNANY BŁĄD PRZY WYSYŁANIU PLIKU";
                }else{
                    header("Location: gra.php");
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
    <h1 class="info">ZMIEŃ SWÓJ AWATAR</h1>
    <br>
    <?php  echo "Zalogowany jako: ".$_SESSION['user'];
               echo"<br>";
    ?>
    <div class="dane">
        <span style="color:green">
        <?php 
            if(isset($_SESSION['wyslany'])){
                echo $_SESSION['wyslany'];
                unset($_SESSION['wyslany']);
            }
            ?>
        </span>
    <form method="post" enctype='multipart/form-data'>
        
       DODAJ AWATAR: <input required type="file" name="obrazek"  ><br><br>
            <?php
            if(isset($_SESSION['e_awatar']))
            {
                echo'<div style="color:red">'.$_SESSION['e_awatar'].'</div>';
                unset($_SESSION['e_awatar']);
            }
            ?>
            
  <input type="submit" name="send" value="ZMIEŃ"><br>
  <br>

      

        <span>
<?php
if(isset($_SESSION['e_awatar']))
{
    echo'<div style="color:red">'.$_SESSION['e_awatar'].'</div>';
    unset($_SESSION['e_awatar']);
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