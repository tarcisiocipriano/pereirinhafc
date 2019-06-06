<?php get_header(); ?>

<!-- Carousel -->
<div class="bd-example">
  <div id="carouselPereirinhaFC" class="carousel slide" data-ride="carousel">
  
    <div class="carousel__overlay"></div>
    
    <ol class="carousel-indicators">
      <li data-target="#carouselPereirinhaFC" data-slide-to="0" class="active"></li>
      <li data-target="#carouselPereirinhaFC" data-slide-to="1"></li>
      <li data-target="#carouselPereirinhaFC" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <picture>
          <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri('assets/images/carousel/carousel01-wide.jpg'); ?>">
          <img class="d-block w-100" src="<?php echo get_theme_file_uri('assets/images/carousel/carousel01.jpg'); ?>" alt="First slide">
        </picture>
        <div class="carousel-caption d-none d-md-block">
          <h5 class="carousel__title">Futebol como ferramenta de inclusão social, educação e cidadania.</h5>
          <!-- <p>Futebol Cidadão</p> -->
        </div>
      </div>
      <div class="carousel-item">
        <picture>
          <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri('assets/images/carousel/carousel02-wide.jpg'); ?>">
          <img class="d-block w-100" src="<?php echo get_theme_file_uri('assets/images/carousel/carousel02.jpg'); ?>" alt="Second slide">
        </picture>
        <div class="carousel-caption d-none d-md-block">
          <h5 class="carousel__title">Futebol como ferramenta de inclusão social, educação e cidadania.</h5>
          <!-- <p>...</p> -->
        </div>
      </div>
      <div class="carousel-item">
        <picture>
          <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri('assets/images/carousel/carousel03-wide.jpg'); ?>">
          <img class="d-block w-100" src="<?php echo get_theme_file_uri('assets/images/carousel/carousel03.jpg'); ?>" alt="Third slide">
        </picture>
        <div class="carousel-caption d-none d-md-block">
          <h5 class="carousel__title">Futebol como ferramenta de inclusão social, educação e cidadania.</h5>
          <!-- <p>...</p> -->
        </div>
      </div>
      
      <!-- <?php
        $firstNews = true;
        while(have_posts()) {
          the_post(); 

          if($firstNews) echo '<div class="carousel-item active">'; else echo '<div class="carousel-item">'; ?>
          <div style="background-image: url('<?php echo get_the_post_thumbnail('newsCarousel'); ?>')"></div>
            <?php the_post_thumbnail('newsCarousels', array('class' => 'd-block w-100 h-100')); ?>
            <img src="<?php echo get_theme_file_uri('assets/images/ufo2.jpg'); ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php the_title(); ?></h5>
              <p><?php if(has_excerpt()) {echo get_the_excerpt();} else {echo wp_trim_words(get_the_content(), 8);} ?></p>
            </div>
          </div>

        <?php $firstNews = false; }
      ?> -->

    </div>
    
    <!-- <a class="carousel-control-prev" href="#carouselPereirinhaFC" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselPereirinhaFC" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
  </div>
</div>

<!-- Jogos -->
<div class="games" id="jogos">
  <!-- Query -->
  <?php
    $today = date('Ymd');
    $gamePosts = new WP_Query(array(
      'posts_per_page' => 3,
      'post_type' => 'game',
      'meta_key' => 'data_do_jogo',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'data_do_jogo',
          'compare' => '>=',
          'value' => $today,
          'type' => 'DATE'
        )
      )
    ));
  ?>

  <div class="container">
    <div class="vertical-padding">

      <h2 class="main-title main-title--margin-bottom">Jogos</h2>

      
      
      
      
      


      <!-- game -->
      
        <?php while($gamePosts->have_posts()) {
          $gamePosts->the_post(); ?>
          <div class="row mb-2">

            <div class="col-sm-2 col-lg-1 bg-dark">
              <div class="game__day">04</div>
              <div class="game__month">Jun</div>
            </div>

            <div class="col-sm-10 col-lg-11 bg-primary">
              <div class="row">
                <div class="col-12 col-lg-8 bg-danger">
                  
                  <div class="row">

                    <div class="col-5 bg-success">
                      <div class="row">
                        <div class="col-md-2">
                          <img class="game__team-thumb" src="<?php echo get_field('time_1')['url']; ?>" alt="time1">
                        </div>
                        <div class="col-md-10 text-left">
                          <span class="game__team-name">PereirinhaFC</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-2 bg-warning">
                      <div class="game__time">09:00</div>
                    </div>

                    <div class="col-5 bg-danger">
                      <div class="row">
                        <div class="col-md-10 text-right">
                          <span class="game__team-name">Adversário</span>
                        </div>
                        <div class="col-md-2">
                          <img class="game__team-thumb" src="<?php echo get_field('time_2')['url']; ?>" alt="time2">
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </div>

          </div> <!-- /row -->
        <?php } ?>

        
    
      




      

      <div class="row">
        <div class="col-lg-8">
          <button class="btn btn--uppercase">Veja mais</button>
        </div>
      </div>

    </div> <!-- /vertical-padding -->
  </div> <!-- /container -->
