<?php
$partner_banner = get_field('partner_banner');

?>
<section id="partner_banner" class="flex justify-center items-center py-10 lg:py-20 banner-partner">
    <div class="container max-w-screen-lg px-4 lg:px-0 text-center">
        <h4 class="font-medium leading-5 tracking-wider lg:text-sm sm:text-sm text-dark-gray">
            <?= $partner_banner['subtitle'] ?>
        </h4>

        <h2 class="w-full lg:w-auto py-3 text-2xl lg:text-4xl text-dark-gray lg:font-semibold">
            <?= $partner_banner['title'] ?>
        </h2>

        <div class="prose py-2 mx-auto mb-5 leading-6 team-base text-dark-gray">
            <?= $partner_banner['content'] ?>
        </div>
        <div class="flex justify-center items-center google-rev">
            <?php if (get_field('google_review_text', 'option')): ?>
                <div>
                    <?= get_field('google_review_text', 'option') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-8">
            <?= get_img($partner_banner['image'], '(max-width : 540px) 95vw, (max-width: 1024px) 47vw, 412px', ['class' => 'object-contain mx-auto']) ?>
        </div>

        <!-- button -->
        <div class="flex justify-center mt-5 part-btn">
            <?php
                        if (isset($partner_banner['button']['clone_button'])) {
            $button = $partner_banner['button']['clone_button'];
            $button_styles = [
                'size' => 'sm',
                'button_type' => 'primary',
                'class' => 'mt-3',
                'attr' => 'text-nowrap !max-w-max !h-full items-center',
            ];
            get_global_component_button($button, $button_styles);
        }
            ?>
        </div>
    </div>
</section>