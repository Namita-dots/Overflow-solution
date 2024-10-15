<?php
$what_we_do = get_field('what_we_do','option');
?>

<section id="what-we-do" class="what-we-do-sec">
  <div class="relative">
    <div class="container gap-16 py-20">
      <!-- Button Section -->
      <h4 class="font-medium leading-5 tracking-wider lg:text-sm sm:text-sm text-darkgrey"><?= $what_we_do['subtitle'] ?>
      </h4>
      
      <h2 class="w-56 py-3 text-2xl tracking-wide lg:text-4xl text-darkgrey-500 lg:font-semibold lg:w-auto">
      <?= $what_we_do['title'] ?>
            </h2>
      <div class="text-base font-normal leading-5 prose lg:py-2">
        <?= $what_we_do['description'] ?>
      </div>
      <div class="w-full gap-24 mt-10 md:w-2/3 ds-what-sec">
        <div class="flex flex-wrap items-center justify-center sm:flex-nowrap md:items-start">
          <?php foreach ($what_we_do['icons'] as $index => $card): ?>
            <div class="w-full sm:w-1/2 md:w-1/3 my-9 ds-what-inner-box">
              <div class="flex flex-col items-center md:items-start ">
                <div class="w-12 pb-1 md:w-28">
                  <?= get_img($card['image'], '(max-width : 540px) 95vw,(max-width: 1024px) 47vw,412px', ['class' => 'object-contain h-12 w-12 md:h-16 md:w-16']) ?>
                </div>
                <h2 class="mt-3 text-lg font-medium text-shade-95 text-darkgrey ">
                  <?= $card['title'] ?>
                </h2>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="lg:hidden md:hidden">
      <?php
      $button = $what_we_do['button']['clone_button'];
      $button_styles = [
        'size' => 'sm',
        'button_type' => 'primary',
        'attr' => '',
        'class' => '!w-full',
      ];
      include get_component_path('global/button/button');
      unset($button);
      unset($button_styles);
      ?>
    </div>
    <div class="absolute top-0 right-0 items-center justify-end hidden w-full h-full md:w-1/3 sm:flex">
      <div class="flex flex-col justify-center h-full">
        <?php
        $button = $what_we_do['button']['clone_button'];
        $button_styles = [
          'size' => 'sm',
          'button_type' => 'primary',
          'attr' => '',
          'class' => 'text-nowrap !max-w-max !h-full items-center',
        ];
        include get_component_path('global/button/button');
        unset($button);
        unset($button_styles);
        ?>
      </div>
    </div>
  </div>
</section>