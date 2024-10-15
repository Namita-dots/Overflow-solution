document.addEventListener('alpine:init', () => {
  Alpine.data('ModalVideo', () => ({
    open: false,
    init() {
      let player;
      
      this.$watch('open', open => {
        if (open) {
          this.$dispatch('stop-banner-video');

          this.$refs.modalVideoPlayer.play();
        } else {
          this.$dispatch('play-banner-video');

          this.$refs.modalVideoPlayer.pause();

        }
      })
    },
  }))
})