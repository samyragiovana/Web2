const urlBase = 'http://localhost:3000';
let dados = [];

function desenhaTabela() {
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < dados.length; i++) {
        const tr = document.createElement('tr');
        const btEx = document.createElement('button');
        const btEd = document.createElement('button');

        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');
        const td5 = document.createElement('td');
        const td6 = document.createElement('td');
        const td7 = document.createElement('td');

        btEx.innerText = '-';
        btEx.setAttribute('data-id', dados[i].id);
        btEx.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            alternaModal();
            enviaDadosParaDelecao(id);
        });

        btEd.innerText = '.';
        btEd.setAttribute('data-index', i);
        btEd.addEventListener('click', (e) => {
            const index = e.target.getAttribute('data-index');
            alternaModal();
            preencheFormParaEdicao(index);
        });

        td1.innerText = dados[i].id;
        td2.innerText = dados[i].fabricante;
        td3.innerText = dados[i].modelo;
        td4.innerText = dados[i].ano;
        td5.innerText = dados[i].marca;
        td6.innerText = dados[i].estoque;
        td7.append(btEd, btEx);

        tr.append(td1, td2, td3, td4, td5, td6, td7);
        tbody.append(tr);
    }
}

function carregaDados() {
    fetch(`${urlBase}/lojas`)
        .then((res) => res.json())
        .then((json) => {
            dados = json;
            desenhaTabela();
        })
        .catch((error) => console.error('Erro ao carregar dados:', error));
}

function enviaDadosParaCadastro() {
    const dados = new FormData(document.querySelector('form'));
    const opcoes = {
        method: 'post',
        body: new URLSearchParams(dados)
    };
    fetch(`${urlBase}/lojas`, opcoes)
        .then((res) => res.json())
        .then((json) => {
            alert('Loja ' + json.modelo + ' cadastrada!');
            carregaDados();
        })
        .catch((error) => console.error('Erro ao cadastrar dados:', error));
    alternaModal();
}

function enviaDadosParaDelecao(id) {
    const dados = new FormData();
    dados.append('id', id);
    const opcoes = {
        method: 'delete',
        body: new URLSearchParams(dados)
    };
    fetch(`${urlBase}/lojas`, opcoes)
        .then((res) => res.json())
        .then((json) => {
            alert('Loja ' + json.modelo + ' deletada!');
            carregaDados();
        })
        .catch((error) => console.error('Erro ao deletar dados:', error));
    alternaModal();
}

function preencheFormParaEdicao(index) {
    document.querySelector('#id').value = dados[index].id;
    document.querySelector('#fabricante').value = dados[index].fabricante;
    document.querySelector('#modelo').value = dados[index].modelo;
    document.querySelector('#ano').value = dados[index].ano;
    document.querySelector('#marca').value = dados[index].marca;
    document.querySelector('#estoque').value = dados[index].estoque;
}

function enviaDadosParaEdicao() {
    const dados = new FormData(document.querySelector('form'));
    const opcoes = {
        method: 'put',
        body: new URLSearchParams(dados)
    };
    fetch(`${urlBase}/lojas`, opcoes)
        .then((res) => res.json())
        .then((json) => {
            alert('Loja ' + json.modelo + ' editada!');
            carregaDados();
        })
        .catch((error) => console.error('Erro ao editar dados:', error));
    alternaModal();
}

function alternaModal() {
    document.querySelector('#modal').classList.toggle('mostrarModal');
}

document.querySelector('#btNovo').addEventListener('click', alternaModal);
document.querySelector('#btClose').addEventListener('click', alternaModal);
window.addEventListener('load', carregaDados);
document.querySelector('form button[type="submit"]').addEventListener('click', (e) => {
    e.preventDefault();
    if (document.querySelector('#id').value) {
        enviaDadosParaEdicao();
    } else {
        enviaDadosParaCadastro();
    }
    document.querySelector('#id').value = '';
    e.target.parentNode.reset();
});
