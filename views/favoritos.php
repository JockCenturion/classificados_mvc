		<div class="container">
			<h1>Meus Favoritos</h1>


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
									<a href="<?php echo BASE_URL; ?>favoritos/exclui/<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
									<a href="<?php echo BASE_URL; ?>anuncio/abrir/<?php echo $anuncio['id_anuncio']; ?>" class="btn btn-info">Abrir</a>
								</td>
							</tr>
						<?php
					}

				?>
			</table>
		</div>