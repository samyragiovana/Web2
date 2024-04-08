<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CADASTRO DE LOJA</title>
</head>
<body>
    <h1>{{ isset($veiculo) ? 'Editar veiculo' : 'Cadastro de veiculo'}}</h1>
    <a href="/loja">Lista</a><br>
    <a href="/loja/novo">Novo</a>
    <hr>
    <form action="{{ isset($veiculo) ? '/loja/update' : '/loja/novo' }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $veiculo->id ?? '' }}">

        <label for="fabricante">Fabricante</label><br>
        <input type="text" name="fabricante" id="fabricante" value="{{ $veiculo->fabricante ?? '' }}"><br>

        <label for="marca">Marca</label><br>
        <input type="text" name="marca" id="marca" value="{{ $veiculo->marca ?? '' }}"><br>

        <label for="marca">Produto</label><br>
        <input type="text" name="marca" id="marca" value="{{ $veiculo->marca ?? '' }}"><br>

        <label for="marca">Cor</label><br>
        <input type="text" name="marca" id="marca" value="{{ $veiculo->marca ?? '' }}"><br>

        <label for="marca">Tamanho</label><br>
        <input type="text" name="marca" id="marca" value="{{ $veiculo->marca ?? '' }}"><br>

        <br>
        <button>Salvar</button>
    </form>
    
</body>
</html>