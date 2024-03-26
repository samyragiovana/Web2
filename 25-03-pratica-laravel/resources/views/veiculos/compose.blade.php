<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CADASTRO DE VEICULOS</title>
</head>
<body>
    <h1>{{ isset($veiculo) ? 'Editar veiculo' : 'Cadastro de veiculo'}}</h1>
    <a href="/veiculos">Lista</a><br>
    <a href="/veiculos/novo">Novo</a>
    <hr>
    <form action="{{ isset($veiculo) ? '/veiculos/update' : '/veiculos/novo' }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $veiculo->id ?? '' }}">

        <label for="fabricante">Fabricante</label><br>
        <input type="text" name="fabricante" id="fabricante" value="{{ $veiculo->fabricante ?? '' }}"><br>

        <label for="modelo">Modelo</label><br>
        <input type="text" name="modelo" id="modelo" value="{{ $veiculo->modelo ?? '' }}"><br>

        <label for="cavalos">Cavalos</label><br>
        <input type="number" name="cavalos" id="cavalos" value="{{ $veiculo->cavalos ?? '' }}"><br>

        <br>
        <button>Salvar</button>
    </form>
    
</body>
</html>