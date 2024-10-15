<?php
$homepage_id = get_option('page_on_front');
$homepage_id = get_option('page_on_front');
if ($homepage_id) {
    $marque_logo = get_field('awards_icon_slider',$homepage_id);
}else{
    $marque_logo = get_field('awards_icon_slider');
}
?>
<section id="logo-slider">
    <div class="py-10 text-shade-dark-gray bg-neutral-100">
        <div class="container ">
            <h2 class="text-sm font-bold leading-5 tracking-wider uppercase">
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