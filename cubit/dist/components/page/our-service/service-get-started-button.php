<?php
    $fields = get_field('our_service', 'option');
    $button = [
        'text' => $fields['card_button_text']['get_started'],
    ];
    $info['step'] = 2;
    $button_styles = [
        'size' => 'lg',
        'button_type' => 'primary',
        'component_type' => 'button',
        'class' => 'flex-initial w-80 mt-3 mb-0 text-base',
        'attr' => '@click="$dispatch(\'service-get-started\', ' . json_encode_alpine($info) . ')"',
    ];
    get_global_component_button($button, $button_styles);
