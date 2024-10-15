<div id="text-content-stacked-center" class="banner-txt-sec">
  <div class="4k:mx-4 md:mx-0">
    <div class="gap-8 text-center">
      <h4 class="font-medium leading-5 tracking-wider lg:text-sm sm:text-sm text-darkgrey">
        <?= is_array($info['subtitle']) ? implode(', ', $info['subtitle']) : $info['subtitle'] ?>
      </h4>
      <h2 class="w-full py-3 text-2xl leading-8 tracking-wide md:w-56 lg:text-4xl text-darkgrey-500 lg:font-semibold lg:w-auto">
        <?= $info['title'] ?>
      </h2>
      <div class="gap-16 py-2 mx-auto mb-5 leading-5 prose team-base"><?= $info['content'] ?></div>
    </div>
  </div>
</div>