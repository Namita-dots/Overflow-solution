<?php
ob_start();
?>
<div id="modal-service-get-started">
    <div x-data="ModalServiceGetStarted()" @service-get-started.window="open = true; info=$event.detail;step=$event.detail.step;">
        <?php include get_component_path('global/modal-service-get-started/start'); ?>
        <div class="max-w-[calc(177.77vh-160px)] mx-auto aspect-w-16 aspect-h-9 relative">
            <?php include get_component_path('global/modal-service-get-started/content') ?>
        </div>
        <?php include get_component_path('global/modal-service-get-started/end'); ?>
    </div>
</div>
<?php
$modal = ob_get_clean();
add_action('wp_footer', function () use ($modal) {
    echo $modal;
});
?>