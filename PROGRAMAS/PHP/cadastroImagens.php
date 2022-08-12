<?php
include('conexao.php');

if (isset($_FILES['imagens'])){
    $arquivo = $_FILES['imagens'];
    $pasta = 'imagens/';

    if($arquivo['error']){
        die("falha ao enviar imagem");}

    $nomeImagem = $arquivo['name'];
    $extensao = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));
    
    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
        die("Tipo de arquivo não aceito");
    }

    $path = $pasta . $nomeImagem. "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    if($deu_certo){
    $con->query("INSERT INTO Imagem (imagem_name, imagem_arq) VALUES('$nomeImagem','$path')") or die ($con->error);
     //echo "<p>Arquivo enviado com sucesso! para acessa-lo, clique aqui:<a href = \"imagens/$nomeImagem.$extensao\">clique aqui</a></p>";
    }
     else
        echo "<p>Falha ao enviar arquivo</p>";
}
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
    <form method = "post" action ="" enctype="multipart/form-data"> 
        <label for="imagem">Imagem: </label> 
        <input multiple type="file" name="imagens" id="imagem">
        <input type="submit" value="Submit">
</form>
</body>
</html>