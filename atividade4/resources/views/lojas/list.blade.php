<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Prática Laravel</title>
    <style>
        body {
            text-align: center;
        }
        
        h1 {
            margin-top: 0; 
        }

        .header-links {
            display: inline-block;
            margin-bottom: 10px;
        }

        .header-links a {
            margin-right: 10px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            text-decoration: none;
        }

        .header-links a:hover {
            background-color: #f0f0f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            margin-top: 20px; 
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .btn-editar {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        
        .btn-excluir {
            background-color: blue;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>LISTA LOJAS</h1>
    <div class="header-links">
        <a href="/lojas">Listar</a>
        <a href="/lojas/novo">Novo</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Fabricante</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Quantidade</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lista as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->fabricante }}</td>
                <td>{{ $v->modelo }}</td>
                <td>{{ $v->marca }}</td>
                <td>{{ $v->ano }}</td>
                <td>{{ $v->quantidade }}</td>

                <td>
                    <form action="/lojas/edit" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $v->id }}">
                        <button type="submit" class="btn-editar">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="/lojas/delete" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $v->id }}">
                        <button type="submit" class="btn-excluir">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
