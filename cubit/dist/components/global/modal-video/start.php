<div @keydown.window.escape="open = false" x-show="open"
  class="fixed z-20 inset-0 px-4 sm:px-20 flex items-center bg-black media-video-container" role="dialog"
  aria-modal="true" x-cloak x-transition:enter="ease-out duration-300"
  x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
  x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
  x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
  x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
  <div class="absolute inset-0 bg-opacity-90" @click="open = false"></div>
  <button class="box-content absolute top-0 text-white right-0 w-10 h-10 p-4 hover:scale-125 transition-transform"
    @click="open = false">
    <?= get_icon('x') ?>
  </button>
  <div class="w-full select-none relative">
    <div class="absolute inset-0 w-full h-full overlay-content-div ">
    </div>