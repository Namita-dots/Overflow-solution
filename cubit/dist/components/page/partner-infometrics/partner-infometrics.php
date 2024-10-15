<?php
$partner_infometrics = get_field('partner_infometrics');
// vdump($partner_infometrics);
?>

<section id="partner-infometrics" class="py-4 lg:py-20 border">
    <div class="container max-w-screen-lg px-4 lg:px-0">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($partner_infometrics as $index => $card): ?>
                <div
                    class="flex items-center <?= ($index < count($partner_infometrics) - 1) ? 'border-r' : '' ?> border-dark-gray">
                    <?= get_img($card['image'], '(max-width: 540px) 95vw, (max-width: 1024px) 47vw, 412px', ['class' => 'object-contain h-12 w-12 md:h-14 md:w-14']) ?>
                    <div class="prose py-4 px-4 team-base text-dark-gray">
                        <?= $card['content'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>