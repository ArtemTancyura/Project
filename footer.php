
    <footer class="site-footer clearfix">

        <!-- container-->

        <div class="container clearfix">
<!-- Footer contact form -->
        <div class="footer-contact-form col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
            <?php if (is_active_sidebar('contact-form')) :?>
                <div class="footer-widget-area clearfix">
                    <?php dynamic_sidebar('contact-form'); ?>
                </div>
        </div>
            <?php endif;?>
        <div class="col-xs-7 col-sm-9 col-md-6 col-lg-6 ">
                 <?php if (is_active_sidebar('recent_products')) :?>
                    <div class="footer-widget-area clearfix">
                        <?php dynamic_sidebar('recent_products'); ?>
                    </div>

            <?php endif; ?>

        </div>

<!-- Footer contact form -->

<!-- Production-list -->
<!-- Production-list -->

<!-- Footer nav -->
        <nav class="footer-nav clearfix col-xs-5 col-sm-3 col-md-2 col-lg-2">
            <?php

            $args = array(
                'theme_location' => 'footer'
            );

            ?>

            <?php wp_nav_menu(array( 'theme_location' => 'footer', 'items_wrap' => '<h1 id="item-id" class="footer-menu-title"> Навігація </h1><ul>%3$s</ul>' )); ?>
        </nav>
<!-- Footer nav -->

        </div> <!-- container-->

    </footer>

<?php wp_footer(); ?>

</body>
</html>