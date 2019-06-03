<?php get_header(); ?>

<!-- Carousel -->
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    
    <div class="carousel-inner">

      <div class="carousel-item active">
        <picture>
          <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri('assets/images/carousel/carousel01-wide.png'); ?>">
          <img class="d-block w-100" src="<?php echo get_theme_file_uri('assets/images/carousel/carousel01.png'); ?>" alt="First slide">
        </picture>
        <div class="carousel-caption d-none d-md-block">
          <h5>Pereirinha Futebol Clube</h5>
          <p>Futebol Cidadão</p>
        </div>
      </div>
      <div class="carousel-item">
        <picture>
          <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri('assets/images/carousel/carousel02-wide.png'); ?>">
          <img class="d-block w-100" src="<?php echo get_theme_file_uri('assets/images/carousel/carousel02.png'); ?>" alt="Second slide">
        </picture>
        <div class="carousel-caption d-none d-md-block">
          <h5>Futebol como ferramenta de inclusão social, educação e cidadania.</h5>
          <p>...</p>
        </div>
      </div>
      <div class="carousel-item">
        <picture>
          <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri('assets/images/carousel/carousel03-wide.png'); ?>">
          <img class="d-block w-100" src="<?php echo get_theme_file_uri('assets/images/carousel/carousel03.png'); ?>" alt="Third slide">
        </picture>
        <div class="carousel-caption d-none d-md-block">
          <h5>...</h5>
          <p>...</p>
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
    
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Jogos -->
<div class="games" id="jogos">
  <div class="container">
    <div class="vertical-padding">
      <h2 class="main-title">Jogos</h2>
      <div class="row games__container">
    
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
  
      <!-- LOOP First Game -->
      <div class="col-lg-7">
        <?php 
          $gamesCount = 1;
          while($gamePosts->have_posts()) {
            $gamePosts->the_post();
            if($gamesCount == 1) { ?>
              <div class="games__component games__component--blue">
                <div class="games__date"><?php
                  $gameDate = new DateTime(get_field('data_do_jogo'));
                  echo $gameDate->format('d') . '/' . $gameDate->format('m');?>
                </div> <!-- /games__date -->
                <img class="games__team games__team--left" src="<?php echo get_field('time_1')['url']; ?>" alt="time1">
                <img class="games__team games__team--right" src="<?php echo get_field('time_2')['url']; ?>" alt="time2">
                <img class="games__field img-fluid" src="<?php echo get_theme_file_uri('assets/images/bg_campo.png'); ?>" alt="">
              </div> <!-- /games__component -->
            <?php $gamesCount++; }
          }
        ?>
      </div> <!-- /col -->
  
      <!-- LOOP After First Game -->
      <div class="col-lg-5 col--after-first">
        <?php
          while($gamePosts->have_posts()) {
            $gamePosts->the_post();
            
            if($gamesCount > 2) { ?>
              <div class="games__component games__component--after-first">
                <div class="games__date games__date--after-first"><?php
                  $gameDate = new DateTime(get_field('data_do_jogo'));
                  echo $gameDate->format('d') . '/' . $gameDate->format('m');?>
                </div> <!-- /games__date -->
                <img class="games__team games__team--left games__team--after-first" src="<?php echo get_field('time_1')['url']; ?>" alt="time1">
                <img class="games__team games__team--right games__team--after-first" src="<?php echo get_field('time_2')['url']; ?>" alt="time2">
                <img class="games__field img-fluid" src="<?php echo get_theme_file_uri('assets/images/bg_campo.png'); ?>" alt="">
              </div> <!-- /games__component -->
            <?php   }
            $gamesCount++;
          }
        ?>
      </div> <!-- /col -->
  
      </div> <!-- /row -->

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
      <div class="col-sm-12">
        <a class="d-block text-center" href="#"><button class="btn btn--red">Veja mais</button></a>
      </div>
    </div>
    
    </div> <!-- /vertical-padding -->
  </div> <!-- /container -->
