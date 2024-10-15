<?php
$fields = get_field('team', 'option');
?>
<section id="team">
    <div class="relative">
        <div class="container pt-10 overflow-hidden lg:pt-20">
            <?php $info = [
                'subtitle' => $fields['subtitle'],
                'title' => $fields['title'],
                'content' => $fields['description'],
            ];
            include get_component_inner_path('text-content-stacked');
            ?>
            <?php if (isset($fields['teams']) && count($fields['teams']) > 0): ?>
                <div class="flex flex-wrap sm:justify-center lg:justify-start lg:my-7 sm:my-1">
                    <div class="w-full my-3" x-data="team()">
                        <div class="swiper-container swiper" x-ref="swiperContainer">
                            <div class="flex swiper-wrapper">
                                <?php
                                $team_count = 0;
                                foreach ($fields['teams'] as $team):
                                    $team = $team['teams'];
                                    $is_mobile_visible = ($team_count == 0);
                                    $info = [
                                        'post_id' => $team->ID,
                                        'title' => $team->post_title,
                                        'team_count' => $team_count,
                                    ];
                                    include get_component_path('page/team/team-card');
                                    $team_count++;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div id="scrolltop" class="scrolltop">
                <div
                    class="mb-5 text-base font-medium leading-4 tracking-wide text-center uppercase lg:hidden sm:block">
                    Swipe to browse
                </div>
            </div>
        </div>
        <div class="lg:hidden">
            <?php
            $fields = get_field('team', 'option');
            $button = $fields['button']['clone_button'];
            $button_styles = [
                'size' => 'sm',
                'button_type' => 'primary',
                'attr' => '',
                'class' => '!w-full',
            ];
            get_global_component_button($button, $button_styles);
            ?>
        </div>
        <div class="absolute top-0 right-0 z-10 items-center justify-end hidden h-full flex-0 lg:flex">
            <div class="flex flex-col justify-center w-full h-full">
                <?php
                $button = $fields['button']['clone_button'];
                $button_styles = [
                    'size' => 'sm',
                    'button_type' => 'primary',
                    'attr' => '',
                    'class' => 'text-nowrap !max-w-max !h-full items-center',
                ];
                get_global_component_button($button, $button_styles);
                ?>
            </div>
        </div>
    </div>
    <?php include_once get_component_path('global/modal-member/modal-member') ?>
</section>