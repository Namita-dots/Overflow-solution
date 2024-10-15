<?php
$marque_logo = get_field('awards_as_seen_slider');
?>
<section id="logo-slider">
    <div class="py-10 bg-white text-shade-5">
        <div class="container ">
            <h2 class="text-sm font-normal tracking-wider uppercase text-shade-dark-gray">
                <?= $marque_logo['title'] ?>
            </h2>
        </div>
        <div class="relative pt-8 overflow-hidden">
            <?php $images = $marque_logo['logos'];
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