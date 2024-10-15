<?php
$fields = get_field('videos');
?>
<section id="video-card">
  <div class="pt-10" x-data="videoCard()">
    <div class="container">
      <div class="relative mx-auto">
        <h2 class="pb-10 text-2xl leading-8 tracking-wide text-center md:pb-2 md:w-56 lg:text-4xl text-darkgrey-500 lg:font-semibold lg:w-auto" >
          <?= $fields['title'] ?>
        </h2>
        <div class="grid max-w-lg grid-cols-1 gap-5 mx-auto lg:mt-8 lg:grid-cols-3 lg:max-w-none" x-data="videoCard">
          <?php foreach ($fields['videos'] as $i => $video) {
            $videid = extractVideoId($video['video']);
          ?>
            <div class="aspect-[1.92]">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $videid; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <?php /***
         <div class="aspect-[1.92] relative video-card" data-video-id="<?= $videid ?>" x-bind:class="{ 'border-solid border-8 border-white': index == <?= $i ?> }" x-on:click="index = <?= $i ?>">
           <div class="absolute inset-0 w-full h-full transition-all bg-black bg-opacity-40"></div>
           <div class="block" :class="{ 'hidden' : index == <?= $i ?> }">
             <?= isset($video['thumbnail']) ? get_img($video['thumbnail'], '(max-width: 1024px) 100vw, 25vw') : '' ?>
           </div>
           <div class="hidden" :class="{ 'block' : index == <?= $i ?> }">
             <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videid; ?>" frameborder="0" allowfullscreen></iframe>
           </div>
           <div class="absolute inset-0 flex items-center justify-center video-frame"></div>
           <div class="pointer-cursor absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 text-[#E9E9E9]" x-show="index != <?= $i ?>" x-transition:enter="delay-300 ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300 order-first" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
             <?= get_svg('play') ?>
           </div>
         </div>
             **/ ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://www.youtube.com/iframe_api"></script>