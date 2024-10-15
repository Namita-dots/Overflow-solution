<?php

/***
 * Template Name: Service  Page
 * Description: A custom page template for the Service page.
 */
get_header();
$fields = get_field('individual_service_template');
$videos = [
    'video' => $fields['video'],
];
?>

<section id="banner-sec" class="ds-banner-sec">
    <div class="relative">
        <div class="container pt-10 overflow-hidden lg:pt-20">
            <?php $info = [
                'subtitle' => $fields['subtitle'],
                'title' => $fields['title'],
                'content' => $fields['content'],
            ];
            include get_component_inner_path('text-content-stacked');
            ?>
            </div>
        </div>
        </section>

            <?php 
         set_query_var('videos', $videos);
            //print_r($videos);
get_template_part('components/page/video-gallery/video-gallery');

$content = get_field('content_area');
$list  = get_field('list_items');
include get_component_inner_path('text-content-list');?>




<?php

get_template_part('components/page/awards-slider/awards-slider');
get_template_part('components/page/what-we-do/what-we-do');
get_template_part('components/page/faq/faq');
get_template_part('components/page/contact-us/contact-us');

get_footer();
?>