document.addEventListener('alpine:init', () => {
  document.addEventListener('wpcf7mailsent', function (event) {
    window.dispatchEvent(new CustomEvent('cf7-submitted'));
  });

  Alpine.data('ModalServiceGetStarted', () => ({
    open: false,
    info: null,
    step: 1,
    service_requested: '',
    formSubmitted: false,
    sanitizeHTML(html) {
      // Sanitize HTML content here
      // Example using DOMPurify (you need to include it in your project)
      return DOMPurify.sanitize(html);
    },
    submit() {
      const service_requested = document.querySelector('.service-requested')
      service_requested.value = this.info ? this.info.title : 'asdsd';
      const submitButton = document.querySelector('#default-contact-submit')
      if (submitButton) {

        submitButton.click();

        window.addEventListener('cf7-submitted', () => {
          this.formSubmitted = true;
          this.step += 1;
        })
      }
    },
    init() {

      window.addEventListener('cf7-submitted', () => {
        this.formSubmitted = true;
        this.step += 1;
      })
    }
  }))
})