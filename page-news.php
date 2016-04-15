<?php get_header(); ?>

<!-- site content -->
<div class="site-content container">
<!--main-column-->
    <div class="main-column">

        <?php

        $query = new WP_Query(
            array(
                'category_name' => 'news',
                'posts_per_page' =>'3')
        );?>

                <?php if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>

                                          <article class=" col-xs-12 col-sm-12 col-md-12 col-lg-12  post news-content">

                                                <?php if ( has_post_thumbnail() ) { ?>
                                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail-news" > <?php the_post_thumbnail('medium');?> </a>
                                                <?php }
                                                else {?> <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>./images/default_image.png" alt="No thumbnail"" alt=""> </a>

                                                <?php } ?>


                                                <h2><?php the_title(); ?></h2>

                                                <p class="post-info"><?php the_time('m-d-Y');?></p>
                                                
                                                <p>
                                                <?php echo get_the_content('&#1055;&#1088;&#1086;&#1076;&#1086;&#1074;&#1078;&#1080;&#1090;&#1080; &#1063;&#1080;&#1090;&#1072;&#1090;&#1080;'); ?>
                                                </p>

                                        </article>
                         

                    <?php } } ?>

        </div>

        <div class="sidebar">
            <?php get_sidebar(); ?>
        </div>

</div>
<!--site content-->


<?php get_footer();?>