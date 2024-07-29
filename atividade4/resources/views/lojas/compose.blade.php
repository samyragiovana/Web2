<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CADASTRO DE LOJAS</title>
</head>
<body>
    <h1>{{ isset($loja) ? 'Editar loja' : 'Cadastro de loja'}}</h1>
    <a href="/lojas">Lista</a><br>
    <a href="/lojas/novo">Novo</a>
    <hr>
    <form action="{{ isset($loja) ? '/lojas/update' : '/lojas/novo' }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $loja->id ?? '' }}">

        <label for="fabricante">Fabricante</label><br>
        <input type="text" name="fabricante" id="fabricante" value="{{ $loja->fabricante ?? '' }}"><br>

        <label for="modelo">Modelo</label><br>
        <input type="text" name="modelo" id="modelo" value="{{ $loja->modelo ?? '' }}"><br>

        <label for="marca">Marca</label><br>
        <input type="text" name="marca" id="marca" value="{{ $loja->marca ?? '' }}"><br>

        <label for="ano">Ano</label><br>
        <input type="number" name="ano" id="ano" value="{{ $loja->ano ?? '' }}"><br>
    
        <label for="quantidade">Quantidade</label><br>
        <input type="number" name="quantidade" id="quantidade" value="{{ $loja->quantidade ?? '' }}"><br>

        <label for=""></label>

        <br>
        <button>Salvar</button>
    </form>
    
</body>
</html>
