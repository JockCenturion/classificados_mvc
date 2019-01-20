
		<div class="container">

			<?php
			/**
			* Se os dados que o controllerLogin passou for igual a TRUE então o usuario colocou email
			* mas a senha é inválida.
			*/
			if ($viewData['loginInvalido']) {
				?>
				<div class="alert alert-danger">
					Usuário e/ou Senha errados!
				</div>
				<?php
			}

			?>			

			<form method="POST">
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Seu email" required>
				</div>
				<div class="form-group">
					<label for="senha">Senha: </label>
					<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
				</div>
				<input type="submit" value="Fazer Login" class="btn btn-primary btn-lg btn-block">
			</form>	



		</div>