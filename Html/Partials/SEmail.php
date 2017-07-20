<?php
if(isset($_POST["SenderMail"])){
        $SenderMail = $_POST["SenderMail"];
        $Assunto = $_POST["Assunto"];
        $Mensagem = $_POST["Mensagem"];
        $Nome = $_POST["Nome"];
        $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/html; charset=UTF-8\n";
        $headers .= "From: Pantalica Contato <pantalica@pantalica.com.br>\n";
        $headers .= "Return-Path: " . $SenderMail . "\n"; // return-path
        $emaildestinatario = "pantalica@pantalica.com.br";
        $EmailSender = "pantalica@pantalica.com.br";

        $MensagemHtml = "<html><body><b>Nome do usuario</b>: " . $Nome . "<br/> Email: " . $SenderMail . "<br/> Assunto: " . $Assunto . "<br/> Mensagem: " . $Mensagem . "</body></html>";

        if(!mail($emaildestinatario, $Assunto, $MensagemHtml, $headers ,"-r".$EmailSender)){ // Se for Postfix
            $headers .= "Return-Path: " . $EmailSender . $quebra_linha; // Se "não for Postfix"
            mail($emaildestinatario, $Assunto, $MensagemHtml, $headers );
        }
}
$redirect = "../Contato.php?MsgSent=1";
header("location:$redirect");
?>