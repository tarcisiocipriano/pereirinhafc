<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset=“<?php bloginfo('charset'); ?>”>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

  <nav class="navbar fixed-top navbar-expand-md navbar-dark">
    <div class="container">
      <h1 class="navbar__logo">
        <img class="navbar__img" src="<?php echo get_theme_file_uri('assets/images/logo.png'); ?>" alt="PereirinhaFC" class>
      </h1>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Jogos <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Quem Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Doações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contato</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>