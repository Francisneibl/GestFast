<?php
// Conecta no banco de dados
$hostname = "localhost:C:\backup\SOFTWORK.FDB";
$usuario = "SYSDBA"; // Usuário padrão do Firebird
$senha = "masterkey"; // Senha padrão do Firebird
 
$conexao = ibase_connect( $hostname, $usuario, $senha ) or die( 'Erro ao conectar: ' . ibase_errmsg() );//Conecta ao banco de dados
$nome = $_GET["descricao"];

$sql = "SELECT NOMPRO_, PRAVISTA_ FROM PRODUTOS WHERE NOMPRO_ LIKE '$nome%' AND ATIVO IS NULL";
$result = ibase_query($sql);


function consultar($descricao){
    $sql = "SELECT NOMPRO_, PRAVISTA_ FROM PRODUTOS WHERE NOMPRO_ LIKE '$descricao%' AND ATIVO IS NULL";
    $result = ibase_query($sql); 

    while($dado = mb_convert_encoding(ibase_fetch_assoc($result), 'UTF-8')) {
        echo $dado['NOMPRO_'];
        echo 'R$ ',number_format($dado['PRAVISTA_'], 2, '.', '');
    }
    //$json_array = array();
    //$json = json_encode(mb_convert_encoding($json_array,'UTF-8'));
    return true;
}

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="styletabela.css">
    <script type="text/javascript" src="tabela.js"></script>
</head>

<body>
    <form>
        <p>
            Descrição <input type="text" name="descricao">
            <input type="text">
        </p>
    </form>


    <div style="text-align: center">Orçamento</div>

    <table id="tabelaResultado">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
        </thead>
    </table>
    <br></br>
    <table id="minhaTabela">
        <thead>
            <tr>
                <th><b>Descrição</b></th>
                <th><b>Preço</b></th>
            </tr>
        </thead>

        <?php $c = 0 ?>
        
        <?php while($dado = mb_convert_encoding(ibase_fetch_assoc($result), 'UTF-8')) { ?>
            <?php 
                $c++;
                if($c%2 == 0){
                    $id = 'false';
                }else{
                    $id = 'true';
                }
            ?>
        <tbody>
            <tr class=<?php $preco = $dado['PRAVISTA_']; echo $id ?> onclick="addProduto(this,<?php echo $preco ?>);">
                <td><?php echo $dado['NOMPRO_']; ?></td>
                <td><?php echo 'R$ ',number_format($dado['PRAVISTA_'], 2, '.', ''); ?></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
    
</body>

</html>