<?php

/**
 * Template Name: Contact us
 */
?>
<?php
$header_bg = 'dark';
$pad_content = true;
global $header_bg, $pad_content;
get_header();

get_template_part('components/page/contact-us/contact-us');
?>

<?php get_footer(); ?>