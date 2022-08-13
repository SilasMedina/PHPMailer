<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])){
    $mail = new PHPMailer(true);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    try {
        //Server settings
        //SMTPDebug: Mostra as informaÃ§Ãµes do servidor enquanto estiver executando o envio
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'SMTP_DOMINIO';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'EMAIL_REMETENTE';                     //SMTP username
        $mail->Password   = 'SENHA_EMAIL';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = PORTA_HOST_SAIDA;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('EMAIL_REMETENTE', 'Mailer');
        $mail->addAddress('EMAIL_DESTINATARIO', 'Medina Dev');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('EMAIL_REMETENTE', 'Medina Dev'); //responder para
        //$mail->addCC('cc@example.com'); //copia de email
        //$mail->addBCC('bcc@example.com');//copia oculta

    //Attachments (anexos)
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);
       $mail->CharSet = 'UTF-8';
                                         //Set email format to HTML
        $mail->Subject = 'Teste de envio formuário PHP';
        $Body    = "Mensagem enviada por meio do formulário teste PHPMailer.
            Segue Segue as informações abaixo: <br>
            Nome: ". $_POST['name']."<br>
            E-mail: ". $_POST['email']."<br>
            Telefone: ". $_POST['telefone']."<br>
            Mensagem:<br>". $_POST['mensagem'];
        $mail->Body = $Body;
        //AltBody: email em texto limpo para aumentar a pontuaÃ§Ã£o do envio de email reduzindo a chance de cair no spam
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
    echo '<h1><strong>Mensagem enviada com sucesso!</h1></strong>';
    } catch (Exception $e) {
        echo "Ocorreu um erro, sua mensagem nÃ£o pode ser enviada: {$mail->ErrorInfo}";
    }
        }else{//acesso feito via URL
            echo "<strong>Sua mensagem nÃ£o foi entregue porque o acesso nÃ£o foi feito via formulÃ¡rio.</strong>";
        }
