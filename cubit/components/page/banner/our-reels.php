<?php
$fields = get_field(('banner'));
?>
<section id="banner-our-reels">
    <div class="lg:hidden" x-data="Banner()">
        <div class="container py-10">
            <div class="flex flex-col space-y-6">
                <h5 class="text-shade-dark-gray"><?= $fields['background']['video']['subtitle'] ?></h5>
                <h2 class="text-2xl font-semibold text-shade-dark-gray !mt-2">
                    <?= $fields['background']['video']['title'] ?>
                </h2>
                <div class="aspect-[1.84] w-full relative group cursor-pointer"
                    @click="console.log('dispatch event triggered');$dispatch('open-banner-video-modal')">
                    <div class="absolute inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-20">
                        <div class="w-10 h-10 text-white transition-all duration-300 ease-in group-hover:scale-110">
                            <?= get_svg('play') ?>
                        </div>
                    </div>
                    <?= get_img($fields['background']['desktop'], '100vw', ['class' => 'object-cover w-full h-full']) ?>
                </div>
            </div>
        </div>
    </div>
</section>