<?php
function insert (string $entidade, array $dados) : string
{
    //a $entidade é a tabela que essas informações serão inseriras
    //os $dados são um array que comtem as
    $instrucao = "INSERT INTO {$entidade}";
    //para inserir dados no banco de dados é necessario o o comando e o 
    //implode = Retorna uma string contendo os elementos do array, na mesma ordem com uma ligação entre cada elemento.
    //www.php.net/manual/pt_BR/function.implode.php

    $campos = implode(', ', array_keys($dados));
    //array_keys: Retorna um array de todas as chaves em um array. ex: www.php.net/manual/pt_BR/function.array-keys.php

    $valores = implode(', ', array_values($dados));
    //array_values: Retorna todos os valores do array num array indexado ='indice' numericamente. 
    //www.php.net/manual/pt_BR/function.array-values.php

    $instrucao .= "({$campos})";
    //a variavel $campos contem todas os campos da tabela do banco de dados que serão preenchidos;
    //Tabela: usuario (dataNasc, nome, email, senha, cpf, telefone);
    
    //.= Concatenação e Atribuição:'Primeiro concatene $a e $b, depois atribua a string concatenada a $a, por exemplo, $a = $a . $b'
    //www.javatpoint.com/php-operators#:~:text=PHP%20Operator%20is%20a%20symbol,and%2010%2C20%20are%20operands
    $instrucao .= "VALUES ({$valores})";
    //para inserir dados no banco de dados é necessario colocar os valores /a variavel: $valores/ contem todos os valores que serão inseridos;
    //VALUES ('".$dataNasc."', '".$nome."','".$email."','".$senha."','".$cpf."','".$telefone."')";
    return $instrucao;
}

function update(string $entidade, array $dados, array $criterio = []): string
{
    $instrucao = "UPDATE {$entidade}";
    //atalizar dados da tabela, contida na variavel $entidade;
    foreach($dados as $campo => $dado){
        $set[] = "{$campo} = {$dado}";
    }

    $instrucao .= ' SET ' . implode(', ', $set);

    if(!empty($criterio)) {
        $instrucao .= ' WHERE ';

        foreach($criterio as $expressao) {
            $instrucao .= ' '. implode(' ', $expressao);
        }
    }
    return $instrucao;
}

function delete(string $entidade, array $criterio = []) : string
{
    $instrucao = "DELETE {$entidade}";

    if(!empty($criterio)) {
        $instrucao .= ' WHERE ';

        foreach($criterio as $expressao) {
            $instrucao .= ' ' . implode(' ', $expressao);
        }
    }
    return $instrucao;
}

function select(string $entidade, array $campos, array $criterio = [], string $ordem = null) : string
{
    $instrucao = "SELECT " . implode(', ', $campos);
    $instrucao .= " FROM {$entidade}";

    if(!empty($criterio)) {
        $instrucao .= ' WHERE ';

        foreach($criterio as $expressao){
            $instrucao .= ' ' . implode(' ', $expressao);
        }
    }
    if(!empty($ordem)) {
    $instrucao .= " ORDER BY $ordem ";
}
    return $instrucao;
} 

?>