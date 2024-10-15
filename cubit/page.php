<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package YourTheme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <div class="px-4 mx-auto mb-20 max-w-8xl pt-14 sm:pt-20 md:pt-32 xl:pt-36 md:mb-32 sm:px-6 lg:px-8">
                <h2 class="max-w-5xl mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-6xl"><?php the_title(); ?></h2>
                <div class="max-w-3xl mt-4 prose prose-slate">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>