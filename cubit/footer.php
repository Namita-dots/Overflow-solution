<?php
$fields = get_field('footer', 'option');
$logo = get_field('site_logo', 'option');

$site_logo = get_field('site_logo', 'option');
$socials = get_field('socials', 'option');

$company_email = get_field('company_email', 'option');
$company_phone = get_field('company_phone', 'option');
$company_address = get_field('company_address', 'option');
?>

</main>

<footer>
    <div class="bg-shade-900">
        <div class="container py-16 text-white">
            <div class="flex flex-wrap lg:flex-nowrap gap-x-8 lg:gap-x-10 gap-y-10 lg:gap-y-20">
                <!-- Logo Column -->
                <div class="flex-shrink-0 w-full lg:w-1/4">
                    <?= get_img($site_logo, '159px', ['class' => "object-contain"]) ?>
                </div>
                <!-- Menu Column 1 -->
                <div class="w-full lg:w-1/4">
                    <div class="flex flex-col gap-3">
                        <h3 class="text-xs font-medium leading-4 uppercase text-teal-light">
                            <?= $fields['menu_column']['title'] ?>
                        </h3>
                        <div class="space-y-4 text-base font-medium leading-6">
                            <?php foreach ($fields['menu_column']['menu_items'] as $menu) : ?>
                                <?php $link = $menu['button']['clone_button']['type'] == 'internal' ? $menu['button']['clone_button']['link_to']->url : $menu['button']['clone_button']['url']; ?>
                                <a href="<?= $link ?>" class="block py-2"><?= $menu['button']['clone_button']['text'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- Menu Column 2 -->
                <div class="w-full lg:w-1/4">
                    <div class="flex flex-col gap-3">
                        <h3 class="text-xs font-medium leading-4 uppercase text-teal-light">
                            <?= $fields['menu_column1']['title'] ?>
                        </h3>
                        <div class="space-y-4 text-base font-medium leading-6">
                            <?php foreach ($fields['menu_column1']['menu_items_1'] as $menu) : ?>
                                <?php $link = $menu['button']['clone_button']['type'] == 'internal' ? $menu['button']['clone_button']['link_to']->url : $menu['button']['clone_button']['url']; ?>
                                <a href="<?= $link ?>" class="block py-2"><?= $menu['button']['clone_button']['text'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Contact Column -->
                <div class="w-full lg:w-1/4">
                    <div class="flex flex-col gap-3">
                        <h3 class="text-xs font-medium leading-4 uppercase text-teal-light">
                            <?= $fields['contact_column']['title'] ?>
                        </h3>
                        <div class="flex flex-col gap-2 py-2 text-base font-medium lg:leading-8 sm:leading-10">
                            <span class="flex flex-col max-w-44">
                                <span><?= $company_address['title'] ?></span>
                            </span>
                            <a class="mt-4" href="tel:<?= $company_phone ?>"><?= $company_phone ?></a>
                            <?php
                            $button =  $fields['contact_column']['button']['internal_button'];
                            $button_styles = [
                                'size' => 'sm',
                                'button_type' => 'text',
                                'component_type' => 'link',
                                'class' => '!justify-start !px-0 !py-0',
                            ];
                            get_global_component_button($button, $button_styles);
                            ?>
                        </div>

                        <!-- Socials Column -->
                        <div class="w-full lg:w-1/5">
                            <div class="flex gap-4">
                                <?php foreach ($socials as $social) : ?>
                                    <a href="<?= $social['url'] ?>" target="_blank">
                                        <span class="inline-block w-6 h-6"><?= get_svg($social['type']) ?></span></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 text-white md:hidden">
                <div class="w-full py-2 text-left">
                    <?= str_replace('[year]', date('Y'), $fields['copyright_content']) ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>