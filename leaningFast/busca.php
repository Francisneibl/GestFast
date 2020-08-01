<?php header('Content-Type: text/html; iso-8859-1');?>
<?php
// Conecta no banco de dados
$hostname = "localhost:C:\backup\SOFTWORK.FDB";
$usuario = "SYSDBA"; // Usuário padrão do Firebird
$senha = "masterkey"; // Senha padrão do Firebird
 
$conexao = ibase_connect( $hostname, $usuario, $senha ) or die( 'Erro ao conectar: ' . ibase_errmsg() );//Conecta ao banco de dados
$nome = $_POST["palavra"];
//$nome = $_POST["descricao"];
$sql = "SELECT NOMPRO_, PRAVISTA_ FROM PRODUTOS WHERE NOMPRO_ LIKE '$nome%' AND ATIVO IS NULL ORDER BY NOMPRO_ ASC";
$result = ibase_query($sql);

?>
<link rel="stylesheet" href="styletabela.css">
<script type="text/javascript" src="tabela.js"></script>
<br><table id="minhaTabela">
        <thead>
            <tr>
                <th><b>Descrição</b></th>
                <th><b>Preço</b></th>
            </tr>
        </thead>


        <?php $c = 0 ?>
        
        <?php while($dado = mb_convert_encoding(ibase_fetch_assoc($result), 'UTF-8')) { ?>
            <?php 
                
                if($c%2 == 0){
                    $id = 'false';
                }else{
                    $id = 'true';
                }
            ?>
        <tbody>
            <tr class=<?php $preco = $dado['PRAVISTA_']; echo $id ?> onclick="abrirModal('modal-id',this)">
                <td><?php echo $dado['NOMPRO_']; ?></td>
                <td><?php echo 'R$ ',number_format($dado['PRAVISTA_'], 2, '.', ''); ?></td>
            </tr>
        </tbody>
        <?php $c++;} ?>
</table>