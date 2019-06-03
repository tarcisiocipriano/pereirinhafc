<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset=“<?php bloginfo('charset'); ?>”>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_theme_file_uri('stylesheets/main.css'); ?>">

  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

  <nav class="navbar fixed-top navbar-expand-lg navbar-text navbar-bg smoothScroll">
    
    <div class="container-fluid">

      <div class="navbar__logo-container">
        <h1 class="navbar__logo">
          <img class="navbar__img" src="<?php echo get_theme_file_uri('assets/images/teams/logo.png'); ?>" alt="PereirinhaFC">
        </h1>
      </div>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link smoothScroll" href="#jogos">Jogos <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link smoothScroll" href="#noticias">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link smoothScroll" href="#quem-somos">Quem Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link smoothScroll" href="#doacoes" id="link1">Doações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link smoothScroll" href="#contato">Contato</a>
          </li>
        </ul>

        <ul class="navbar-nav navbar-nav--social ml-auto">
          <li class="nav-item nav-item--social">
            <a class="nav-link--social" target="_blank" href="https://www.facebook.com/PereirinhaFC/"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li class="nav-item nav-item--social">
            <a class="nav-link--social" target="_blank" href="https://www.instagram.com/pereirinhafc/"><i class="fab fa-instagram"></i></a>
          </li>
          <li class="nav-item nav-item--social">
            <a class="nav-link--social" target="_blank" href="https://www.youtube.com/user/escolinhapfc/videos/"><i class="fab fa-youtube"></i></a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  