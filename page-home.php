

<?php get_header(); ?>

<!-- site content -->
<div class="site-content clearfix">

        <?php $query = new WP_Query(
            array(
                'post_type' => 'product',
                'posts_per_page' => 2
            )
        );  ?>
<!--Recent posts-->
        <div class="home-recent-posts clearfix">
            <?php  if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
                    <div class="recent-post-item">
                        <div class="home-post-thumbnail">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('thumbnail');?> </a>
                            <?php }
                            else {?> <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/default_image.png" alt="No thumbnail"" alt=""> </a>

                            <?php } ?>
                        </div>
                        <p class="home-product-title">
                            <?php echo get_the_title(); ?>
                        </p>
                    </div>
                <?php }
            }?>

        </div>
<!--Recent posts-->

<!--First flexslider-->
        <?php $query = new WP_Query(
            array(
                'category_name' => 'flexslider1'
//                'posts_per_page' =>
            )
        );
        ?>
        <div class="flexslider clearfix " id="flexslider1">
        <ul class="slides clearfix ">

            <?php  if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    ?>
                    <?php if ( has_post_thumbnail() ) { ?>
                            <li class="flex-item" >
                                <div class="thumbnail-container" "> <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" /></div>
                                <p class="flex-caption"> <?php the_title(); ?></p>
                            </li>
                        <?php } ?>

              <?php }  }
                        else {  ?>

            <p>
                <?php __('No content found' , 'theme_text_domain'); ?>
            </p>

        <?php } ?>
        </ul>
    </div>
<!--First flexslider-->

    <div class="container clearfix">

<!--About Us-->
        <div class="about-us">
            <h2 class="about-us-caption">
               Причини <span>замовити обладнання у нас</span>
            </h2>


           <?php $query = new WP_Query(
            array(
            'category_name' => 'about-us',
            'posts_per_page' =>'-1')
            );?>

            <div class="about-us">
                <ul class="about-us-list clearfix">
                    <?php if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            ?>
                            <li class="col-xs-6 col-sm-15 col-md-15 col-lg-15">
                                <div class="thumbnail-about-us"> <img src= " <?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?> "/>  </div>
                                <h3 class="about-us-title"><?php the_title(); ?></h3>
                                <p class="about-us-content"> <?php echo get_the_content();?> </p>
                            </li>
                        <?php } } ?>

                </ul>
            </div>
        </div>
<!--About Us-->

<!--Second flexslider-->
        <?php $query = new WP_Query(
            array(
                'post_type' => 'product'
//                'posts_per_page' =>
            )
        );
        ?>

        <h2 class="flexslider2-title"><a href="<?php echo  esc_url(get_permalink(get_page_by_path('products'))); ?>"> <?php echo (get_the_title(get_page_by_path('products'))); ?> </a></h2>
        <div class="flexslider clearfix" id="flexslider2">
            <ul class="slides clearfix">

                <?php  if ( $query->have_posts() ) {?>



                   <?php while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <?php if ( has_post_thumbnail() ) { ?>
                            <li class="flex2-item">
                                <a class="thumbnail-container" href="<?php the_permalink(); ?>"> <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" /></a>
                                <p class="flex-caption"> <?php the_title(); ?></p>
                            </li>
                        <?php } ?>

                    <?php }  }
                         else {  ?>

                    <p>
                        <?php __('No content found' , 'theme_text_domain'); ?>
                    </p>

                <?php } ?>
            </ul>
    </div>
<!--Second flexslider-->

<!--Video in page        -->
<!--        <div class="home-page-video">-->
<!---->
<!---->
<!--            <iframe  class = 'home-video' width="560" height="315" src="https://www.youtube.com/embed/pZ21jWGxPTY" frameborder="0" allowfullscreen></iframe>-->
<!---->
<!--<!--     --><?php ////echo do_shortcode('[video mp4="https://www.youtube.com/watch?v=pZ21jWGxPTY" ogv="source.ogv" webm="source.webm"]'); ?>
<!---->
<!--        </div>-->
            <!--Video in page  -->

</div>
<!--site content-->
<?php get_footer();?>