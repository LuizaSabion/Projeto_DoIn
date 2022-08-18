<?php

include ('conexao.php');

function enviarImagem($error, $size, $name, $tmp_name) {
    include ('conexao.php');

    if($error){
    die("falha ao enviar arquivo");
    }
    if($size > 2097152)
        die('arquivo muito grande!! Max: 2MB');
    
    $pasta = 'past_arquivos/';
    $nomeImagem = $name;
    $novoNomeImagem = uniqid();
    $extensao = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));
    
    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png')
        die("Tipo de arquivo não aceito");
    
    
    $path = $pasta . $novoNomeImagem. "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);

    if($deu_certo){
    $con->query("INSERT INTO Imagem (imagem_name, imagem_arq) VALUES('$nomeImagem','$path')") or die ($con->error);
     return true;
    }
     else {
        return false;
     }
}

if (isset($_FILES['imagens'])){
    $imagens = $_FILES['imagens'];
    $tudo_certo= true;
    foreach($imagens['name'] as $arq => $img) {
        $deu_certo = enviarImagem($imagens['error'][$arq], $imagens['size'][$arq], $imagens['name'][$arq],$imagens["tmp_name"][$arq]);
        if(!$deu_certo)
            $tudo_certo = false;
    }

    if($tudo_certo)
        echo "todos os aquivos foram enviados";
    
    else 
        echo "falha no envio dos arquivos";
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
        <input multiple="multiple" type="file" name="imagens[]">
        <input type="submit" value="Submit">
</form>
</body>
</html>