<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'caminho/para/PHPMailer/src/Exception.php';
require 'caminho/para/PHPMailer/src/PHPMailer.php';
require 'caminho/para/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    // Configuração do PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.brevo.com';
        $mail->SMTPAuth = false; // Defina para true se o servidor SMTP requer autenticação
        $mail->Port = 587;

        // Configuração do e-mail
        $mail->setFrom('dansouza.websites@gmail.com', 'Nome de Exemplo');
        $mail->addAddress('dansouza.websites@gmail.com');
        $mail->Subject = 'Novo Formulário de Contato';
        $mail->Body = "Nome: $nome\nTelefone: $telefone\nEmail: $email\nMensagem:\n$mensagem";

        // Envia o e-mail
        $mail->send();

        // Redireciona de volta para a página do formulário com uma mensagem de sucesso
        header("Location: formulario.php?enviado=sim");
    } catch (Exception $e) {
        echo "Erro no envio do e-mail: {$mail->ErrorInfo}";
    }
} else {
    // Se alguém tentar acessar este script diretamente, redireciona de volta para o formulário
    header("Location: formulario.php");
}
?>
