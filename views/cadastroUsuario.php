		<div class="container">
			<h1>Cadastre-se</h1>

			<?php
			/**
			* Se os dados que o controllerLogin passou for igual a TRUE então o usuario colocou email
			* mas a senha é inválida.
			*/
			if ($viewData['sucesso']) {
				?>
				<div class="alert alert-success">
					<strong>Parabéns!</strong> Cadastrado com sucesso.<a href="<?php echo BASE_URL; ?>login">Faça o login agora</a>
				</div>
				<?php
			} else if ($viewData['warning']) {
				?>
				<div class="alert alert-warning">
					Este usuário já existe! <a href="<?php echo BASE_URL; ?>login">Faça o login agora</a>
				</div>
				<?php	
			}

			?>	

			<form method="POST">
				<div class="form-group">
					<label for="name">Nome: </label>
					<input type="text" name="nome" id="nome" class="form-control" placeholder="Insira seu nome" required autofocus>
				</div>
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Seu email" required>
				</div>
				<div class="form-group">
					<label for="senha">Senha: </label>
					<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
				</div>
				<div class="form-group">
					<label for="telefone">Telefone: </label>
					<input type="tel" name="telefone" id="telefone" class="form-control" placeholder="Seu telefone">
				</div>
				<div class="form-group">
					<label for="celular">Celular: </label>
					<input type="tel" name="celular" id="celular" class="form-control" placeholder="Seu celular">
				</div>				
				<input type="submit" value="Cadastrar" class="btn btn-primary btn-lg btn-block">
			</form>

		</div>