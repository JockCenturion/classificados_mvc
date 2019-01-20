
        <div class="container">

            <p class="font-weight-bold h2 form-group"><?php echo $info['titulo'];?></p>  

            <div class="row">

              <div class="col-lg-4">

                <blockquote class="blockquote">
                  <p class="text-sm-left text-justify mb-0"><?php echo $info['descricao']; ?></p>
                </blockquote>
                <p class="font-weight-light remove-margin">Categoria</p>
                <p class="font-weight-normal h6"><?php echo utf8_encode($info['categoria']); ?></p>
                <p class="font-weight-light remove-margin ">Telefone</p>
                <p class="font-weight-normal h6"><?php echo $info['telefone'];?></p>    
                <p class="font-weight-light remove-margin ">Usuário</p>
                <p class="font-weight-normal h6"><?php echo $info['usuario'];?></p>       
              </div>

                <div class="col-lg-4">

                  <div id="myCarousel" class="carousel slide form-group" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php

                      if (count($info['fotos']) == 0) {
                          ?>
                          <li data-target="#myCarousel" data-slide-to="active"></li>
                          <?php
                      } else {
                        foreach ($info['fotos'] as $chave => $foto) {
                          ?>
                          <li data-target="#myCarousel" data-slide-to="<?php echo $chave; ?>" class= "<?php echo ($chave == '0' ? 'active' : '') ?>"></li>
                          <?php
                        }
                      }

                    ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <?php

                      if (count($info['fotos']) == 0) {
                          ?>
                          <div class="carousel-item active">
                            <img src="<?php echo BASE_URL; ?>assets/images/imagem_indisponivel.jpg">
                          </div>
                          <?php
                      } else {
                        foreach ($info['fotos'] as $chave => $foto) {
                          ?>
                          <div class="carousel-item <?php echo ($chave == '0' ? 'active' : '') ?>">
                            <img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $foto['url']; ?>">
                          </div>
                          <?php
                        }      
                      }


                      ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                      <span class="sr-only">Previous</span>


                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>

                <div class="col-lg-4"> 
                  <p class="font-weight-light remove-margin">De: </p>
                  <p class="font-weight-normal h6">R$ 99999,99 Reais</p>       
                  <p class="font-weight-light remove-margin ">Preço</p>
                  <p class="font-weight-normal h3 text-success">R$ <?php echo $info['valor']; ?> Reais </p>  
                  <a href="#" class="btn btn-success btn-sm botao-padrao"><p class="h6">Comprar</p></a><br><br>
                  <a href="<?php echo BASE_URL; ?>favoritos/adiciona/<?php echo $info['id']?>" class="btn btn-info btn-sm botao-padrao"><p class="h6">Adicionar aos Favoritos</p></a><br><br>
                  <a href="#" class="btn btn-secondary btn-sm botao-padrao"><p class="h6">Adicionar ao Carrinho</p></a>
                </div>
        </div>




        

        <!--<div class="container">
          <div class="row">

            <div class="col-sm-4">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                        <?php
                        foreach ($info['fotos'] as $chave => $foto) {

                            ?>

                            <div class="carousel-item <?php echo ($chave == '0' ? 'active' : '') ?>">
                                <img class="d-block w-20" src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $foto['url']; ?>">
                            </div>

                            <?php
                            
                        }
                        ?>

                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #A901DB"></span>
                    <!--<span class="sr-only" style="background-color: red">Anterior</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #A901DB"></span>
                    <!--<span class="sr-only">Próximo</span>
                  </a>
                </div>

          </div>
            <div class="col-sm-8">
                <h1><?php echo $info['titulo'];?></h1>
                <h4><?php echo utf8_encode($info['categoria']); ?></h4>
                <p><?php echo $info['descricao']; ?></p>
                <h3>R$ <?php echo $info['valor']; ?> </h3>
                <h4><?php echo $info['telefone'];?></h4>
                <div class="form-group">
                    <a href="#" class="btn btn-primary btn-lg">Realizar compra</a>
                </div>
                <div class="form-group">
                    <a href="#" class="btn btn-secondary btn-sm" align="center">Adicionar ao carrinho</a>
                </div>
            </div>
        </div>
      </div>-->
