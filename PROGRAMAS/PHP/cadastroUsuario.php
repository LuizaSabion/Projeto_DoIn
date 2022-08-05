<?php
include('conexao.php');
$dataNasc = $_POST['dataNasc'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];

echo "<p>Nome do usuario: " . $nome_usuario . "<br>";
echo "E-mail: " . $email_usuario . "<br>";
echo 'Telefone: ' . $fone_usuario . '</p>';

$sql =  "insert into usuario (dataNasc, nome, email, senha, cpf, telefone)
        VALUES ('".$dataNasc."', '".$nome."','".$email."','".$senha."','".$cpf."','".$telefone."')";

$result = mysqli_query($con, $sql);
if($result)
echo "Dados inseridos com sucesso";

else 
echo "Erro ao inserir no banco de dados".mysqli_error($con);

?>
<br>