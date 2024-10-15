export default elementId => {
  // --- Parameters ---
  const navbar = document.getElementById('header-container') // Must have position: fixed
  const navbarHeader = document.getElementById('header')
  const threshold = 2 * navbarHeader.clientHeight // Number of px of space at the top of the page where the navbar won't disappear


  // How many pixels you have to scroll before navbar transitions
  const scrollDownThreshold = 25
  const scrollUpThreshold = 100
  // --- End Parameters ---

  const placeholder = document.getElementById('header-placeholder')

  // Give the DOM some time to render
  navbar.style.position = 'fixed'

  let trigger

  navbar.dataset.initialClass = navbar.getAttribute('class')
  const transition = window
    .getComputedStyle(navbar) 
    .getPropertyValue('transition')
  navbar.style.transition = [transition, '0.3s transform ease-in-out'].join(',')
  let previousScrollTop = 0
  let cumulativeAmountScrolledDown = 0
  let cumulativeAmountScrolledUp = 0

  window.addEventListener('scroll', () => {
    // The number of pixels the user has scrolled down from the top of the page
    const currentScrollTop =
      document.body.scrollTop || document.documentElement.scrollTop
      if(currentScrollTop < 100){
        slideNavbarUp()

      }else{
        slideNavbarDown()

      }

    previousScrollTop = currentScrollTop
  })

  const slideNavbarUp = () => {
    navbar.classList.remove('is-shown')
  }

  const slideNavbarDown = () => {
    navbar.style.transform = null
    navbar.classList.add('is-shown')
  }

  window.addEventListener('resize', () => {
  })
}