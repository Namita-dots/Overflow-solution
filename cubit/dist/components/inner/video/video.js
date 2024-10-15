var videos = []

document.addEventListener('alpine:init', () => {
  Alpine.data('Videoplay', ({ index = 1 } = {}) => ({
    index,
    init() {
      window.YT.ready(() => {
        const newPlayer = new YT.Player(this.$refs[`video${this.index}`], {
          width: '100%',
          height: '100%',
          videoId: extractVideoId(
            this.$refs[`video${this.index}`].dataset.youtubeUrl
          ),
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
                onReady: onPlayerReady
              }
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
