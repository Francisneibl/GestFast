
function changeBgColor(element) { //função mudar cor das linhas da tabela

    if (element.className == 'row-clicked') {
        element.className = $classe;
    } else {
        $classe = element.getAttribute('class');
        element.className = 'row-clicked';
    }

}

function addProduto(element, preco) {
    var cells = element.getElementsByTagName('td');

    qtd = prompt(cells[0].innerHTML + '\nQuantidade:');
    var produto = [];

    produto[0] = cells[0].innerHTML;
    produto[1] = cells[1].innerHTML;
    produto[2] = qtd.toString();
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
    cell4.innerHTML = produto[3];

    alert(element);
}

function listarProdutos($result) {
    alert($result);
}