</div> <!-- /games -->

<!-- Noticias -->
<div class="news" id="noticias">

  <div class="container">
    <div class="vertical-padding">

      <h2 class="main-title main-title--blue main-title--margin-bottom text-center">Notícias</h2>
    
    <div class="row card-container">

      <?php
        // $newsPosts = new WP_Query(array(
          // 'posts_per_page' = 3
        // ));

        while(have_posts()) {
          the_post(); ?>
          <div class="col-md-4">

            <a class="card card--margin-bottom" href="">

              <div class="card-img-container">
                <div class="card-img-overlay"></div>
                <img class="card-img-top" src="<?php the_post_thumbnail_url('newsThumbnail'); ?>" alt="news photo">
              </div>

              <div class="card-body">
                <h6 class="card-subtitle text-center">12 de Junho de 2019</h6>
                <h5 class="card-title text-center"><?php the_title(); ?></h5>
                <!-- <p class="card-text">
                  <?php if(has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                  }
                  ?>
                </p> -->
              </div>

            </a>
              
          </div>
        <?php }
      ?>

    </div>

    <div class="row">
      <div class="col-sm-12 text-center">
        <a href="#"><button class="btn btn--uppercase btn--red">Veja mais</button></a>
      </div>
    </div>
    
    </div> <!-- /vertical-padding -->
  </div> <!-- /container -->
</div> <!-- /noticias -->

<!-- Quem Somos -->
<div class="about" id="quem-somos">
  <div class="container-fluid">

    <div class="vertical-padding">

      <!-- kids -->
      <div class="about__kids-container">
        <div class="about__kids-bg"></div>
        <div class="about__kids-pic"></div>
      </div>

      <div class="row">
        <!-- Content -->
        <div class="col-lg-8 offset-lg-4 col-sm-12">
  
          <h2 class="main-title main-title--blue main-title--margin-bottom">Quem Somos</h2>
  
          <div class="about__info">
            <h3 class="about__title">Missão</h3>
            <p class="about__text">Usar o futebol como ferramenta de inclusão social, educação e cidadania.</p>
          </div>
  
          <div class="about__info">
            <h3 class="about__title">Visão</h3>
            <p class="about__text">Ser referência no trabalho com crianças e adolescentes por meio das praticas e ações que valorizem a transformação social.</p>
          </div>
  
          <div class="about__info">
            <h3 class="about__title">Valores</h3>
            <p class="about__text">Responsabilidade social, ética, respeito e transparência.</p>
          </div>
          
          
          <p>O projeto é desenvolvido no Alto do Pereirinha, Bairro de Água Fria, Zona norte do Recife-PE.</p>
          <p>Atendemos anualmente 150 alunos dos 5 aos 17 anos, moradores do bairro de Água Fria e outras 12 comunidades próximas.</p>
        
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7n3PfR_NE7c"></iframe>
          </div>
  
        </div> <!-- /content -->
      </div>
                        
    </div> <!-- /vertical-padding -->
    
  </div> <!-- /container -->
</div> <!-- /about -->

<!-- Titulos -->
<div class="titles">
  <div class="container-fluid">

    <div class="vertical-padding">

      <!-- winnings -->
      <div class="winnings">
        <h3 class="text-center">Títulos Conquistados</h3>
  
        <div class="winnings__group">
          <h4 class="text-center">2018</h4>
          
          <div class="winnings__card">
  
          </div>
        </div>
      </div>
      
    </div> <!-- /vertical-padding -->

  </div> <!-- /container -->
