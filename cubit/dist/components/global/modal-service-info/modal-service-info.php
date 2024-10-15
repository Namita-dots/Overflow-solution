<?php
ob_start();
?>
<div id="modal-service-info">
    <div x-data="ModalServiceInfo()" @service-info-modal.window="open = true; info=$event.detail;step=$event.detail.step;">
        <?php include get_component_path('global/modal-service-info/start'); ?>
        <div class="max-w-[calc(177.77vh-160px)] mx-auto aspect-w-16 aspect-h-9 relative">
            <?php include get_component_path('global/modal-service-info/content') ?>
        </div>
        <?php include get_component_path('global/modal-service-info/end'); ?>
    </div>
</div>
<?php
$modal = ob_get_clean();
add_action('wp_footer', function () use ($modal) {
    echo $modal;
});
?>