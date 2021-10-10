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
        private $senha = null;
        public $status = array('codigoStatus' => null, 'descricaoStatus' => '');

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
$mensagem->__set('senha', $_POST['senha']);





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
        $mail->SMTPDebug = false;                           //Enable verbose debug output
        $mail->isSMTP();
        
        //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                           //Enable SMTP authentication
        $mail->Username   = 'newslatter.dev@gmail.com';     //SMTP username
        $mail->Password   = $mensagem->__get('senha');      //SMTP password
        $mail->SMTPSecure = 'ssl';                          //Enable implicit TLS encryption
        $mail->Port       = 465;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('newslatter.dev@gmail.com', 'Staack');
        $mail->addAddress($mensagem->__get('para'));        //Add a recipient
        //$mail->addAddress('ellen@example.com');           //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = 'É necessario utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem';
        
        
        
        $mail->send();
        $mensagem->status['codigoStatus'] = 1;
        $mensagem->status['descricaoStatus'] = 'E-mal enviado com sucesso!';
     

    } catch (Exception $e) {
        $mensagem->status['codigoStatus'] = 2;
        $mensagem->status['descricaoStatus'] = 'Não foi possivel enviar este email!' . '</br>' . $mail->ErrorInfo;
        
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>App Mail Send</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="py-3 text-center">
        <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
        <h2>Send Mail</h2>
        <p class="lead">Seu app de envio de e-mails particular!</p>
	</div>

    <div class="row">
        <div class="col-md-12">

            <?php 
            
            if($mensagem->status['codigoStatus'] == 1) { ?>
            
            <div class="container">
                <h1 class="display-4 text-sucess" >Sucesso</h1>
                <p><?= $mensagem->status['descricaoStatus'] ?></p>
                <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
            </div>

            
            <?php } ?>

            <?php 
            
            if($mensagem->status['codigoStatus'] == 2) { ?>
            
                <div class="container">
                    <h1 class="display-4 text-danger">Ops!</h1>
                    <p><?= $mensagem->status['descricaoStatus'] ?></p>
                    <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>

                </div>

            <?php } ?>

        </div>
    </div>
</body>
</html>