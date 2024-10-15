<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abel&family=Poppins:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
  <link rel="preload" href="<?= get_stylesheet_directory_uri() ?>/dist/fonts/DMSans.woff" as="font" crossorigin="anonymous" />
  <link rel="preload" href="<?= get_stylesheet_directory_uri() ?>/dist/fonts/DMSans.woff2" as="font" crossorigin="anonymous" />
  <?php
  $logo = get_field('site_logo', 'option');
  $dark_site_logo = get_field('dark_site_logo', 'option');
  $company_phone = get_field('company_phone', 'option');

  ?>
  <?php wp_head(); ?>
  <style>
    [x-cloak] {
      display: none;
    }
  </style>
</head>

<body <?php body_class('bg-background relative overflow-x-hidden'); ?>>
  <?php
  $pad_content = true;
  global $pad_content;
  $template = get_page_template();
  $sticky_header = array_key_exists('sticky_header', $GLOBALS) ? $GLOBALS['sticky_header'] : false;
  $header_bg = array_key_exists('header_bg', $GLOBALS) && !empty($GLOBALS['header_bg']) ? $GLOBALS['header_bg'] : 'light';
  wp_body_open(); ?>
  <header>
    <div id="header-container" class="<?= $sticky_header ?> <?= $header_bg ? $header_bg : ''; ?> inset-x-0 top-0 z-20 transition-all duration-500">
      <div id="header" class="relative w-full bg-skin-light">
        <div class="container ">
          <div id="nav-container" class="flex items-center justify-between w-full">
            <div class="!px-0 flex items-center w-full py-4 sm:py-5 flex-0 flex-grow-0 mr-">
              <div class="pr-10 mr-auto">
                <?php if (strpos($template, 'contact') == false && !is_front_page()) :
                ?>
                  <a href="<?= home_url() ?>" class="inline-flex items-center justify-center w-32 h-12 my-auto dark lg:w-40 lg:h-12">
                    <?= get_img($dark_site_logo, '145px', ['class' => 'object-contain object-center']) ?>
                  </a>
                <?php else : ?>
                  <a href="<?= home_url() ?>" class="inline-flex items-center justify-center w-32 h-12 my-auto light lg:w-40 lg:h-12">
                    <?= get_img($logo, '145px', ['class' => 'object-contain object-center']) ?>
                  </a>
                <?php endif ?>
              </div>
              <?php get_template_part('components/global/header/desktop-menu/desktop-menu'); ?>
            </div>
            <div class="inline-flex items-center gap-3 -my-2 -mr-2 xl:hidden 2xl:hidden" x-data="Components.popover({ open: false, focus: true, preventScrolling: true })" @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">
              <a href="tel:<?= $company_phone ?>" class="text-white">
                <span class="w-5 h-5">
                  <?= get_svg('phone') ?>
                </span>
              </a>
              <div class="relative h-9 w-9">
                <button type="button" class="absolute inset-0 z-20 inline-flex items-center justify-center p-2 <?= (strpos($template, 'contact') == false && !is_front_page()) ? 'text-black' : 'text-white'; ?> bg-transparent rounded-full" @click="toggle($event); if (!open) $dispatch('close-mobile-menu')" @mousedown="if (open) $event.preventDefault()" aria-expanded="false" :aria-expanded="open.toString()">
                  <span class="sr-only">Open menu</span>
                  <div class="relative w-5 h-5" :class="opened && (open ? 'close' : 'open')">
                    <div class="top"></div>
                    <div class="middle"></div>
                    <div class="bottom"></div>
                  </div>
                </button>
              </div>
              <?php global $header_placeholder_class; ?>
              <?php $header_placeholder_class = ''; ?>
              <?php get_template_part('components/global/header/mobile-menu/mobile-menu'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div id="smooth-content" class="w-full overflow-hidden">
    <?php $pad_body = array_key_exists('pad_content', $GLOBALS) ? $GLOBALS['pad_content'] : false; ?>
    <div id="header-placeholder" class="<?= $header_placeholder_class ?> <?= isset($pad_body) && $pad_body ? 'pt-16' : '' ?>"></div>
    <main class="bg-shade-5">