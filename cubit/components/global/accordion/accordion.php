<?php
global $accordion_index;
if (!isset($accordion_index)) {
  $accordion_index = 0;
}
$accordion_index += 1;
if (!isset($fields['open'])) {
  $fields['open'] = false;
}
$open = $fields['open'] ? 'true' : 'false';
?>

<div class="border-b border-black">
  <dt>
    <button type="button"
      class="flex items-center w-full pt-4 pb-3 font-semibold text-left transition-colors bg-gray focus:outline-none 4k:text-xl hover:text-gray-dark"
      @click="index = <?= $fields['index'] ?>; allCollapsed = false" aria-controls="accordion-<?= $accordion_index ?>"
      x-bind:aria-expanded="index == <?= $fields['index'] ?> ? 'true' : 'false'">
      <span class="flex-1">
        <?= $fields['title'] ?>
      </span>
      <?php if (!isset($hide_arrow) || $hide_arrow != true): ?>
        <span class="block w-6 h-6 ml-4 transition-transform duration-500 transform"
          :class="index == <?= $fields['index'] ?> && !allCollapsed && '-scale-y-100'">
          <?= get_icon('chevron-down') ?>
        </span>
      <?php endif; ?>
    </button>
  </dt>
  <dd id="accordion-<?= $accordion_index ?>" x-show="index == <?= $fields['index'] ?> && !allCollapsed"
    x-collapse.duration.500ms x-cloak>
    <div class="py-4 border-t border-black-300">
      <div class="max-w-full prose text-gray">
        <?= $fields['content'] ?>
      </div>
    </div>
  </dd>
</div>