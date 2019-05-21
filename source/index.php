<?php get_header(); ?>

<!-- Carousel -->
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <?php
        $firstNews = true;
        while(have_posts()) {
          the_post(); 

          if($firstNews) echo '<div class="carousel-item active">'; else echo '<div class="carousel-item">'; ?>
          <div style="background-image: url('<?php echo get_the_post_thumbnail('newsCarousel'); ?>')"></div>
            <!-- <?php the_post_thumbnail('newsCarousels', array('class' => 'd-block w-100 h-100')); ?> -->
            <!-- <img src="<?php echo get_theme_file_uri('assets/images/ufo2.jpg'); ?>" class="d-block w-100" alt="..."> -->
            <div class="carousel-caption d-none d-md-block">
              <h5><?php the_title(); ?></h5>
              <p><?php if(has_excerpt()) {echo get_the_excerpt();} else {echo wp_trim_words(get_the_content(), 8);} ?></p>
            </div>
          </div>

        <?php $firstNews = false; }
      ?>

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
<div class="games pt-5">
  <div class="container">
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

    <!-- LOOP -->
    <div class="col-lg-8">
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

    <div class="col-lg-4">
      <?php
        while($gamePosts->have_posts()) {
          $gamePosts->the_post();
          
          if($gamesCount > 2) { ?>
            <div class="games__component games__component--blue">
              <div class="games__date"><?php
                $gameDate = new DateTime(get_field('data_do_jogo'));
                echo $gameDate->format('d') . '/' . $gameDate->format('m');?>
              </div> <!-- /games__date -->
              <img class="games__team games__team--left" src="<?php echo get_field('time_1')['url']; ?>" alt="time1">
              <img class="games__team games__team--right" src="<?php echo get_field('time_2')['url']; ?>" alt="time2">
              <img class="games__field img-fluid" src="<?php echo get_theme_file_uri('assets/images/bg_campo.png'); ?>" alt="">
            </div> <!-- /games__component -->
          <?php   }
          $gamesCount++;
        }
      ?>
    </div> <!-- /col -->

    </div> <!-- /row -->
  </div> <!-- /container -->
</div> <!-- /games -->

<!-- Noticias -->
<div class="news pt-5 pb-5">

  <div class="container">
    <h2 class="main-title">Notícias</h2>
  
    <div class="row">

      <?php
        // $newsPosts = new WP_Query(array(
          // 'posts_per_page' = 3
        // ));

        while(have_posts()) {
          the_post(); ?>
          <div class="col-lg-4 news--mb">
            <a href="#" class="card w100">
              <div class="card-img-container">
                <div class="card-img-overlay"></div>
                <?php the_post_thumbnail('newsThumbnail', array('class' => 'card-img')); ?>
                <!-- <img class="card-img-top" src="<?php the_post_thumbnail_url('newsThumbnails'); ?>" alt="news photo"> -->
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text">
                  <?php if(has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                  }
                  ?>
                </p>
              </div>
            </a>
          </div>
        <?php }
      ?>


    </div>
  </div>
</div>

<!-- Quem Somos -->
<div class="about pt-5 pb-5">
  <div class="container">
    <h2 class="main-title">Quem Somos</h2>

    <div class="row">
      <div class="col-md-6">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>

      <div class="col-md-6">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7n3PfR_NE7c"></iframe>
        </div>
      </div>
    </div> <!-- content -->

    <!-- swiper -->
    <div class="row mt-5">
      <div class="col-md-12">
        <!-- Swiper -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="swiper-slide__content">
                <h4 class="swiper-slide__name">Nilda Dias</h4>
                <p class="swiper-slide__job">Coordenadora</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-slide__content">
                <h4 class="swiper-slide__name">Elias Marques</h4>
                <p class="swiper-slide__job">Técnico</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-slide__content">
                <h4 class="swiper-slide__name">Alex Pinheiro</h4>
                <p class="swiper-slide__job">Preparador físico</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-slide__content">
                <h4 class="swiper-slide__name">Raquel Laureano</h4>
                <p class="swiper-slide__job">Captação de recursos</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-slide__content">
                <h4 class="swiper-slide__name">Fernanda Sá</h4>
                <p class="swiper-slide__job">Captação de recursos</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-slide__content">
                <h4 class="swiper-slide__name">Romulo Silva</h4>
                <p class="swiper-slide__job">Contador</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-slide__content">
                <h4 class="swiper-slide__name">Hugo Souto</h4>
                <p class="swiper-slide__job">Advogado</p>
              </div>
            </div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
        <script src="../dist/js/swiper.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
          if ($(window).width() < 768) {
            var sliderPerView = 1;
          }
          else {
            var sliderPerView = 4;
          }
          
          var swiper = new Swiper('.swiper-container', {
            slidesPerView: sliderPerView,
            spaceBetween: 30,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });
        </script>
      </div> <!-- swiper -->
    </div> <!-- row-swiper -->

  </div> <!-- container -->
</div> <!-- /about -->

<!-- Doacoes -->
<!-- <div class="container pt-5 pb-5"> -->
  <!-- <h2>Doações</h2> -->
<!-- </div> -->

<!-- Location -->
<div class="location">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.8376709304503!2d-34.89727842609615!3d-8.015670004083349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab1837424d28c9%3A0x18a2354d60d97c5!2sR.+Alto+do+Pereirinha+-+%C3%81gua+Fria%2C+Recife+-+PE%2C+52130-022!5e0!3m2!1spt-BR!2sbr!4v1558222309712!5m2!1spt-BR!2sbr"
    width="100%" height="303" frameborder="0" style="border:0; display: block;" allowfullscreen></iframe>
</div>

<!-- Contato -->
<div class="contact text-primary">
  <div class="container pt-5 pb-5">
    <h2 class="main-title main-title">Contato</h2>
    <?php echo do_shortcode( '[contact-form-7 id="224" title="Contact form"]' ); ?>


    <ul class="contact__social clearfix">
      <div class="contact__social-container">
        <li class="contact__item">
          <a class="contact__link" target="_blank" href="https://www.facebook.com/PereirinhaFC/"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="contact__item">
          <a class="contact__link" target="_blank" href="https://www.instagram.com/pereirinhafc/"><i class="fab fa-instagram"></i></a>
        </li>
        <li class="contact__item">
          <a class="contact__link" target="_blank" href="https://www.youtube.com/user/escolinhapfc/videos/"><i class="fab fa-youtube"></i></a>
        </li>
      </div>
    </ul>
    
  </div>
</div>


<?php get_footer(); ?>