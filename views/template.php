<!DOCTYPE html>
<html>
	<head>
		<title>Livrou - O Maior Site de Compra e Venda de Livros do Brasil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
		
	</head>
	<body>



		<header class="form-group">
			<nav class="navbar navbar-expand-lg navbar-light cor-header">
				<a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.png"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link active text-light" href="#">LIVROS MAIS VENDIDOS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active text-light" href="#">LIVROS EM PROMOÇÃO</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active text-light" href="#">LISTA LIVROU</a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0 posicionamento-nome-user">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item dropdown">

                                	<?php
                                	if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])) {
                                		?>
                                		<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                			<?php echo strtoupper(Usuario::getNome($_SESSION['cLogin'])); ?>
                                		</a>
                                		<div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                			<a class="dropdown-item" href="<?php echo BASE_URL; ?>anuncio/lista">Meus Anúncios</a>
                                			<a class="dropdown-item" href="<?php echo BASE_URL; ?>carrinho">Meu Carrinho</a>
                                			<a class="dropdown-item" href="#">Histórico</a>
                                			<a class="dropdown-item" href="<?php echo BASE_URL; ?>favoritos">Favoritos</a>
                                			<div class="dropdown-divider"></div>
                                			<a class="dropdown-item" href="<?php echo BASE_URL; ?>sair">Sair</a>
                                		</div>

                                		<?php
                                	} else {
                                		?>
                                		<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                			Minha Conta
                                		</a>
                                		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                			<a class="dropdown-item" href="<?php echo BASE_URL; ?>cadastro">Cadastre-se</a>
                                			<a class="dropdown-item" href="<?php echo BASE_URL; ?>login">Login</a>
                                		</div>
                                		<?php
                                	}
                                	?>

                               
							</li>
						</ul>

					</form>
				</div>
			</nav>

		</header>


		<?php echo $this->loadViewBody($viewName, $viewData); ?>

		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>