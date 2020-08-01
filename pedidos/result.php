<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="scripts/jquery-3.5.1.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>

<?php
    include '../conexao.php';

    $descricao = $_POST['nome'];

    $fdb = connect_fdb();

    $sql = "SELECT NOMPRO_, PRCUSTO_, ID_CODIGO FROM PRODUTOS WHERE NOMPRO_ LIKE '$descricao%' AND ATIVO IS NULL ORDER BY NOMPRO_ ASC";
    $resultado = ibase_query($fdb, $sql);

    
?>

<table class="table table-dark table-hover" style="text-align: center">
    <?php
    
    $c =0;
    $class = '';
    
    while($dado = mb_convert_encoding(ibase_fetch_assoc($resultado), 'UTF-8')):
        if($c%2 != 0):
            $class = 'true';
        else:
            $class = 'false';
        endif;
     ?>
    <tr id=<?php echo $dado['ID_CODIGO']?>
    class=<?php echo $class ?>
    onclick="abrirModal(this)">
        <td><?php echo $dado['NOMPRO_'] ?></td>
    </tr>
    <?php $c++; endwhile; ?>
</table>

<script>

    function inserir(id, saldo){
        
        $.ajax({
            type: "POST",
            dataType: 'text',
            url: 'inserir.php',
            data: {id: id, saldo: saldo},

            success: function(msg){
                $('#modal-estatico').modal('hide');
                $('#saldo').val('');

                if(msg == 'true'){
                    alert('Sucesso!!!');
                    msg = null;
                    return true;
                }
            }


        })
    }

    function abrirModal(element){
        $('#modal-estatico').modal();
        $('#nome_produto').html(element.innerHTML);
        

        $("#btn-inserir").click(function(){
            var saldo = $('#saldo').val();
            var id = element.id;
            if(saldo == ""){
                alert("Digite um valor valido!!!");
                return false;
            }else{
                inserir(id, saldo);
            }
            
        });
    }
</script>