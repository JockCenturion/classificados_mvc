    <!-- Inicio do Container Principal -->
    <div class="container">

        <!-- Cuida do Jumbotron -->
    	<div class="jumbotron">

            <div class="row">
                <div class="col-sm-8">
                    <h2>Nós temos hoje <?php echo $totalAnuncios;?> anúncio(s)</h2>
                    <small class="text-muted h5">E mais de <?php echo $totalUsuarios; ?> usuário(s) cadastrados</small>   
                    <hr class="my-4">  
                    <small class="text-muted h4">Livrou - O Maior Site de Compra e Venda de Livros do Brasil</small>              
                </div>
                <div class="col-sm-4">
                    <img align="center" src="<?php echo BASE_URL; ?>assets/images/fundo.png">   
                </div>
            </div>

    	</div>

        <!-- Sistema Grid -->
    	<div class="row">

            <!-- Coluna1: Pesquisa Avançada -->
    		<div class="col-sm-3">
    			<p class="h4 font-weight-normal">Pesquisa Avançada</p>
                <form method="GET">
                    <div class="form-group">
                        <label class="h6 font-weight-light" for="categoria">Categoria:</label>
                        <select id="categoria" name="filtros[categoria]" class="form-control">
                            <?php
                            ?><option></option><?php
                            foreach($categorias as $categoria) {
                                ?>
                                <option value="<?php echo $categoria['id']; ?>" <?php echo ($categoria['id'] == $filtros['categoria'] ? 'selected=selected' : '' ) ?> ><?php echo utf8_encode($categoria['nome']);?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="h6 font-weight-light" for="preco">Preço:</label>
                        <select name="filtros[preco]" id="preco" class="form-control">
                            <option></option>
                            <option value="0-50" <?php echo ($filtros['preco'] == '0-50' ? 'selected=selected' : '') ?> > R$ 0 - 50</option>
                            <option value="51-100" <?php echo ($filtros['preco'] == '51-100' ? 'selected=selected' : '') ?> >R$ 51 - 100</option>
                            <option value="101-1000" <?php echo ($filtros['preco'] == '101-1000' ? 'selected=selected' : '') ?>>R$ 101 - 1000</option>
                            <option value="1001-2000" <?php echo ($filtros['preco'] == '1001-2000' ? 'selected=selected' : '') ?> >R$ 1001 - 2000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="h6 font-weight-light" for="estado">Estado de Conservação:</label>
                        <select name="filtros[estado]" id="estado" class="form-control">
                            <option></option>
                            <option value="0" <?php echo ($filtros['estado'] == '0' ? 'selected=selected' : '') ?> >Ruim</option>
                            <option value="1" <?php echo ($filtros['estado'] == '1' ? 'selected=selected' : '') ?> >Bom</option>
                            <option value="2" <?php echo ($filtros['estado'] == '2' ? 'selected=selected' : '') ?> >Ótimo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Buscar" class="btn btn-primary btn-block">
                    </div>
                </form>
    		</div>
            <!-- Fim da Coluna1: Pesquisa Avançada -->

            <!-- Coluna2: Tabela com os Produtos -->
    		<div class="col-sm-9">
    			<h4>Últimos Anúncios</h4>

                <table class="table table-sm table-hover">
                    <tbody>
                        <?php

                        foreach ($utlimosAnuncios as $anuncio) {
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
                                    <a href="<?php echo BASE_URL; ?>anuncio/abrir/<?php echo $anuncio['id'];?>"><?php echo $anuncio['titulo']; ?></a><br>
                                    <a href=""><?php echo utf8_encode($anuncio['categoria']); ?></a>
                                </td>
                                <td>
                                    R$ <?php echo number_format($anuncio['valor'], 2); ?>
                                </td>
                            </tr>
                            <?php
                        }

                        ?>
                    </tbody>
                </table>
    		</div>
            <!-- FIm da Coluna2: Tabela com os Produtos -->


            <!-- Cuida da Paginação -->
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-4">
                    <ul class="pagination">
                        <?php
                        for ($count = 0; $count < $totalPaginas; $count++) {
                            ?>
                            <li class="<?php echo 'page-item ' . ($pagina == ($count + 1) ? 'active' : ''); ?>" ><a href="<?php echo BASE_URL; ?>?pagina=<?php echo ($count + 1); ?>" class="page-link"><?php echo ($count + 1); ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                </div>
            </div>
            <!-- Fim da paginação -->

    	</div>
        <!-- Fim do Sistema Grid -->

    </div>
    <!-- Fim do Container Principal -->