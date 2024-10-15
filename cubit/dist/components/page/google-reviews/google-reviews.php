<?php
$fields = get_field('google_review','option');
?>
<section id="social-prof">
    <div class="relative">
        <div class="inset-0 w-full h-full py-10 bg-white bg-opacity-20 lg:py-28"
            style='background: url(<?= wp_get_attachment_image_url($fields['background']['banner']['image']) ?>);background-repeat: no-repeat;background-size: cover;'>
            <div class="container">
                <div class="flex flex-col justify-center gap-4 lg:items-center">
                    <h2 class="w-56 text-2xl tracking-wide lg:text-4xl lg:font-semibold lg:w-auto">
                        <?= $fields['subtitle'] ?>
                    </h2>
                    <div class="prose lg:text-center"><?= $fields['description'] ?></div>
                </div>
                <div class="mt-12">
                    <?= do_shortcode('[trustindex no-registration=google]') ?>
                </div>
            </div>
        </div>
    </div>
</section>