<?php
session_start();
$arquivos_permitidos = ['jpg','jpeg','png'];

$imagens = $_FILES['imagens'];

$nomes = $imagens['name'];

for($i = 0; $i < count($nomes); $i++){
    $extensao = explode('.', $nomes[$i]);
    $extensao = end($extensao);

    if(in_array($extensao, $arquivos_permitidos)){
        $query = $con->query("INSERT INTO Imagem values(default, '$nomes[$i]')");

        if(mysqli_affected_rows($con)>0) {
            $_SESSION['sucesso'] = 'arquivo(s) enviado(s) com sucesso!';
            $destino= header("Location:../");
        }
        else{
            $_SESSION['erro'] = 'existem arquivos que não foram enviados, por não obedecerem as normas de upload do sistema!';
            $destino = header("Location:../");
            }
    }
}
?>