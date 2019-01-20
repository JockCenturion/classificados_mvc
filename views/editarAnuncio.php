		<div class="container">
			<?php
			/**
			* Se os dados que o controllerLogin passou for igual a TRUE então o usuario colocou email
			* mas a senha é inválida.
			*/
			if ($viewData['anuncioEditado']) {
				?>
				<div class="alert alert-success">
					Produto Editado com sucesso!
				</div>
				<?php
			}

			?>		
			<h1>Meus Anúncios</h1>
			<h4>Editar Anúncios</h4>

			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select name="categoria" id="categoria" class="form-control">
					
					<?php
					foreach ($categorias as $categoria) {
						?>
						<option value="<?php echo $categoria['id']; ?>" <?php echo ($info['id_categoria'] == $categoria['id'] ? 'selected=selected' : '') ?> ><?php echo utf8_encode($categoria['nome']); ?></option>
						<?php
					}
					?>

					</select>
				</div>
				<div class="form-group">
					<label for="titulo">Titulo: </label>
					<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">
				</div>
				<div class="form-group">
					<label for="valor">Valor: </label>
					<input type="number" step="0.01" name="valor" id="valor" class="form-control" value="<?php echo $info['valor']; ?>" >
				</div>
				<div class="form-group">
					<label for="descricao">Descrição:</label>
					<textarea type="text" name="descricao" id="descricao" class="form-control"><?php echo $info['descricao']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="estado">Estado de Conservação:</label>
					<select name="estado" id="estado" class="form-control">
						<option value="0" <?php echo ($info['estado'] == 0 ? 'selected=selected' : '') ?> >Ruim</option>
						<option value="1" <?php echo ($info['estado'] == 1 ? 'selected=selected' : '') ?> >Bom</option>
						<option value="2" <?php echo ($info['estado'] == 2 ? 'selected=selected' : '') ?> >Ótimo</option>
					</select>
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="add_foto">Fotos do anúncio:</label>
						<input type="file" name="fotos[]" multiple="">	
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">Fotos do Anúncio</div>
						<div class="panel-body">
							<?php
							foreach ($info['fotos'] as $foto) {
								?>
								<div class="foto_item">
									<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $foto['url']; ?>" border="0" class="img-thumbnail"><br>
									<a href="<?php echo BASE_URL; ?>anuncio/excluiFoto/<?php echo $foto['id'];?>" class="btn btn-danger">Exluir</a>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				
				<input type="submit" value="Salvar" class="btn btn-primary btn-lg btn-block">
		
			</form>

		</div>

