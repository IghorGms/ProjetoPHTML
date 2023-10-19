<?php
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os valores dos campos do formulário
    $Nome = $_POST["Nome"];
    $Sobrenome = $_POST["Sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $datanascimento = $_POST["datanascimento"];
    $opinion = $_POST["opinion"];


    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validar o nome e sobrenome
    if (empty($Nome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Nome.</span>";
    }

    $Sobrenome = $_POST['Sobrenome'];
    if (empty($Sobrenome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Sobrenome.</span>";
    }

    // Validar o email
    if (empty($email)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Email.</span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de email inválido.</span>";
    }

    // Validar o telefone
    if (empty($telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Telefone.</span>";
    } elseif (!preg_match("/^\d{2}\ \d{5}\d{4}$/", $telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de telefone inválido. Use XX XXXXXXXXX.</span><br>";
    }
    // Valida a data de nascimento
      if (empty($datanascimento)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Data de Nascimento.</span>";
    } else {
        // Calcular a idade com base na data de nascimento
        $data_nascimento = new DateTime($datanascimento);
        $data_atual = new DateTime();
        $idade = $data_atual->diff($data_nascimento)->y;

        // Definir o limite de idade (por exemplo, 18 anos)
        $limite_idade = 18;

        // Verificar se a idade é menor que o limite
        if ($idade < $limite_idade) {
            $_SESSION['errors'][] = "<span style='color: red;'>Você deve ter pelo menos $limite_idade anos para prosseguir.</span>";
        }
        // Valida o campo opinião
        if (empty($opinion)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Opnião.</span>";
    }

    }
}
if (empty($_SESSION['errors'])) {
    // Redirecionar para a página de exibição dos dados
    header("Location: ConfirmarDados.php?Nome=" . urlencode($Nome) . "&Sobrenome=" . urlencode($Sobrenome) . "&email=" . urlencode($email) . "&telefone=" . urlencode($telefone) . "&idade=" . urlencode($idade) . "&opinion=" . urlencode($opinion));    exit; // Certifique-se de sair para evitar que o restante do código seja executado
} 

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formsstyle.css">
    <title>Formulário Padrão</title>
</head>
<header>
    <div class="cabecalho">
        <h1>Central de Atendimento ao Cliente</h1>
    </div>
</header>
<body>
    <form action="index.php" method="POST">
        <fieldset>
            <legend>Olá cliente,</legend>

            <div class="input-padrao">
                
                  <?php
                            if (isset($_SESSION['errors'])) {
                            foreach ($_SESSION['errors'] as $error) {
                            echo '<div class="error-message">' . $error . '</div>';
                             }
                            unset($_SESSION['errors']); // Limpe os erros da sessão após exibi-los
                            }
                            ?>
                            
                <label for=nome>Nome</label><br>
                <input type="text" id="nome" class="input-global" name="Nome" placeholder="Nome"><br>
                        
                <label for="sobrenome">Sobrenome</label><br>
                <input type="text" id="sobrenome" class="input-global" name="Sobrenome" placeholder="Sobrenome"><br>
                
                <label for="email">Email</label><br>
                <input type="email" id="E-Mail" name="email" class="input-padrao" placeholder="seuemail@dominio.com"><br>

                <label for="telefone">Telefone</label><br>
                <input type="tel" id="Telefone" name="telefone" class="input-padrao" placeholder="(XX) XXXXX-XXXX"><br>

                <label for="datanascimento">Data de Nascimento</label><br>
                <input type="date" id="data" name="datanascimento" class="input-padrao"><br>

                <label for="opinion">Diga-nos no que podemos melhorar!</label><br>
                <textarea id="opinion" name="opinion" rows="15" cols="70"></textarea><br>

                <p>precisamos saber quanto você gastou para possível reembolso!</p>

                <label>Valor da conta (total):</label><br>
                <input type="number" id="valorconta" name="valorconta" value=""/><br>

                <label>Valor do Couvert:</label><br>
                <input type="number" id="valorcouvert" name="valorcouvert" value=""><br>
                Total: <output id="res" name="res"></output>
                <script src="Calculo.js"></script>
            </div>

            <div class="option-select">
                <p>Antes de ir, conte como nos conheceu!</p>
                <select name="comonosconheceu">
                    <optgroup label="Redes Sociais">
                        <option>Facebook</option>
                        <option>Instagram</option>
                        <option>Orkut</option>
                        <option>Twitter</option>
                    </optgroup>
                    <optgroup label="TV/Rádio">
                        <option>Propaganda Televisão</option>
                        <option>Propaganda via Rádio</option>
                    </optgroup>
                </select>
            </div>

            <div class="botaozinho">
                <br><button input id="botaozinho" class="botao-padrao">Enviar</button>
            </div>

        </fieldset>
    </form>
    <footer>
        Desenvolvido por: <br>
        - Alice Lira<br>
        - Ana Paula<br>
        - Carlos Augusto<br>
        - Ighor Gomes<br>
        - Maximino Coelho<br> 
        - Pedro Quintas<br>
    </footer>
</body>
</html>
