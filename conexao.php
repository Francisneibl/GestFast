<?php
    function connect_fdb(){
    $host = 'localhost:C:/backup/SOFTWORK.FDB';
    $user = 'SYSDBA';
    $password = 'masterkey';

    $conexao = ibase_connect($host, $user, $password) or die('Erro ao conectar'.ibase_errmsg());
    return $conexao;
    }

    function connect_sqlite(){

        $path = 'C:/backup/pedidos.db';
        $conexao = new SQLite3($path);

        return $conexao;
    }
?>