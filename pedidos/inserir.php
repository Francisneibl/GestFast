<?php
    include '../conexao.php';

    $ID = $_POST['id'];
    $saldo = $_POST['saldo'];

    $fdb_db = connect_fdb();
    $sql = "SELECT ID_CODIGO, NOMPRO_, PRCUSTO_, NOMGRU_ FROM PRODUTOS WHERE ID_CODIGO = $ID";
    $produto = ibase_fetch_assoc(ibase_query($fdb_db,$sql));
    $descricao = $produto['NOMPRO_'];
    $categoria = $produto['NOMGRU_'];

    try{
        $db = connect_sqlite();
    }catch(Exception $e){
        return $e->getMessage();
    }
    
    if(validar_produto($ID)){
        $restult =  $db->exec("INSERT INTO lista_pedidos(ID, descricao, preco_custo,saldo_estoque, categoria) VALUES ({$produto['ID_CODIGO']},
        '$descricao', {$produto['PRCUSTO_']}, $saldo, '$categoria')");
        echo 'true';
        die();
    }else{
        echo 'false';
        die();
    }

    function validar_produto($id){
        $db = connect_sqlite();
        $sql = 'SELECT COUNT(*) as linhas FROM lista_pedidos WHERE ID ='.$id;
        $count = $db->query($sql)->fetchArray();
        $rows = $count['linhas'];

        if($rows == 0){
            return true;
        }else{
            return false;
        }
    }


    
?>