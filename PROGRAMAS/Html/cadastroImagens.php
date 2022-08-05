<?php
session_start();
?>
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"/> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title> 
</head> 
<body> 
    <form method = "post" action ="PHP/imagem.php" enctype="multipart/form-data"> 

        <label for="imagem">Imagem: </label> 
        <input type="file" name="imagens[]" multiple="multiple">
        <input type="submit" value="Submit">
    </form>
    <P>
        <?php
            if(isset($_SESSION['erro'])){
                echo $_SESSION ['erro'];
                session_unset();
            elseif(isset($_SESSION['sucesso'])){
                echo $_SESSION['sucesso'];
                session_unset();
            }
        }
        ?>
    </P>
</body>
</html>