var videos = []

const onYoutubeStateChanged = (event, container) => {
  if (event.data == 0) {
    const containerDiv = container.closest('.media-video-container')
    const overlayDiv = containerDiv.querySelector('.overlay-video-container')
    if (overlayDiv) {
      overlayDiv.classList.remove('hidden')
      overlayDiv.classList.add('overlay-content')
    }
  } else if (event.data == 2) {
    const containerDiv = container.closest('.media-video-container')
    const overlayDiv = containerDiv.querySelector('.overlay-video-container')
    if (overlayDiv) {
      overlayDiv.classList.add('hidden')
      overlayDiv.classList.remove('overlay-content')
    }
  }
}
document.addEventListener('alpine:init', () => {
  Alpine.data('VideoContent', ({ index = 0 } = {}) => ({
    index,
    init() {
      const elementCount = this.$refs?.swiperDesktop?.getAttribute('data-count')
      if (elementCount && elementCount > 1) {
        const swiperDesktop = new Swiper(this.$refs.swiperDesktop, {
          spaceBetween: 12,
          slidesPerView: elementCount < 4 ? elementCount : 4,
          loop: false,
          navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
          },
          slideToClickedSlide: true,
        })
        var player
        const swiperMobile = new Swiper(this.$refs.swiperMobile, {
          navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
            disabledClass: '!bg-green-dark !text-teal-900 !border-teal-900',
          },
        })

        swiperMobile.on('realIndexChange', swiper => {
          this.index = swiper.realIndex
        })
      }

      window.YT.ready(() => {
        const newPlayer = new YT.Player(this.$refs[`video${this.index}`], {
          width: '100%',
          height: '100%',
          videoId: extractVideoId(
            this.$refs[`video${this.index}`].dataset.youtubeUrl
          ),
          events: {
            onStateChange: event =>
              onYoutubeStateChanged(event, this.$refs[`video${index}`]),
          },
        })

        videos[this.index] = newPlayer
      })

      this.$watch('index', (newValue, oldValue) => {

        if (this.$refs[`video${oldValue}`]?.dataset?.videoType == 'youtube') {
          if (videos[oldValue]) {
            videos[oldValue]?.pauseVideo()
          }
        }

        if (this.$refs[`video${newValue}`]?.dataset?.videoType == 'youtube') {
          if (videos[newValue]) {
            videos[newValue]?.playVideo()
          } else {
            const newPlayer = new YT.Player(this.$refs[`video${newValue}`], {
              width: '100%',
              height: '100%',
              videoId: extractVideoId(
                this.$refs[`video${newValue}`].dataset.youtubeUrl
              ),
              events: {
                onReady: onPlayerReady,
                onStateChange: event =>
                  onYoutubeStateChanged(event, this.$refs[`video${newValue}`]),
              },
            })
            videos[newValue] = newPlayer
          }
        }
      })
    },
  }))
})

function extractVideoId(url) {
  // Regular expression to match YouTube URL patterns
  var regExp =
    /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=|v\/)|youtu\.be\/)([^#\&\?\/]{11})(?:[^\#\&\?]{1}|$)/

  // Extract the video ID using the regular expression
  var match = url.match(regExp)

  if (match && match[1]) {
    // Return the extracted video ID
    return match[1]
  } else {
    // Return null if the URL is not a valid YouTube URL
    return null
  }
}

function onPlayerReady(event) {
  event.target.playVideo()
}
