<?php
$sticky_header = true;
$header_bg = 'dark-transition';
global $sticky_header, $header_bg;
get_header();

get_template_part('components/page/banner/banner');
// get_template_part('components/page/awards-slider/awards-slider');
get_template_part('components/page/brands-slider/brands-slider');
get_template_part('components/page/banner/our-reels');
// get_template_part('components/page/choose-us/choose-us');
get_template_part('components/page/our-service/our-service');
get_template_part('components/page/awards-as-seen-slider/awards-as-seen-slider');
get_template_part('components/page/team/team');
get_template_part('components/page/google-reviews/google-reviews');
get_template_part('components/page/partners/partners');
get_template_part('components/page/contact-us/contact-us');
get_footer();
