<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Prática Laravel</title>
</head>
<body>
    <h1>LISTA Loja</h1>
    <a href="/loja">Lista</a>
    <a href="/loja/novo">Novo</a>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Fabricante</th>
                <th>Marca</th>
                <th>Produto</th>
                <th>Cor</th>
                <th>Tamanho</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($lista as $v)
            <tr>
                <td>{{ $v->id}}</td>
                <td>{{ $v->fabricante}}</td>
                <td>{{ $v->marca}}</td>
                <td>{{ $v->produto}}</td>
                <td>{{ $v->cor}}</td>
                <td>{{ $v->tamanho}}</td>
                <td>
                    <form action="/loja/edit" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$v->id}}">
                        <button>Editar</button>
                    </form>
                </td>
                <td>
                    <form action="/loja/delete" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$v->id}}">
                        <button>Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>