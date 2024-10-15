<?php
$contact_form = get_field('contact_form', 'option');
$google_map = get_field('google_map', 'option');
$company_address = get_field('company_address', 'option');
?>
<section id="contact-us">
    <div class="grid w-full grid-cols-1 py-12 bg-shade-dark-gray lg:grid-cols-12 md:py-0">
        <!-- Image column -->
        <div class="hidden w-full h-full lg:block lg:col-span-5">
            <?= get_img($contact_form['image'], '41vw', ['class' => 'grayscale object-cover w-full h-full']) ?>
        </div>
        <!-- Form column -->
        <div class="flex items-center justify-center h-full col-span-1 lg:col-span-7 lg:px-12 sm:px-12 md:py-20">
            <div class="container flex items-center h-full ml-0">
                <div class="flex flex-col items-start w-full max-w-4xl space-y-4">
                    <h2 class="text-4xl font-medium text-white"><?= $contact_form['title'] ?></h2>
                    <div class="prose prose-white !mt-4">
                        <?= $contact_form['description'] ?>
                    </div>
                    <div class="w-full">
                        <?= do_shortcode($contact_form['form']['short_code']) ?>
                    </div>
                    <?php $template = get_page_template();
                    if (strpos($template, 'contact') !== false) : ?>
                        <hr class="z-20 w-full border-b-[1px] border-shade-400"/>
                        <div class="text-white">
                            <h4 class="pb-6 text-4xl">Our Office</h4>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 max-w-40 sm:max-w-fit">
                                <div class="flex flex-col">
                                    <h6 class="my-2 font-medium"><?php echo $company_address['subtitle']; ?></h6>
                                    <h6><?php echo $company_address['title']; ?></h6>
                                </div>
                                <?php if ($company_address['additional_address']) {
                                    foreach ($company_address['additional_address'] as $key => $value) { ?>
                                        <div class="flex flex-col">
                                            <h6 class="my-2 font-medium"><?php echo $value['subtitle']; ?></h6>
                                            <h6><?php echo $value['title']; ?></h6>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="w-full my-8 min-h-72">
                                <?php
                                $custom_height = '300px';
                                $custom_width = '100%';
                                if ($google_map) :
                                    $google_map = preg_replace('/(width|height)="[^"]*"/i', '', $google_map);
                                    $google_map = str_replace('<iframe', '<iframe width="' . esc_attr($custom_width) . '" height="' . esc_attr($custom_height) . '"', $google_map);
                                    echo $google_map;
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>