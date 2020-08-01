function addProduto() {

    var labelQtd = document.querySelector('.input-descricao');
    var qtd = labelQtd.value;
    if (qtd != 0) {
        var element = document.querySelector('.selected');
        var cells = element.getElementsByTagName('td');
        var preco = parseFloat(cells[1].innerHTML.split(' ')[1]);

        var produto = [];
        produto[0] = cells[0].innerHTML;
        produto[1] = qtd.toString(); 
        produto[2] = cells[1].innerHTML;
        produto[3] = preco * qtd;

        var tabela = document.getElementById('tabelaResultado');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);

        var cell1 = linha.insertCell(0);
        var cell2 = linha.insertCell(1);
        var cell3 = linha.insertCell(2);
        var cell4 = linha.insertCell(3);

        cell1.innerHTML = produto[0];
        cell2.innerHTML = produto[1];
        cell3.innerHTML = produto[2];
        cell4.innerHTML = 'R$ ' + produto[3].toFixed(2);
        total = total + produto[3];

        document.getElementById('totalVal').innerHTML = total.toFixed(2);
        linha.onclick = function () {
            var valor = linha.getElementsByTagName('td')[3].innerHTML;
            var valornumero = parseFloat(valor.split(' ')[1]);
            total = total - valornumero;
            linha.remove();
            document.getElementById('totalVal').innerHTML = total.toFixed(2);
        };

        element.classList.remove('selected');
        labelQtd.value = '';
        fecharModal('modal-id');
    } else {
        alert('Digite um valor!!!');
    }
}

function listarProdutos($result) {
    alert($result);
}

function removerProduto($element) {
    valor = element.innerHTML[3];
    total = total - valor;
    element.remove();
    document.getElementById('totalVal').innerHTML = total.toFixed(2);
}
