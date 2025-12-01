<!DOCTYPE html>
<html>
<head>
    <title>Produtos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            color: #333;
        }

        .btn-add {
            display: inline-block;
            background: #28a745;
            padding: 10px 18px;
            color: white;
            border-radius: 5px;
            font-size: 15px;
            text-decoration: none;
            margin-bottom: 18px;
        }

        .btn-add:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #007bff;
            color: white;
            padding: 12px;
            font-size: 16px;
        }

        td {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .actions a, .actions button {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            border: none;
        }

        .btn-edit {
            background: #ffc107;
            color: #333;
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .message {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-left: 5px solid #28a745;
            width: fit-content;
            margin-bottom: 10px;
            border-radius: 4px;
        }

    </style>
</head>
<body>

    <div class="container">

        <h2>Lista de Produtos</h2>

        <a class="btn-add" href="{{ route('produtos.create') }}">+ Adicionar Produto</a>

        @if(session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        <table>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>

            @forelse($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->description }}</td>
                <td>{{ $produto->total }}</td>
                <td class="actions">

                    <a class="btn-edit" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>

                    <form action="{{ route('produtos.destroy', $produto->id) }}" 
                          method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn-delete" onclick="return confirm('Excluir produto?')">Excluir</button>
                    </form>

                </td>
            </tr>
            @empty
                <tr><td colspan="4">Nenhum produto cadastrado.</td></tr>
            @endforelse
        </table>

    </div>

</body>
</html>
