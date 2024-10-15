document.addEventListener('alpine:init', () => {
  Alpine.data('Banner', () => ({
    isPlaying: false,
    showThumbnail: true,
    openModal: '',
    init() {
      if(this.$refs.videoPlayer){
        if(innerWidth > 1024){
          this.playVideo()
        }
        window.onresize = () => {
            if(innerWidth < 1024){
                this.stopVideo()
            }else{
                this.playVideo();
            }
        }
        this.$refs.videoPlayer.addEventListener('play' ,() => {
            this.showThumbnail = false
            this.isPlaying = true
        })
        this.$refs.videoPlayer.addEventListener('pause' ,() => {
            this.showThumbnail = true
            this.isPlaying = false
        })
      }
    },
    playVideoMedia(){
      if(innerWidth > 1024){
          this.playVideo()
      }
    },
    playVideo(){
      this.$refs.videoPlayer.play();
    },
    stopVideo(){
      this.$refs.videoPlayer.pause();
    },
    play() {
      this.$refs.videoPlayer.play();
    },
    pause() {
      this.$refs.videoPlayer.pause();
    }
  }));
});
