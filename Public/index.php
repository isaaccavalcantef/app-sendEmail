<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<form action="processa_envio.php" method="post"> 
							<div class="form-group">
								<label for="para">Para</label>
								<input name="para" type="text" class="form-control" id="para" placeholder="joao@dominio.com.br">
							</div>

                            <div class="form-group">
								<label for="remetente">Nome</label>
								<input name="remetente" type="text" class="form-control" id="remetente" placeholder="Nome do remetente" value="Fala dev">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea name="mensagem" class="form-control" id="mensagem"></textarea>
							</div>

                            <hr>

                            <div class="form-group">
								<label for="de">Remetente</label>
								<input name="de" type="text" class="form-control" id="de" placeholder="Email do remetente" value="newslatter.dev@gmail.com">
							</div>

                            <div class="form-group">
								<label for="senha">Senha</label>
								<input name="senha" type="password" class="form-control" id="senha" placeholder="Senha aqui">
                                <p style="color: red; font-size: 0.85rem; ">Senha de Testes: gckbnocvaaloerhn </p>
                                
                            </div>
                            
                            <div class="row ">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>

                                <a class="btn btn-primary btn-lg btn-warning ml-10" style="margin-left: 10px;" href="https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4PFGvGnb0fnwrFaLJHDT3Kim4F75NHcBB1PHRjAiUOyQqMfUgXjds0hTXeiXpHM5sBa2W2WlVw761wUIe5dOHoIp_2upA">
                                    Config do Google
                                </a>        

                            </div>
							
						</form>

                        </button>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>