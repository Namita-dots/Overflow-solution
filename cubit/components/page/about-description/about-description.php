<?php
$fields = get_field('about_details');
$info = [
    'subtitle' => isset($fields['subtitle']) ? $fields['subtitle'] : '',
    'title' => isset($fields['title']) ? $fields['title'] : '',
    'content' => isset($fields['content']) ? $fields['content'] : '',
];
$video = $fields['video_url'];

?>

<section id="about-us">
    <div class="mx-auto max-w-7xl">
        <?php include get_component_inner_path('text-content-50-50'); ?>
        <?php include get_component_inner_path('video'); ?>
    </div>
</section>