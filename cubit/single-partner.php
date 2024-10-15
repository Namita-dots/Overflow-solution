<?php

/***
 * Template Name: Partner Page
 * Description: A custom page template for the Partners page.
 */
?>
<?php
get_header();?>



<?php 
get_template_part('components/page/partner-banner/partner-banner');
get_template_part('components/page/partner-infometrics/partner-infometrics');
 get_template_part('components/page/awards-slider/awards-slider');?>
 <div class="swiper-container partner-slider">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <img src="https://via.placeholder.com/1600x600" alt="Slide 1" class="w-full h-auto">
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide">
            <img src="https://via.placeholder.com/1600x600" alt="Slide 2" class="w-full h-auto">
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide">
            <img src="https://via.placeholder.com/1600x600" alt="Slide 3" class="w-full h-auto">
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
        var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    </script>
<?php 
get_template_part('components/page/our-service/our-service');
get_template_part('components/page/google-reviews/google-reviews');
get_template_part('components/page/contact-us/contact-us');

get_footer();