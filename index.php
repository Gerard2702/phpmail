<?php

require 'PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set("America/El_Salvador");
echo getTemplate("Nombre Apellido");
//configuracion SMTP
$hostSMTP = "main and backup SMTP servers";             //smtp.gmail.com
$emailSMTP = "email servidor SMTP";                     //email configurado en el servidor SMTP
$passSMTP = "contraseña servidor SMTP";                 //contraseña para el email del servidor SMTP


$array_user = getBirthUser();
if($array_user){
    foreach ($array_user as $user){
        //CONFIG EMAIL
        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';

        $correo = $user['email'];
        $nombre = $user['name'];
        $mensaje = getTemplate($user['name']);


        $mail->isSMTP();
        $mail->Host = $hostSMTP;
        $mail->SMTPAuth = true;
        $mail->Username = $emailSMTP;
        $mail->Password = $passSMTP;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($emailSMTP, 'Davivienda');
        $mail->addAddress($correo,$nombre);


        $mail->Subject = 'Feliz Cumpleaños';
        $mail->Body    = $mensaje;
        $mail->IsHTML(true);

        if(!$mail->send()) {
            echo 'Error, mensaje no enviado';
            echo 'Error del mensaje: ' . $mail->ErrorInfo;
        } else {
            echo 'El mensaje se ha enviado correctamente';

        }
    }
}

function getBirthUser(){

    $host = "localhost";                                    //servidor BD
    $user = "root";                                         //usuario BD
    $password = "";                                         //contraseña usuario BD
    $bd = "davivienda";                                     //BD
    $con = new mysqli($host,$user,$password,$bd);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query="SELECT name,email,birth_date FROM users";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->bind_result($name,$email,$birth);
    $index = 0;
    $birth_user = array(array());
    $dateNow = date("m-d");
    while ($stmt->fetch()){
        $date_user = substr($birth, 5);
        if($date_user===$dateNow){
            $birth_user[$index] = array(
                "name" => $name,
                "email" => $email
            );
            $index++;
        }
    }
    return ($index==0)? null: $birth_user;
}

function getTemplate($name){
    $template = '<html>
<head>
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
        body {margin: 0; padding: 0; min-width: 100%!important; background: #d1d1d1}
    </style>
</head>
<body>
<table border="0" width="600" style="border-collapse: collapse" cellpadding="0" cellspacing="0" align="center">
    <tbody>
        <tr>
            <td bgcolor="#002F43" align="center" style="padding: 20px 0 30px 0">
                <table border="0" width="500" style="border-collapse: collapse" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td align="center">
                            <img src="http://pngimg.com/uploads/happy_birthday/happy_birthday_PNG31.png" alt="" height="300" width="300"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h2 style="color: #C6AF38; font-family: sans-serif">Hoy es el cumpleaños de nuestr@ compareñ@</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h1 style="color: #9ECB17; font-family: sans-serif">' .$name.'</h1>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h2 style="color: #C6AF38; font-family: sans-serif">Muchas felicidades en tu día y que lo disfrutes a lo grande al lado de tus seres queridos y amigos</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h2 style="color: #9ECB17; font-family: sans-serif">¡Son los mejores deseos de todo el equipo de Recursos Humanos!</h2>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>';
    return $template;
}
