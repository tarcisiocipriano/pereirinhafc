<?php get_header(); ?>


<div class="container">

  <a href="<?php echo get_post_type_archive_link('game'); ?>"><button class="btn btn-primary mb-5">Todos os jogos</button></a>

  <?php
    while(have_posts()) {
      the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    <?php }
  ?>

</div>

<?php get_footer(); ?>