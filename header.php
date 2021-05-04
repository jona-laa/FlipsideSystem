<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Flipside® | World Class customer engagement for eCommerce</title> -->
  <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
  <link href="<?php bloginfo('stylesheet_url');?>" type="text/css" rel="stylesheet">
  <link rel="icon" href="favicon.png" sizes="32x32">
  <link rel="apple-touch-icon" href="./images/touch-icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <meta name="description"
    content="Flipside® empowers Your audience with simple tools that allows Heroes to give hyper relevant feedback and content with huge impact on Your business. Lower support with 30-40%, increase sales with 15%, improve customer loyalty with 15%. 30-40%">
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <!-- Navigation -->
    <nav class="nav">
      <div class="nav__container">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
          the_custom_logo();
        } ?>
        <!-- <a href="<?php home_url()?>" class="nav__logo-link">
          <img class="nav__logo" src="./images/FLIPSIDE_logo.png" alt="Flipside Logo">
        </a> -->
        <!-- Mobile Menu Toggle - Hidden on default -->
        <a href="" onClick=event.preventDefault() id="nav__menu-toggle" aria-label="Toggle Mobile Menu"
          aria-expanded="false" aria-hidden="true">
          <svg viewBox="0 0 100 80" width="40" height="40">
            <rect width="90" height="15" fill="#252525"></rect>
            <rect y="30" width="90" height="15" fill="#252525"></rect>
            <rect y="60" width="90" height="15" fill="#252525"></rect>
          </svg>
        </a>
        <?php wp_nav_menu(array( 'theme_location' => 'main-menu'));?>
      </div>
    </nav>

    <!-- Home Page Hero -->
    <?php if (is_page( 'Home' )) { ?>
    <article class="hero-article --reverse">
      <figure class="article__figure">
        <img src="./wp-content/themes/Flipside/images/header_img.png" alt="">
      </figure>
      <div class="article__text">
        <span class="sup-h">Automation with a heart</span>
        <h2>Customer engagement Built for E-Commerce</h2>
        <p>Empower your visitors with tools, allowing them to improve
          your data; suggesting images, error correction, translations, etc.</p>
        <div class="article__row">
          <ul class="list">
            <li><i class="fas fa-check"></i>Valuable</li>
            <li><i class="fas fa-check"></i>Engaging</li>
            <li><i class="fas fa-check"></i>Secure</li>
          </ul>
          <a href="./pages/demo.html" class="btn">Book A Demo</a>
        </div>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <span class="testimonial__name"> 5 star money back warranty</span>
        </div>
      </div>
    </article>
    <div class="read-more">
      <span>Read More</span>
      <a href="#main" class="arrow-link" aria-label="Scroll to About Section">
        <i class="fas fa-chevron-down fa-3x"></i>
      </a>
    </div>

    <?php } ?>
  </header>


  <main id="main">