<?php 

    //Importando outros arquivos PHP
    require "./lib/PHPMailer/Exception.php";
    require "./lib/PHPMailer/OAuth.php";
    require "./lib/PHPMailer/PHPMailer.php";
    require "./lib/PHPMailer/POP3.php";
    require "./lib/PHPMailer/SMTP.php";

    //Usando os namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    


//print_r($_POST);

    class Mensagem {
        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function mensagemValida(){
            //
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
                return false;
            }

            return true;

            }            
        }

$mensagem = new Mensagem();

$mensagem->__set('para', $_POST['para']);
$mensagem->__set('assunto', $_POST['assunto']);
$mensagem->__set('mensagem', $_POST['mensagem']);



//echo '<pre/>';
//print_r($mensagem);

if(!$mensagem->mensagemValida()) {
    echo 'Mensagem não é válida';
    die();
}

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 3;                      //Enable verbose debug output
        $mail->isSMTP();
        
        //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'newslatter.dev@gmail.com';                     //SMTP username
        $mail->Password   = '!dev@email#21$';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('newslatter.dev@gmail.com', 'Remetente');
        $mail->addAddress('isaaccavalcantef@gmail.com', 'Destino');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'O assunto é bolo';
        $mail->Body    = 'Olha que coisa mais linda <b>mais cheia de graça!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
        echo 'Não foi possivel enviar este email!';
    } catch (Exception $e) {
        echo "Detalhes do erro: {$mail->ErrorInfo}";
    }
    
?>