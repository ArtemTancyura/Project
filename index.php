

<?php get_header(); ?>

<!-- site content -->
<div class="site-content container ">
<!--main-column-->
    <div class="main-column ">
        <?php if (have_posts()):
            while (have_posts()): the_post(); ?>

                <!--CONTENT-->
            <?php endwhile;
        else:
           ?>
        <p>
           <?php __('No content found' , 'theme_text_domain'); ?>
        </p>

        <?php endif; ?>
    </div>
<!--main-column-->

</div>
<!--site content-->
<?php get_footer();?>