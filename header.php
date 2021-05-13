<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
  <link rel="apple-touch-icon" href="./images/touch-icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <?php wp_head(); ?>
</head>

<body>
  <header id="header">
    <!-- Navigation -->
    <nav class="nav">
      <a class="skip-link" href='#main'>Skip to main content</a>
      <div class="nav__container">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
          the_custom_logo();
        } ?>
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

  </header>


  <main id="main">