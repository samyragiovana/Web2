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
        td4.append(btEd, btEx);

        tr.append(td1, td2, td3, td4);
        tbody.append(tr);
    }
}

function carregaDados() {
    fetch(`${urlBase}/veiculos`)
        .then((res) => {
            //console.log(res);
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            //alert(json);
            dados = json;
            desenhaTabela();
        })
}

function enviaDadosParaCadastro() {
    const dados = new FormData(document.querySelector('form'));
    const opcoes = {
        method: 'post',
        body: new URLSearchParams(dados)
    };
    fetch(`${urlBase}/veiculos`, opcoes)
        .then((res) => {
            console.log(res);
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            alert('Veiculo ' + json.modelo + ' cadastrado!');
            carregaDados();
        })
    alternaModal();
}

function enviaDadosParaDelecao(id) {
    const dados = new FormData();
    dados.append('id', id);
    const opcoes = {
        method: 'delete',
        body: new URLSearchParams(dados) 
    };
    fetch(`${urlBase}/veiculos`, opcoes)
        .then((res) => {
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            alert('Veiculo ' + json.modelo + ' deletado!');
            carregaDados();
        })
    alternaModal();
}

function preencheFormParaEdicao(index) {
    document.querySelector('#id').value = dados[index].id;
    document.querySelector('#fabricante').value = dados[index].fabricante;
    document.querySelector('#modelo').value = dados[index].modelo;
}

function enviaDadosParaEdicao() {
    const dados = new FormData(document.querySelector('form'));
    const opcoes = {
        method:'put',
        body: new URLSearchParams(dados)
    };
    fetch(`${urlBase}/veiculos`, opcoes)
        .then((res) => {
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            alert('Veiculo ' + json.modelo + ' editado!');
            carregaDados();
        })
    alternaModal();
}

function alternaModal() {
    document.querySelector('#modal').classList.toggle('mostrarModal');
}

document.querySelector('form button').addEventListener('click', (e) => {
    e.preventDefault();
    if (document.querySelector('#id').value) {
        enviaDadosParaEdicao();
    } else {
        enviaDadosParaCadastro();
    }
    document.querySelector('#id').value = '';
    e.target.parentNode.reset();
});



document.querySelector('#btNovo').addEventListener('click', alternaModal);
window.addEventListener('load', carregaDados);
