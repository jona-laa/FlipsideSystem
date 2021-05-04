<?php get_header() ?>
<?php the_post() ?>
<div class="container">
  <div class="page-wrapper">
    <h1 class="section-header"><?php 
        the_title() 
        ?></h1>

    <div class="post-content">
      <?php the_content(); ?>
    </div>
  </div>
</div>
<?php get_footer() ?>