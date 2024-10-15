<div id="text-content-stacked">
  <div>
    <div class="gap-8 text-darkgrey-500">
      <h4 class="font-medium leading-5 tracking-wider lg:text-sm sm:text-sm text-darkgrey">
        <?= is_array($info['subtitle']) ? implode(', ', $info['subtitle']) : $info['subtitle'] ?>
      </h4>
      <h2 class="py-3 text-2xl leading-8 tracking-wide md:w-56 lg:text-4xl text-darkgrey-500 lg:font-semibold lg:w-auto">
        <?= $info['title'] ?>
      </h2>
      <div class="!max-w-none py-2 mb-5 leading-5 prose team-base"><?= $info['content'] ?></div>
    </div>
  </div>
</div>