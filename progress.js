$(document).ready(function() { 
  // Slides
  var slides = $('.slide');
  var currentSlideIndex = 0;
  var stepItems = $('.step-item');
  var inTransition = false;

  /** Click functions **/
  // Previous button
  $('#prev-button').click(function(e) { 
      if (inTransition) { return; }
      
      // Current & previous step
      var current = $('.step-progress-bar').find('.current');
      var prev = current.prev();
      
      // Refresh current step
      if (current && prev && prev.length > 0) {
          current.removeClass('current'); 
          prev.removeClass('success');
          prev.addClass('current'); 
          
          // Show prev slide
          prevSlideFn();
      }
  });

  // Next button
  $('#next-button').click(function(e) {
      if (inTransition) { return; }
      
      var current = $('.step-progress-bar').find('.current');
      var next = current.next(); 
      
      // Validate current slide
      if ($('#next-button').text() === 'Submit') {
          if (validateCurrentSlide()) {
              $('form').submit();
          }
      } else {
          if (validateCurrentSlide()) {
              // Current to success
              current.removeClass('current');
              // Timeout giving time to the animation to render
              setTimeout(function() { current.addClass('success'); }, 0);
              
              // Disabled to current 
              if (next && next.length > 0) {
                  next.addClass('current'); 
                  // Show next slide
                  nextSlideFn();    
              }
          }
      }
  });
  
  function validateCurrentSlide() {
      var currentSlide = slides.eq(currentSlideIndex);
      var inputs = currentSlide.find('input[required], select[required], input[type="checkbox"][required]');
      var valid = true;
      
      inputs.each(function() {
          if ($(this).is('input[type="checkbox"]')) {
              if (!$(this).prop('checked')) {
                  valid = false;
                  $(this).addClass('is-invalid');
              } else {
                  $(this).removeClass('is-invalid');
              }
          } else if ($(this).is('select')) {
              if (!$(this).val()) { // Check if no option is selected
                  valid = false;
                  $(this).addClass('is-invalid');
              } else {
                  $(this).removeClass('is-invalid');
              }
          } else {
              if (!$(this).val().trim()) {
                  valid = false;
                  $(this).addClass('is-invalid');
              } else {
                  $(this).removeClass('is-invalid');
              }
          }
      });
      
      return valid;
  }
  
  function nextSlideFn() {  
      inTransition = true;
      var currentSlide = slides.eq(currentSlideIndex);
      var nextSlide = slides.eq(currentSlideIndex + 1); 
      
      nextSlide.show(); 
      currentSlide.animate({opacity: 0}, {
          step: function(now, mix) {
              var scale = 1 - (1 - now) * 0.2;
              var left = (now * 100) + '%'; 
              var opacity = 1 - now;
              
              currentSlide.css({
                  '-webkit-transform': 'scale(' + scale + ')',
                  '-ms-transform': 'scale(' + scale + ')',
                  'transform': 'scale(' + scale + ')'
              }); 
              
              nextSlide.css({
                  '-webkit-transform': 'translateX(' + left + ')', 
                  '-ms-transform': 'translateX(' + left + ')', 
                  'transform': 'translateX(' + left + ')', 
                  'opacity': opacity
              });
          },
          duration: 250,
          complete: function() { 
              currentSlide.hide();
              currentSlide.removeClass('current-slide'); 
              nextSlide.addClass('current-slide'); 
              nextSlide.css({'position': 'relative'});
              inTransition = false;
          },
          easing: 'linear' 
      });
      
      currentSlideIndex++;
      updateNavigation();
  }
  
  function prevSlideFn() {
      inTransition = true;
      var currentSlide = slides.eq(currentSlideIndex);
      var prevSlide = slides.eq(currentSlideIndex - 1); 
      
      prevSlide.show(); 
      currentSlide.css({'position': 'absolute'});
      currentSlide.animate({opacity: 0}, {
          step: function(now, mix) {
              var scale = 0.8 + (1 - now) * 0.2; 
              var left = ((1 - now) * 50) + '%';
              var opacity = 1 - now;
              
              currentSlide.css({
                  '-webkit-transform': 'translateX(' + left + ')',
                  '-ms-transform': 'translateX(' + left + ')',
                  'transform': 'translateX(' + left + ')'
              });
              
              prevSlide.css({
                  '-webkit-transform': 'scale(' + scale + ')', 
                  '-ms-transform': 'scale(' + scale + ')', 
                  'transform': 'scale(' + scale + ')', 
                  'opacity': opacity
              });
          },
          duration: 250,
          complete: function() { 
              currentSlide.hide();
              currentSlide.removeClass('current-slide');
              prevSlide.addClass('current-slide'); 
              prevSlide.css({'position': 'relative'});
              inTransition = false;
          },
          easing: 'linear'
      });
      
      currentSlideIndex--;
      updateNavigation();
  }
  
  function updateNavigation() {
      $('#prev-button').toggle(currentSlideIndex > 0);
      $('#next-button').text(currentSlideIndex === slides.length - 1 ? 'Submit' : 'Next');
      stepItems.removeClass('current success');
      stepItems.eq(currentSlideIndex).addClass('current');
      stepItems.slice(0, currentSlideIndex).addClass('success');
  }
  
  updateNavigation();
});