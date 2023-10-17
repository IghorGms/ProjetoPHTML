<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Enviados</title>
    <script src="index.js"></script>

</head>
<body>
    <h1>Confirme alguns seus dados! </h1>
    <p>Nome: <?php echo isset($_GET['Nome']) ? $_GET['Nome'] : ''; ?></p>
    <p>Sobrenome: <?php echo isset($_GET['Sobrenome']) ? $_GET['Sobrenome'] : ''; ?></p>
    <p>Email: <?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?></p>
    <p>Telefone: <?php echo isset($_GET['telefone']) ? $_GET['telefone'] : ''; ?></p>
    
    <div class="botaozinho">
        <br><button type="submit" id="botaozinho" class="botao-padrao" onclick="continarPagina()">Enviar</button>
    </div>
    
</body>
</html>
