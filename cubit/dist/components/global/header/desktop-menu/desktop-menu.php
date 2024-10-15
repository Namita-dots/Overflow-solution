<nav class="justify-center hidden gap-6 flex-0 2xl:flex xl:items-center" x-data="Components.popoverGroup()">
  <?php
  global $template;
  $menu_color = is_front_page() || basename($template) === 'page-contact-us.php' ? 'text-white' : 'text-black';
  $args = [
    'theme_location' => 'header',
    'a_class' => 'relative p-3 font-medium leading-5 after:content-[\'\'] after:absolute after:bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 hover:after:w-[calc(100%-32px)] after:h-px after:bg-current after:transition-all ' . $menu_color . ' desktop-menu-a transition-colors',
    'a_active_class' => 'after:w-[calc(100%-32px)]',
    'button_container_class' => 'relative ',
    'button_class' => ' inline-flex  gap-2 relative px-4 py-2 font-medium leading-5 after:content-[\'\'] after:absolute after:bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 hover:after:w-[calc(100%-32px)] after:h-px after:bg-current after:transition-all group ' . $menu_color . ' desktop-menu-button transition-colors',
    'button_active_class' => 'after:w-[calc(100%-32px)]',
    'sub_menu_class' => 'absolute text-stone-900 z-20 ml-[-26px] top-full p-3 w-screen max-w-xs overflow-hidden bg-skin-light bg-stone-100 flex flex-col items-start rounded',
    'sub_menu_a_class' => 'relative w-full max flex justify-between align-middle p-3 text-sm leading-5 hover:font-medium after:content-[\'\'] after:absolute after:bottom-1.5 after:left-3 after:w-0 hover:after:w-[calc(50%-40px)] after:h-px after:bg-current after:transition-all',
    'sub_menu_a_active_class' => 'font-medium after:w-[calc(50%-40px)]',
    'sub_menu_1_a_class' => 'ml-4',
    '',
  ];

  $company_phone = get_field('company_phone', 'option');
  $header = get_field('header', 'option');
  ?>
  <?php $header = get_field('header', 'option') ?>
  <?php wp_nav_menu($args); ?>
  <div class="items-center hidden gap-6 ml-auto xl:flex">
    <div class="hidden lg:block flex-0 ">
      <?php
      $button = $header['primary_button']['clone_button'];
      $button_styles = [
        'size' => 'sm',
        'button_type' => 'outline',
      ];
      get_global_component_button($button, $button_styles);
      ?>
    </div>
    <div>
    <a href="tel:<?= $company_phone ?>" class="flex justify-center px-4 py-4 overflow-hidden font-normal text-white transition duration-300 ease-out border bg-teal-default hover:bg-teal-dark border-teal-default hover:text-white text-nowrap flex-0 lg:text-lg sm:text-base">
        <?= $company_phone ?>
      </a>
    </div>
  </div>
</nav>