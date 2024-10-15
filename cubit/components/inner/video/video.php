<div id="video">
    <div class="container relative h-auto mt-8 mb-8 overflow-visible md:mb-16 md:mt-8" x-data="Videoplay()">
        <div class="relative h-full p-0 aspect-[1.78] media-video-container z-10" data-youtube-url="<?= $video ?>" x-ref="video1" data-video-type="youtube"></div>
        <div class="z-0 hidden lg:block md:absolute -bottom-8 md:-right-28 h-96 w-96" loading="lazy" style="background:url('<?= get_stylesheet_directory_uri() . ('/src/img/svgs/ribbon-bottom-right.svg'); ?>'); background-repeat:no-repeat; background-size: contain;"></div>
        <div class="z-0 hidden lg:block md:absolute md:-top-4 md:-left-16 h-96 w-96" loading="lazy" style="background:url('<?= get_stylesheet_directory_uri() . ('/src/img/svgs/ribbon-top-left.svg'); ?>'); background-repeat:no-repeat; background-size: contain;"></div>
    </div>
</div>