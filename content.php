<article class="post news-content">

        <?php if ( has_post_thumbnail() ) { ?>
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-news" > <?php the_post_thumbnail('medium');?> </a>
        <?php }
        else {?> <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>./images/default_image.png" alt="No thumbnail"" alt=""> </a>

        <?php } ?>


        <h2><?php the_title(); ?></h2>

        <p class="post-info"><?php the_time('m-d-Y');?></p>

        <?php the_content ('Continue Reading'); ?>


</article>