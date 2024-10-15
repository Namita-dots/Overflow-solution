<?php
$fields = get_field('our_service', 'option');
?>
<section id="our-services">
    <div class="py-10 overflow-hidden bg-shade-dark-gray text-shade-5 max-w-screen">
        <div class="container pt-8 pb-5 ">
            <div class="flex flex-col items-center justify-center gap-4 sm:items-center">
                <h2 class="text-2xl tracking-wide text-white lg:text-4xl lg:leading-10 sm:leading-8 lg:font-semibold lg:w-auto">
                    <?= $fields['title'] ?>
                </h2>
                <div class="prose text-center text-white team-base lg:leading-6 sm:leading-5">
                    <?= $fields['description'] ?>
                </div>
            </div>
            <div class="relative flex flex-wrap">
                <div class="w-full mt-8">
                    <div class="flex items-stretch">
                        <div class="w-full my-3" x-data="services()">
                            <div class="overflow-visible swiper-container swiper" x-ref="swiperContainer">
                                <div class="flex swiper-wrapper">
                                    <?php if (isset($fields["service_types"]) && count($fields["service_types"]) > 0) : ?>
                                        <?php foreach ($fields["service_types"] as $service_type) : ?>
                                            <?php $service_type = $service_type['service_details']; // Object post type 
                                            $categories = get_the_terms($service_type->ID, 'service-type');
                                            $category = isset($categories) && !empty($categories) ? $categories[0]->name : '';
                                            $image = get_field('image', $service_type->ID);
                                            $info = [
                                                'post_id' =>  $service_type->ID,
                                                'category_title' => $category ? $category : get_field('title', $service_type->ID),
                                                'title' => $service_type->post_title ? $service_type->post_title : get_field('subtitle', $service_type->ID),
                                                'short_description'=>get_field('short_description', $service_type->ID),
                                                'description' => get_field('description', $service_type->ID),
                                                'listings' => get_field('listings', $service_type->ID),
                                                'image'=> $image ? get_img($image, '40vw', ['class' => 'object-cover w-full h-full']):'',
                                            ];
                                            include get_component_path('page/our-service/service-card');
                                            ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden">
                <div class="flex items-center justify-center gap-6">
                    <button class="w-10 h-10 p-2 transition-all duration-300 rounded-full service-swiper-button-prev
                     bg-white disabled:text-grey text-darkgrey-500 disabled:!bg-shade-800 disabled:text-shade-500">
                        <?= get_icon('arrow-left') ?>
                    </button>
                    <button class="w-10 h-10 p-2 transition-all duration-300 rounded-full
                bg-white
                service-swiper-button-next disabled:text-grey text-darkgrey-500 disabled:!bg-shade-800 disabled:text-shade-500">
                        <?= get_icon('arrow-right') ?>
                    </button>
                </div>
            </div>
            <div id="scrolltop" class="scrolltop">
                <div class="block text-base font-medium leading-4 tracking-wide text-center text-white uppercase lg:hidden">
                    Swipe to browse
                </div>
            </div>
        </div>
    </div>
    <?php include_once get_component_path('global/modal-service-info/modal-service-info') ?>
    <?php include_once get_component_path('global/modal-service-get-started/modal-service-get-started') ?>
</section>