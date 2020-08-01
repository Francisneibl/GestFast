O<?php
// Conecta no banco de dados
$hostname = "localhost:C:\backup\SOFTWORK.FDB";
$usuario = "SYSDBA"; // Usuário padrão do Firebird
$senha = "masterkey"; // Senha padrão do Firebird
 
$conexao = ibase_connect( $hostname, $usuario, $senha ) or die( 'Erro ao conectar: ' . ibase_errmsg() );//Conecta ao banco de dados
$nome = $_GET["descricao"];
//$nome = $_POST["descricao"];
$sql = "SELECT NOMPRO_, PRAVISTA_ FROM PRODUTOS WHERE NOMPRO_ LIKE '%$nome%' AND ATIVO IS NULL";
$result = ibase_query($sql);

$json_array = array();

// Lê os dados da query e armazena em um array
while($linha = ibase_fetch_assoc($result)){

    $json_array[] = $linha;
}
$dados = 
// Retorna a string contendo a representação JSON
$json = json_encode(mb_convert_encoding($json_array,'UTF-8'));
// Informa se houve algum erro de conversao de json
$error  = json_last_error_msg();

echo $json_array[1];

/*
//print($error);
// abre o arquivo em modo escrita
$file = fopen("data.json","w");
// escreve o json no arquivo
fwrite($file, $json);
*/


?>