<?php get_header(); 
if (!is_page( 'Home' )) { ?>
<h1><?php the_title() ?></h1>
<?php 
}
the_content(); ?>
<?php get_footer(); 