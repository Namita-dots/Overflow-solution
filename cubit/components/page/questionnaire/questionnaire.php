<?php
$questionnaire_form = get_field('questionnaire_form', 'option');
vdump($questionnaire_form);
?>
<section id="questionnaire" class="w-full">
    <div class="bg-shade-dark-gray ">
        <h2 class="text-4xl font-medium text-white"><?= $questionnaire_form['title'] ?></h2>
        <div class="prose prose-white ">
            <?= $questionnaire_form['content'] ?>
        </div>
        <div class="w-full py-4 lg:py-2">
            <?= do_shortcode($questionnaire_form['form']['shortcode']) ?>
        </div>
    </div>
</section>