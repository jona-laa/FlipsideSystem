<div class="footer__about">

  <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'Footer About',
        'posts_per_page' => 1,
    );

    $arr_posts = new WP_Query( $args );
    
    if ($arr_posts->have_posts()) :
        while ($arr_posts->have_posts()) :
          $arr_posts->the_post();
          
          // Post Content
          the_content();

        endwhile;
        wp_reset_postdata();
    endif;
  ?>

</div>