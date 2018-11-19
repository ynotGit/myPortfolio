//Click on Nav Logo to return to top on window
$('.logo-scroll').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
 });

//Smooth Anchor click
$(document).ready(function(){

  //select all links
  $("a").on('click', function(event) {

    if (this.hash !== "") {
      // stops default behaviour
      event.preventDefault();

      var hash = this.hash;
      //change 800 to play with animation speed
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }
  });
});

//Panel Settings on Projects Section
const panels = document.querySelectorAll('.panel');

function toggleOpen() {
  this.classList.toggle('open');
}

function toggleActive(e) {
  if (e.propertyName.includes('flex')) {
    this.classList.toggle('open-active');
  }
}

panels.forEach(panel => panel.addEventListener('click', toggleOpen));
panels.forEach(panel => panel.addEventListener('transitionend', toggleActive));
