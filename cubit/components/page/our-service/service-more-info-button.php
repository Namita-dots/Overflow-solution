<?php
$fields = get_field('our_service','option');
$button = [
    'text' => $fields['card_button_text']['more_info'],
];
$info['step'] = 1;
$button_styles = [
    'size' => 'lg',
    'button_type' => '',
    'component_type' => 'button',
    'class' => ' flex-initial w-32 mb-0 text-base mx-auto',
    'attr' => ' @click="$dispatch(\'service-info-modal\', ' . json_encode_alpine($info) . ')"',
];
get_global_component_button($button, $button_styles);
