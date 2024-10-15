<?php
$fields = get_field('team', 'option');
$section_id = 'team-grid';
?>
<section id="<?php echo $section_id; ?>">
    <div class="relative">
        <div class="container pt-10 pb-12 overflow-hidden">
            <?php $info = [
                'subtitle' => $fields['subtitle'],
                'title' => $fields['title'],
                'content' => $fields['description'],
            ];
            include get_component_inner_path('text-content-stacked');
            ?>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'our-team',
                'posts_per_page' => -1,
                'paged' => $paged,
                'orderby' => 'menu_order',
            );
            $tg_query = new WP_Query($args);
            if ($tg_query->have_posts()) {
                ?>
                <div class="grid w-full grid-cols-2 gap-6 lg:grid-cols-3">
                    <?php
                    $posts = $tg_query->posts;
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        $info = [
                            'post_id' => get_the_ID(),
                        ];
                        include get_component_path('page/team-grid/team-card');
                    }
                    ?>
                </div>
                <?php set_query_var('max_num_pages', $tg_query->max_num_pages); ?>
                <?php set_query_var('url_append', '#' . $section_id); ?>
                <?php get_template_part('components/global/pagination/pagination'); ?>
                <?php wp_reset_postdata(); ?>
            <?php } ?>
        </div>
    </div>
</section>
<?php include_once get_component_path('global/modal-member/modal-member') ?>