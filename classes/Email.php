<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $nombre;
    public $email;
    public $token;


    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;

    }

    public function enviarConfirmacion()
    {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '9973641ed299f5';
        $mail->Password = 'b61695cf945ad9';

        $mail->setFrom('cuentas@folkingc.com');
        $mail->addAddress('cuentas@folkingc.com', 'Folkc.com');
        $mail->Subject = 'Confirma tu cuenta!';


        //Uso HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>¡Hola! " . $this->nombre . "</strong> Has creado tu cuenta en 
        Folk Clothes, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-ac?token=". $this->token ."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;


        $mail->send();

        
    }

    public function enviarInstrucciones()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '9973641ed299f5';
        $mail->Password = 'b61695cf945ad9';

        $mail->setFrom('cuentas@folkingc.com');
        $mail->addAddress('cuentas@folkingc.com', 'Folkc.com');
        $mail->Subject = 'Reestablece tu password';


        //Uso HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>¡Hola! " . $this->nombre . "</strong> Has solicitado reestablecer tu password, haz click en el siguiente enlace
        para obtenerlo</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=". $this->token ."'>Reestablecer mi password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;


        $mail->send();
        
    }
}


?>