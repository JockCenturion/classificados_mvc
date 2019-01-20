		<div class="container">
			<?php
			/**
			* Se os dados que o controllerLogin passou for igual a TRUE então o usuario colocou email
			* mas a senha é inválida.
			*/
			if ($viewData['anuncioCadastrado']) {
				?>
				<div class="alert alert-success">
					Produto Adicionado com sucesso!
				</div>
				<?php
			}

			?>	
			<h1>Meus Anúncios</h1>
			<h4>Adicionar Anúncios</h4>

			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select name="categoria" id="categoria" class="form-control">
					<?php
					foreach ($categorias as $categoria) {
						?>
						<option value="<?php echo $categoria['id']; ?>"><?php echo utf8_encode($categoria['nome']); ?></option>
						<?php
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<label for="titulo">Titulo: </label>
					<input type="text" name="titulo" id="titulo" class="form-control" placeholder="Insira o Titulo do Livro" required >
				</div>
				<div class="form-group">
					<label for="valor">Valor: </label>
					<input type="number" step="0.01" name="valor" id="valor" class="form-control" placeholder="250,00" required>
				</div>
				<div class="form-group">
					<label for="descricao">Descrição:</label>
					<textarea type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição do seu Produto" required></textarea>
				</div>
				<div class="form-group">
					<label for="estado">Estado de Conservação:</label>
					<select name="estado" id="estado" class="form-control">
						<option value="0">Ruim</option>
						<option value="1">Bom</option>
						<option value="2">Ótimo</option>
					</select>
				</div>
				<input type="submit" value="Adicionar" class="btn btn-primary btn-lg btn-block">
			</form>

		</div>