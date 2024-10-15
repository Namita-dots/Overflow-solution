<?php

/***
 * Template Name: About us
 * Description: A custom page template for the About Us page.
 */
?>
<?php


$pad_content = true;
global $pad_content;
get_header();

get_template_part('components/page/about-description/about-description');
get_template_part('components/page/info-metric/info-metric');
get_template_part('components/page/video-card/video-card');
// get_template_part('components/page/brands-slider/brands-slider');
get_template_part('components/page/team-grid/team-grid');
// get_template_part('components/page/awards-slider/awards-slider');
get_template_part('components/page/contact-us/contact-us');

get_footer();
