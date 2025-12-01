<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>

    <style>
        body{font-family:Arial;background:#f3f3f3;margin:0;padding:0;}
        .container{
            width:40%;background:white;margin:50px auto;padding:30px;
            border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,.1);
        }
        h2{ text-align:center;margin-bottom:20px;color:#444; }
        label{ font-weight:bold;color:#444; }
        input{
            width:100%;padding:10px;margin:8px 0 18px;border:1px solid #ccc;border-radius:5px;
        }
        button{
            background:#ffc107;color:#333;padding:10px 18px;border:none;border-radius:5px;
            cursor:pointer;width:100%;font-size:16px;
        }
        button:hover{ background:#e0a800; }
        .back{
            display:block;text-align:center;margin-top:15px;text-decoration:none;color:#007bff;
        }
        .back:hover{ text-decoration:underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>✏ Editar Produto</h2>

    <form action="{{ route('produtos.update',$produto->id) }}" method="POST">
        @csrf @method('PUT')

        <label>Descrição:</label>
        <input type="text" name="description" value="{{ $produto->description }}">

        <label>Total:</label>
        <input type="number" name="total" value="{{ $produto->total }}">

        <button type="submit">Atualizar Produto</button>
    </form>

    <a class="back" href="{{ route('produtos.index') }}">⬅ Voltar para lista</a>
</div>

</body>
</html>
