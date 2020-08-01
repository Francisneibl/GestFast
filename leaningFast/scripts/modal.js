var btn = document.querySelector('.btn-qtd');
btn.addEventListener('click', function () {
    addProduto();
});

var btnLimpar = document.querySelector('.btn-limpar');
btnLimpar.addEventListener('click', function () {
    limparTabela();
});

function abrirModal(ModalID, element) {

    element.classList.add('selected');
    const modal = document.getElementById(ModalID);
    if (modal) {
        modal.classList.add('mostrar');
        document.querySelector('#txt-descricao').innerHTML = element.getElementsByTagName('td')[0].innerHTML;
    }
}

function fecharModal(ModalID) {
    const modal = document.getElementById(ModalID);
    if (modal) {
        modal.classList.remove('mostrar');
    }
}

function limparTabela() {
    var tabela = document.querySelector("#tabelaResultado");
    var linhas = tabela.rows;
    if (linhas.length > 0) {
        for (i = 0; linhas.length > i; i++) {
            tabela.deleteRow(1);
        }
        total = 0;
        document.getElementById('totalVal').innerHTML = total.toFixed(2);
    }
}
