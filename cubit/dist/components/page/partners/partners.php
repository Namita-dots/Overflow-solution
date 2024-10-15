<?php
$partners = get_field('partners');
?>
<section id="partners">
  <div class="container pt-10 pb-10 lg:pt-20">
    <!-- Button Section -->
    <h4 class="font-medium leading-4 tracking-wider sm:text-sm lg:text-sm lg:uppercase text-darkgrey-500">
      <?= $partners['subtitle'] ?>
    </h4>

    <h2 class="max-w-2xl py-3 text-2xl leading-8 tracking-wide lg:text-4xl text-darkgrey-500 lg:font-semibold w-76 lg:w-auto">
      <?= $partners['title'] ?>
    </h2>
    <div class="py-2 text-base font-normal leading-6 text-darkgrey-500">
      <?= $partners['description'] ?>
    </div>
    <div class="grid grid-cols-1 gap-12 mt-10 md:grid-cols-3 my-9">
      <!-- Content Section -->
      <?php $inc = 0;
      foreach ($partners['partners_logo'] as $index => $card): ?>
        <?php if ($card['show_adtitle']): ?>
          <a href="<?= esc_url($card['adlink']); ?>">
          <?php endif; ?>
          <div class="h-auto flex flex-col bg-white py-4 px-4 justify-center rounded-tr-[48px] <?= $card['show_button'] && $card['show_description'] ? 'lg:row-span-2' : ''; ?>">
            <div class="relative mx-auto mt-3 h-11">
              <?= get_img($card['image'], '(max-width : 540px) 95vw,(max-width: 1024px) 47vw,412px', ['class' => 'object-contain']) ?>
            </div>
            <div class="items-start mt-8">
              <?php if ($card['show_description']): ?>
                <div class="p-2 prose"><?= $card['description'] ?></div>
              <?php endif; ?>
            </div>
            <div class="flex items-start justify-between mt-4">
              <?php if ($card['show_title']): ?>
                <div class="p-2 text-2xl leading-8"><?= $card['title'] ?></div>
              <?php endif; ?>
              <?php if ($card['show_adtitle']): ?>
                <div class="p-2 mb-3 -mt-12 text-white bg-black-300"><?= $card['adtitle'] ?></div>
              <?php endif; ?>
            </div>
            <div>
              <?php
              if ($card['show_button']) {
                $button = $card['button']['clone_button'];
                $button_styles = [
                  'size' => 'lg',
                  'button_type' => 'black', // Default button type
                  'attr' => '',
                  'class' => 'text-nowrap !max-w-full items-center !bg-shade-500',
                ];

                // class for mobile screens
                $mobile_button_styles = [
                  'class' => 'bg-teal-default text-base text-white md:bg-shade-500 md:hover:!bg-black md:text-white',
                ];
                // Merge mobile styles with default button styles
                $button_styles['class'] .= ' ' . $mobile_button_styles['class'];

                include get_component_path('global/button/button');
                unset($button);
                unset($button_styles);
              }
              ?>
            </div>
          </div>
          <?php if ($card['show_adtitle']): ?>
          </a>
        <?php endif; ?>
        <?php $inc++;
      endforeach; ?>
    </div>
  </div>
</section>