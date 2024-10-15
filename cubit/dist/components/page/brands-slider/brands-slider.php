<?php
$fields = get_field('brands_logo_slider');
?>
<section id="brands-slider">
    <div class="py-10 bg-wshade-off text-shade-5">
        <div class="container ">
            <h2 class="text-sm font-normal leading-5 text-shade-dark-gray">
                <?= $fields['title'] ?>
            </h2>
        </div>
        <div class="relative pt-8 overflow-hidden">
            <?php $images = $fields['logos'];
            include get_component_inner_path('image-slider') ?>
        </div>
    </div>
</section>
<style>
    .marquee {
        animation: scrolling var(--marquee-time) linear infinite;
    }

    @keyframes scrolling {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-1 * var(--marquee-width)));
        }
    }
</style>