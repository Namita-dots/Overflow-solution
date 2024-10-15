<ul class="inline-flex items-center justify-center max-w-full space-x-24 marquee "
    x-data="Marquee({speed: 0.5, spaceX: 24, dynamicWidthElements: true})">
    <?php
    $marqueeSliderCount = isset($images) && !empty($images) ? count($images) : 0;
    $marqueeSliderMultiplier = $marqueeSliderCount <= 2 ? 8 : ($marqueeSliderCount <= 5 ? 3 : 1);
    $marqueeSliders = array_merge(...array_fill(0, $marqueeSliderMultiplier, $images));
    foreach ($marqueeSliders as $row): ?>
        <?php
        $atts = [
            'loading' => 'eager',
            'class' => 'w-auto object-cover h-14',
        ];
        $row['override_height'] = true;
        $row['height_mobile'] = 36;
        $row['height_desktop'] = 54;
        if (array_key_exists('override_height', $row) && $row['override_height']) {
            $atts['style'] = '--height-mobile: ' . $row['height_mobile'] . 'px;';
            $atts['style'] .= '--height-desktop: ' . $row['height_desktop'] . 'px;';
        }
        ?>
        <li class="flex-shrink-0">
            <?= get_img($row['image'], '240px', $atts) ?>
        </li>
    <?php endforeach; ?>
</ul>