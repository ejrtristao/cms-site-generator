<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                             // Enable SMTP authentication
$mail->Username = 'naoresponda@kowata.com.br';                 // SMTP username
$mail->Password = 'cancum10';             // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$message = "";
$status = "false";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['form_name'] != '' AND $_POST['form_email'] != '' AND $_POST['form_subject'] != '' ) {

        $name = $_POST['form_name'];
        $email = $_POST['form_email'];
        $subject = $_POST['form_subject'];
        $phone = $_POST['form_phone'];
        $message = $_POST['form_message'];

        $subject = isset($subject) ? $subject : 'Nova Mensagem | Contato Site';

        $botcheck = $_POST['form_botcheck'];

        $toemail = 'financeiro@kowata.com.br'; // Your Email Address
        $toname = 'KME Cursos'; // Your Name

        if( $botcheck == '' ) {

            $mail->SetFrom( $email , $name );
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;

            $name = isset($name) ? "Nome: $name<br><br>" : '';
            $email = isset($email) ? "Email: $email<br><br>" : '';
            $phone = isset($phone) ? "Telefone: $phone<br><br>" : '';
            $message = isset($message) ? "Mensagem: $message<br><br>" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>Este formulário foi enviado de: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $message $referrer";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                $message = 'Enviado com <strong>Sucesso</strong> Recebemos sua mensagem e retornará para você o mais rápido possível.';
                $status = "true";
            else:
                $message = 'Email <strong>could not</strong> ser enviado devido a algum erro inesperado. Por favor, tente novamente mais tarde.<br /><br /><strong>Razão:</strong><br />' . $mail->ErrorInfo . '';
                $status = "false";
            endif;
        } else {
            $message = 'Bot <strong>detectado</strong>.! Limpe-se Botster.!';
            $status = "false";
        }
    } else {
        $message = 'Por favor, <strong>Preencha</strong> todos os campos e tente novamente.';
        $status = "false";
    }
} else {
    $message = 'Ocorreu um <strong>erro inesperado</strong>. Por favor, tente novamente mais tarde.';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);


?>






