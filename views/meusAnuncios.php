		<div class="container">
			<h1>Meus Anúncios</h1>

			<div class="form-group">
				<a href="<?php echo BASE_URL; ?>anuncio/adiciona" class="btn btn-primary btn-lg btn-block">Adicionar Anúncio</a>
			</div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>Foto</th>
						<th>Titulo</th>
						<th>Valor</th>
						<th>Ações</th>
					</tr>
				</thead>
				<?php
					foreach ($anuncios as $anuncio) {
						?>
							<tr>
								<td>
									<?php
									if (!empty($anuncio['url'])) {
										?>
										<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0">
										<?php
									} else {
										?>
										<img src="<?php echo BASE_URL; ?>assets/images/default.jpg" height="50" border="0">
										<?php
									}
									?>

								</td>
								<td>
									<?php echo $anuncio['titulo']; ?>	
								</td>
								<td>
									<?php echo number_format($anuncio['valor'], 2); ?>
								</td>
								<td>
									<a href="<?php echo BASE_URL; ?>anuncio/edita/<?php echo $anuncio['id']; ?>" class="btn btn-success">Editar</a>
									<a href="<?php echo BASE_URL; ?>anuncio/exclui/<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
								</td>
							</tr>
						<?php
					}

				?>
			</table>
		</div>