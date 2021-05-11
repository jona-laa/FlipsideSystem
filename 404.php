<?php get_header(); ?>

<section>
  <h1>Page Not Found</h1>
  <div class="container">
    <div class="four-oh-four">

      <?php
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => '404',
        'posts_per_page' => 1,
      );
      
      $arr_posts = new WP_Query( $args );
      
      if ($arr_posts->have_posts()) :
        while ($arr_posts->have_posts()) :
          $arr_posts->the_post();
          
          // image
          the_post_thumbnail();

          // Text
          the_content();  

        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>