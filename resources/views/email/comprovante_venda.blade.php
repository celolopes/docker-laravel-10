<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Comprovante de Venda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 600px;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Comprovante de Venda</h1>
        </div>
        <div class="content">
            <p>Olá, {{ $body }}!</p>
            <p>Agradecemos pela sua compra. Seguem os detalhes da sua venda:</p>
            <p><strong>Produto:</strong> {{ $produtoNome }}</p>
            <p><strong>Número da Venda:</strong> {{ $venda->numero_da_venda }}</p>
            <p><strong>Valor:</strong> R$ {{ number_format($produtoValor, 2, ',', '.') }}</p>
            <p>Se você tiver alguma dúvida, não hesite em nos contatar.</p>
            <p>Atenciosamente,<br>Sistema de Gestão</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Sistema de Gestão. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>
