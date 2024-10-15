<?php

/***
 * Template Name: Partner Page
 * Description: A custom page template for the Partners page.
 */
?>
<?php
get_header();?>

<section class="bg-gray-100 py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6"><?php the_title(); ?></h1>
        <p class="text-xl text-gray-600"><?php the_field('hero_description'); ?></p>
    </div>
</section>

<!-- Service Cards with Videos -->
<section class="py-12">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php if( have_rows('services') ): ?>
            <?php while( have_rows('services') ): the_row(); ?>
                <div class="bg-white p-6 shadow rounded-lg">
                    <div class="bg-gray-300 h-64 mb-4">
                        <?php 
                        $service_video = get_sub_field('service_video');
                        if( $service_video ): ?>
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe class="w-full h-full" src="<?php echo esc_url($service_video); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php the_sub_field('service_title'); ?></h3>
                    <p class="text-gray-600"><?php the_sub_field('service_description'); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Why Us Section -->
<section class="bg-gray-100 py-12">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6"><?php the_field('why_us_title'); ?></h2>
        <p class="text-xl text-gray-600 mb-8"><?php the_field('why_us_description'); ?></p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if( have_rows('why_us_features') ): ?>
                <?php while( have_rows('why_us_features') ): the_row(); ?>
                    <div class="bg-white p-6 shadow rounded-lg">
                        <h3 class="text-xl font-bold mb-2"><?php the_sub_field('feature_title'); ?></h3>
                        <p class="text-gray-600"><?php the_sub_field('feature_description'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php 
$partner_banner = get_field('partner_banner');
get_template_part('components/page/partner-banner/partner-banner');
get_template_part('components/page/our-service/our-service');
get_template_part('components/page/google-reviews/google-reviews');
get_template_part('components/page/contact-us/contact-us');

get_footer();