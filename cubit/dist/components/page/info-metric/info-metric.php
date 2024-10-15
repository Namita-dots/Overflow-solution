<?php
$fields = get_field('our_metrics');
if ($fields) {
?>
  <section id="info-metric">
    <div class="py-10 text-wshade-off bg-darkgrey-500">
      <div class="container grid w-full grid-cols-1 gap-6 md:grid-cols-2 gap-x-32 gap-y-8">
        <div class="w-full max-w-2xl">
          <h3 class="py-2 text-sm font-normal uppercase">
            <?= $fields['subtitle'] ?>
          </h3>
          <h2 class="py-2 text-4xl font-normal">
            <?= $fields['title'] ?>
          </h2>
          <div class="my-4 prose text-white sm:prose-sm sm:mt-0 ">
            <?= $fields['content'] ?>
          </div>
          <?php if (get_field('google_review_text', 'option')) : ?>
            <div class="">
              <?= get_field('google_review_text', 'option') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="flex flex-col w-full gap-10">
          <?php foreach ($fields['metrics'] as $index => $field) : ?>
            <div class="relative lg:mt-0 md:my-5 sm:my-5">
              <div @click="activeIndex = <?= $index ?>">
                <div class="relative" x-ref="info_metric">
                  <div class="sm:max-w-sm">
                    <div class="relative flex flex-col justify-between h-full gap-3 text-wshade-off items-left">
                      <h2 class="text-4xl font-medium "><?= $field['metric'] ?></h2>
                      <div class="font-normal">
                        <?= $field['title'] ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php } ?>
  </section>