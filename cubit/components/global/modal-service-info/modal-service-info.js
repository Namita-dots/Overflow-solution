document.addEventListener('alpine:init', () => {
  Alpine.data('ModalServiceInfo', () => ({
    open: false,
    info: null,
    step: 1,
    sanitizeHTML(html) {
      // Sanitize HTML content here
      // Example using DOMPurify (you need to include it in your project)
      return DOMPurify.sanitize(html);
    }
  }))
})