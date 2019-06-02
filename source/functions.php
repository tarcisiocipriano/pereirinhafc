<?php

// Call the files
function theme_styles() {
  wp_enqueue_style('font-awesome', "//use.fontawesome.com/releases/v5.8.2/css/all.css");
  wp_enqueue_style('theme_font', "//fonts.googleapis.com/css?family=Open+Sans");
  wp_enqueue_style('theme_style', get_theme_file_uri('/stylesheets/main.css'));
  wp_enqueue_style('swiper_style', "https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css" );
  
  wp_enqueue_script('bootstrap_script1', "//code.jquery.com/jquery-3.3.1.slim.min.js");
  wp_enqueue_script('bootstrap_script2', "//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js");
  wp_enqueue_script('bootstrap_script3', "//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js");
  wp_enqueue_script('swiper_script', "//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js");
  wp_enqueue_script('theme_script', get_theme_file_uri("/scripts/main.js"));
}
add_action('wp_enqueue_scripts', 'theme_styles');

// Call teh tag file
function theme_features() {
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  // add title tag to a page
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('newsThumbnail', 350, 197, true);
}
add_action('after_setup_theme', 'theme_features');

?>