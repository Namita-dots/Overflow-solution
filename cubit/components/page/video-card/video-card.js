document.addEventListener('alpine:init', () => {
    Alpine.data('videoCard', ({ index = -1 } = {}) => ({
        index,
        players: [],

        init() {
            this.$watch('index', value => {
                if (value !== -1) {
                    this.playVideo(value);
                }
            });
        },

        playVideo(idx) {
            // Pause all other players
            this.players.forEach((player, i) => {
                if (i !== idx) {
                    player.pauseVideo();
                }
            });

            // Play the selected video
            if (this.players[idx]) {
                this.players[idx].playVideo();
            }
        },

        extractVideoId(url) {
            var regExp = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=|v\/)|youtu\.be\/)([^#\&\?\/]{11})(?:[^\#\&\?]{1}|$)/;
            var match = url.match(regExp);
            return match && match[1] ? match[1] : null;
        },

        createIframe(videoId, idx) {
            const iframe = document.createElement('iframe');
            iframe.src = `https://www.youtube.com/embed/${videoId}?enablejsapi=1`;
            iframe.width = '100%';
            iframe.height = '100%';
            iframe.frameBorder = '0';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            document.querySelectorAll('.video-frame')[idx].appendChild(iframe);

            const player = new YT.Player(iframe, {
                events: {
                    'onReady': (event) => {
                        this.players[idx] = event.target;
                        event.target.playVideo();
                    }
                }
            });
        }
    }));
});

function onYouTubeIframeAPIReady() {
    document.querySelectorAll('.video-card').forEach((el, index) => {
        const videoId = el.getAttribute('data-video-id');
        el.__x.$data.createIframe(videoId, index);
    });
}
