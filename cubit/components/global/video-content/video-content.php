<?php //print_r($videos);?>
<div class="container" x-data="VideoContent()">
    <div class="grid grid-cols-1 lg:gap-x-2 gap-y-3">
      <div class="relative flex items-center bg-black ">
        <?php foreach ($videos['video'] as $i => $row) : ?>
          <div class="relative vide-w w-full h-0 pb-[56.25%] overflow-hidden media-video-container" x-show="index == <?= $i ?>" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0 h-0" x-transition:enter-end="opacity-100 h-full" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100 h-full" x-transition:leave-end="opacity-0 h-0">
            <div class="absolute inset-0 w-full h-full">
              <div class="absolute inset-0 w-full h-full" data-youtube-url="<?= $row['video'] ?>" x-ref="video<?= $i ?>" data-video-type="youtube"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php if (count($fields['video']) > 1) : ?>
        <div class="col-span-full">
          <div id="slider-container">
            <div class="hidden lg:block">
              <div class="overflow-hidden">
                <div class="relative swiper-container gg" pagination="true" pagination-type="progressbar" navigation="true" x-ref="swiperDesktop" data-count="<?= count($fields['video']) ?>">
                  <div class="swiper-wrapper">
                    <?php foreach ($videos['video'] as $i => $row) : ?>
                      <div class="swiper-slide" x-ref="videoSwiperElement">
                        <div class="aspect-[1.92] video-slider relative" x-bind:class="{ 'border-solid border-8 border-white' : index == <?= $i ?> }" x-on:click="index = <?= $i ?>">
                          <div class="absolute inset-0 w-full h-full transition-all bg-black" :class="{'bg-opacity-40': index != <?= $i ?>,'bg-opacity-0': index == <?= $i ?>}"></div>
                          <?= isset($row['video_thumbnail']) ? get_img($row['video_thumbnail'], '(max-width : 1024px) 100vw, 25vw') : '' ?>
                          <div class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 text-[#E9E9E9]" x-show="index != <?= $i ?>" x-cloak x-transition:enter="delay-300 ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300 order-first" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <?= get_svg('play') ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="absolute top-0 left-0 z-10 flex items-center justify-center w-16 h-full button-prev bg-gradient-to-r from-black to-transparent">
                    <div class="w-8 text-skin-light">
                      <?= get_svg('go-back') ?>
                    </div>
                  </div>
                  <div class="absolute top-0 right-0 z-10 flex items-center justify-center w-16 h-full button-next bg-gradient-to-r to-black from-transparent">
                    <div class="w-8 rotate-180 text-skin-light">
                      <?= get_svg('go-back') ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="block lg:hidden">
              <div class="overflow-hidden">
                <div class="relative swiper-container" x-ref="swiperMobile">
                  <div class="swiper-wrapper">
                    <?php foreach ($fields['video'] as $i => $row) : ?>
                      <div class="swiper-slide" x-ref="videoSwiperElement">
                        <div class="aspect-[1.92] video-slider relative" x-bind:class="{ 'border-solid border-8 border-white' : index == <?= $i ?> }" x-on:click="index = <?= $i ?>">
                          <div class="absolute inset-0 w-full h-full transition-all bg-black" :class="{'bg-opacity-40': index != <?= $i ?>,'bg-opacity-0': index == <?= $i ?>}"></div>
                          <?= isset($row['video_thumbnail']) ? get_img($row['video_thumbnail'], '(max-width : 1024px) 100vw, 25vw') : '' ?>
                          <div class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 text-[#E9E9E9]" x-show="index != <?= $i ?>" x-cloak x-transition:enter="delay-300 ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300 order-first" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <?= get_svg('play') ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="absolute top-0 left-0 z-10 flex items-center justify-center w-16 h-full button-prev bg-gradient-to-r from-black to-transparent">
                    <div class="w-8 text-skin-light">
                      <?= get_svg('go-back') ?>
                    </div>
                  </div>
                  <div class="absolute top-0 right-0 z-10 flex items-center justify-center w-16 h-full button-next bg-gradient-to-r to-black from-transparent">
                    <div class="w-8 rotate-180 text-skin-light">
                      <?= get_svg('go-back') ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>