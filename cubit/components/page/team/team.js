document.addEventListener('alpine:init', () => {
    Alpine.data('team', () => ({
      hoverIndex: -1,
      init() {
        const swiper = new Swiper(this.$refs.swiperContainer, {         
          spaceBetween: 24,
          breakpoints: {
            360: {
              slidesPerView: 1,
              spaceBetween: 24,
            },
            640: {
              slidesPerView: 2,
              spaceBetween: 24,
            },
            1024: {
              spaceBetween: 24,
              slidesPerView: 3,
            },
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + '">' + "</span>";
            },
          },
          navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
          },
        })
        swiper.on('realIndexChange', swiper => {
          this.index = swiper.realIndex
        })
        this.$watch('hoverIndex', value => {
          console.log(value)
        })
      },
    }))
  })



     
   