</div> <!-- /noticias -->


<div class="about bg-success" id="quem-somos">
  <div class="container">
    <div class="vertical-padding">
      <h2 class="main-title main-title--blue">Quem Somos</h2>
  
      <div class="row">
        <div class="col-md-6">
          <p>O projeto é desenvolvido no Alto do Pereirinha, Bairro de Água Fria, Zona norte do Recife-PE.</p>
          <p>Atendemos anualmente 150 alunos dos 5 aos 17 anos, moradores do bairro de Água Fria e outras 12 comunidades próximas.</p>
          <h3>Missão</h3>
          <p>Usar o futebol como ferramenta de inclusão social, educação e cidadania.</p>
          <h3>Visão</h3>
          <p>Ser referência no trabalho com crianças e adolescentes por meio das praticas e ações que valorizem a transformação social.</p>
          <h3>Valores</h3>
          <p>Responsabilidade social, ética, respeito e transparência.</p>
        </div>
  
        <div class="col-md-6">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7n3PfR_NE7c"></iframe>
          </div>
        </div>
      </div> <!-- content -->
  
      <hr>
  
      <!-- winnings -->
      <div class="winnings">
        <h3 class="text-center">Títulos Conquistados</h3>
  
        <div class="winnings__group">
          <h4 class="text-center">2018</h4>
          
          <div class="winnings__card">
  
          </div>
        </div>
        
      </div>
  
      <!-- swiper -->
      <div class="row mt-5">
        <div class="col-md-12">
          <h3 class="text-center mb-4">Equipe</h3>
  
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
  
        </div> <!-- swiper -->
      </div>
      <!-- row-swiper -->

    </div> <!-- /vertical-padding -->
  </div> <!-- /container -->
</div> <!-- /about -->

<!-- Doacoes -->
<div class="donations" id="doacoes">

  <div class="donations__background-container">
    <img class="donations__background"
        srcset="<?php echo get_theme_file_uri('assets/images/backgrounds/donations-small-i.jpg 768w, ');
                      echo get_theme_file_uri('assets/images/backgrounds/donations-medium-i.jpg 1200w, ');
                      echo get_theme_file_uri('assets/images/backgrounds/donations-large-i.jpg 1920w'); ?>  " alt="..."s>
  </div>
  

  <div class="container">
    
    
    <div class="row">
      <div class="col-sm-12 col-lg-8">
          <h2 class="main-title donations__title">Doações</h2>
        <div class="donations__container">
          <p class="donations__content mb-4">Contribua para este sonho continuar crescendo</p>
          <a href="#"><button class="btn btn--uppercase btn--hover-red">Clique aqui</button></a>
        </div>
      </div>
    </div>
    
    <picture>
      <source media="(min-width: 1200px)" srcset="<?php echo get_theme_file_uri('assets/images/elements/kids-large.png'); ?>">
      <source media="(min-width: 992px)" srcset="<?php echo get_theme_file_uri('assets/images/elements/kids-medium.png'); ?>">
      <img class="donations__kids" src="<?php echo get_theme_file_uri('assets/images/elements/kids-small.png'); ?>" alt="...">
    </picture>

    <!-- <div class="donations__kids"></div> -->
  </div>

</div>

<!-- Location -->
<div class="location">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.8376709304503!2d-34.89727842609615!3d-8.015670004083349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab1837424d28c9%3A0x18a2354d60d97c5!2sR.+Alto+do+Pereirinha+-+%C3%81gua+Fria%2C+Recife+-+PE%2C+52130-022!5e0!3m2!1spt-BR!2sbr!4v1558222309712!5m2!1spt-BR!2sbr"
    width="100%" height="303" frameborder="0" style="border:0; display: block;" allowfullscreen></iframe>
</div>

<!-- Contato -->
<div class="contact text-primary" id="contato">
  <div class="container">
    <h2 class="main-title">Contato</h2>
    <div class="form-group">
      <?php echo do_shortcode( '[contact-form-7 id="224" title="Contact form"]' ); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>