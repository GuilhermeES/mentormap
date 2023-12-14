<!DOCTYPE html>
<html>
<head>
    <title>Contato</title>
</head>
<body>
    <h2>Nova mensagem de contato</h2>
    <p><strong>Nome:</strong> {{ $dados['nome'] }}</p>
    <p><strong>E-mail:</strong> {{ $dados['email'] }}</p>
    <p><strong>Telefone:</strong> {{ $dados['telefone'] }}</p>
    <p><strong>Mensagem:</strong> {{ $dados['mensagem'] }}</p>
</body>
</html>
