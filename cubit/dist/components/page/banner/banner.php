<?php
$fields = get_field(('banner'));
?>
<section id="banner">
    <div class="" x-data="Banner()">
        <div class="w-full h-[max(calc(100vh-195px),590px)] lg:aspect-[1.69] relative">
            <div class="relative w-full h-full">
                <div class="absolute inset-0 w-full h-full" x-show="showThumbnail"
                    x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <?= get_img($fields['background']['desktop'], '100vw', ['class' => 'object-cover w-full h-full hidden lg:block z-[1]']) ?>
                    <?= get_img($fields['background']['mobile'], '100vw', ['class' => 'object-cover w-full h-full lg:hidden block z-[1]']) ?>
                </div>
                <video src="<?= wp_get_attachment_url($fields['background']['video']['video']) ?>" muted loop
                    x-ref="videoPlayer" playsinline class="object-cover w-full h-full"></video>
            </div>
            <div class="absolute inset-0 z-10 w-full h-full bg-shade-banner bg-opacity-40"
                @click="if(innerWidth> 1024) { $dispatch('open-banner-video-modal') }"
                @stop-banner-video.window="stopVideo()" @play-banner-video.window="playVideoMedia()">
                <div class="container h-full">
                    <div @click.stop=""
                        class="flex flex-col items-start justify-end w-full h-full gap-4 py-20 text-white md:w-1/2 lg:justify-center">
                        <h1 class="text-3xl font-medium xl:text-6xl tracking-narrow">
                            <?= $fields['title'] ?>
                        </h1>
                        <div class="prose lg:prose-xl prose-white">
                            <?= $fields['description'] ?>
                        </div>
                        <?php if (get_field('google_review_text', 'option')): ?>
                            <div>
                                <?= get_field('google_review_text', 'option') ?>
                            </div>
                        <?php endif; ?>
                        <div class="block">
                            <div class="flex-0 ">
                                <?php
                                $button = $fields['button']['clone_button'];
                                $button_styles = [
                                    'size' => 'lg',
                                    'button_type' => 'outline',
                                    'class' => '',
                                    'attr' => '',
                                ];
                                get_global_component_button($button, $button_styles);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="lg:hidden">
            <div class="container py-10">
                <div class="flex flex-col space-y-6">
                    <h5 class="text-shade-dark-gray"><?= $fields['background']['video']['subtitle'] ?></h5>
                    <h2 class="text-2xl font-semibold text-shade-dark-gray !mt-2">
                        <?= $fields['background']['video']['title'] ?>
                    </h2>
                    <div class="aspect-[1.84] w-full relative group cursor-pointer"
                        @click="console.log('dispatch event triggered');$dispatch('open-banner-video-modal')">
                        <div
                            class="absolute inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-20">
                            <div class="w-10 h-10 text-white transition-all duration-300 ease-in group-hover:scale-110">
                                <?= get_svg('play') ?>
                            </div>
                        </div>
                        <?= get_img($fields['background']['desktop'], '100vw', ['class' => 'object-cover w-full h-full']) ?>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>
<?php
ob_start();
?>
<div id="banner-video-modal">
    <div x-data="ModalVideo()" @open-banner-video-modal.window="open = true">
        <?php include get_component_path('global/modal-video/start'); ?>
        <div class="max-w-[calc(177.77vh-160px)] mx-auto aspect-w-16 aspect-h-9 relative">
            <video src="<?= wp_get_attachment_url($fields['background']['video']['video']) ?>" controls
                x-ref="modalVideoPlayer" class="w-full"></video>
        </div>
        <?php include get_component_path('global/modal-video/end'); ?>
    </div>
</div>
<?php
$modal = ob_get_clean();
add_action('wp_footer', function () use ($modal) {
    echo $modal;
});
?>