<?php

// Call the files
function theme_styles() {
  wp_enqueue_style('font-awesome', "//use.fontawesome.com/releases/v5.8.2/css/all.css");
  wp_enqueue_style('theme_font', "//fonts.googleapis.com/css?family=Open+Sans");
  wp_enqueue_style('theme_style', get_stylesheet_uri() );
  wp_enqueue_script('bootstrap_script1', "//code.jquery.com/jquery-3.3.1.slim.min.js");
  wp_enqueue_script('bootstrap_script2', "//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js");
  wp_enqueue_script('bootstrap_script3', "//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js");
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
  add_image_size('newsCarousel', 1920, 560, true);
}
add_action('after_setup_theme', 'theme_features');

// Register the Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

?>