</div> <!-- /about -->

<!-- Time Pereirinha -->
<div class="team">
  <div class="container">

    <div class="vertical-padding">

      <!-- swiper -->
      <div class="row">
        <div class="col-md-12">
          <h4 class="text-center team__title">Time</h4>
          <h3 class="text-center main-title main-title--blue main-title--margin-bottom">Pereirinha</h3>

          <div class="about__slick">
            <div class="col-md-3">
              <img class="w-100" src="<?php echo get_theme_file_uri("assets/images/profiles/nilda-dias.jpg"); ?>" alt="...">
              <div class="about__slick__content">
                <h4 class="about__slick__name">Nilda Dias</h4>
                <p class="about__slick__job">Coordenadora</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="w-100" src="<?php echo get_theme_file_uri("assets/images/profiles/elias-marques.jpg"); ?>" alt="...">
              <div class="about__slick__content">
                <h4 class="about__slick__name">Elias Marques</h4>
                <p class="about__slick__job">Técnico</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="w-100" src="<?php echo get_theme_file_uri("assets/images/profiles/alex-pinheiro.jpg"); ?>" alt="...">
              <div class="about__slick__content">
                <h4 class="about__slick__name">Alex Pinheiro</h4>
                <p class="about__slick__job">Preparador físico</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="w-100" src="<?php echo get_theme_file_uri("assets/images/profiles/raquel-laureano.jpg"); ?>" alt="...">
              <div class="about__slick__content">
                <h4 class="about__slick__name">Raquel Laureano</h4>
                <p class="about__slick__job">Captação de recursos</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="w-100" src="<?php echo get_theme_file_uri("assets/images/profiles/fernanda-sa.jpg"); ?>" alt="...">
              <div class="about__slick__content">
                <h4 class="about__slick__name">Fernanda Sá</h4>
                <p class="about__slick__job">Captação de recursos</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="w-100" src="<?php echo get_theme_file_uri("assets/images/profiles/romulo-silva.jpg"); ?>" alt="...">
              <div class="about__slick__content">
                <h4 class="about__slick__name">Romulo Silva</h4>
                <p class="about__slick__job">Contador</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="w-100" src="<?php echo get_theme_file_uri("assets/images/profiles/hugo-souto.jpg"); ?>" alt="...">
              <div class="about__slick__content">
                <h4 class="about__slick__name">Hugo Souto</h4>
                <p class="about__slick__job">Advogado</p>
              </div>
            </div>
            
          </div>

        </div>
      </div>
      <!-- row-swiper -->
  
    </div> <!-- /vertical-padding -->

  </div> <!-- /container -->
</div> <!-- /about -->

<!-- Doacoes -->
<div class="donations" id="doacoes">

  <div class="vertical-padding">
    
    <div class="container">

      <!-- kids -->
      <div class="donations__kids-container">
        <div class="donations__kids-bg"></div>
        <div class="donations__kids-pic"></div>
      </div>
      
      <h2 class="main-title donations__title">Doações</h2>
      
      <div class="row">
        <div class="col-xs-6 col-md-6">
          <div class="donations__container">
            <p class="donations__content">Contribua para este sonho continuar crescendo</p>
            <a href="#"><button class="btn btn--uppercase btn--hover-red">Seja um apoiador</button></a>
          </div>
        </div>
      </div>
      
    </div>

  </div> <!-- /vartical-padding -->

</div>

<!-- Location -->
<div class="location">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.8376709304503!2d-34.89727842609615!3d-8.015670004083349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab1837424d28c9%3A0x18a2354d60d97c5!2sR.+Alto+do+Pereirinha+-+%C3%81gua+Fria%2C+Recife+-+PE%2C+52130-022!5e0!3m2!1spt-BR!2sbr!4v1558222309712!5m2!1spt-BR!2sbr"
    width="100%" height="303" frameborder="0" style="border:0; display: block;" allowfullscreen></iframe>
</div>

<!-- Contato -->
<div class="contact text-primary" id="contato">
  <div class="container">

    <div class="vertical-padding">
      <h2 class="main-title">Contato</h2>
      <div class="form-group">
        <?php echo do_shortcode( '[contact-form-7 id="224" title="Contact form"]' ); ?>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>