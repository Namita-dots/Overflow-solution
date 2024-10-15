<?php
get_header();

the_post();
get_template_part('components/post/banner/banner');
get_template_part('components/post/content/content');
get_template_part('components/post/related-treatment/related-treatment');
wp_reset_postdata();

get_footer();