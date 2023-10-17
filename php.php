<?php
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os valores dos campos do formulário
    $Nome = $_POST["Nome"];
    $Sobrenome = $_POST["Sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validar o nome e sobrenome
    $Nome = $_POST['Nome'];
    if (empty($Nome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Nome.</span>";
    }

    $Sobrenome = $_POST['Sobrenome'];
    if (empty($Sobrenome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Sobrenome.</span>";
    }

    // Validar o email
    $email = $_POST['email'];
    if (empty($email)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Email.</span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de email inválido.</span>";
    }

    // Validar o telefone
    $telefone = $_POST['telefone'];
    if (empty($telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Telefone.</span>";
    } elseif (!preg_match("/^\d{2}\ \d{5}\d{4}$/", $telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de telefone inválido. Use XX XXXXXXXXX.</span><br>";
    }
}
if (empty($_SESSION['errors'])) {
    // Redirecionar para a página de exibição dos dados
    header("Location: ConfirmarDados.php?Nome=$Nome&Sobrenome=$Sobrenome&email=$email&telefone=$telefone");
    exit; // Certifique-se de sair para evitar que o restante do código seja executado
} 

}
?>