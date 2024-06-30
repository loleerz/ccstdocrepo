$(document).ready(function() { 
    // Slides
    var currentSlide, previousSlide, nextSlide;
    // Slides animation properties
    var opacity, left, scale; 
    // Check if the slide animation is happening (BUG fix)
    var inTransition = false;
    // Initialize Bootstrap Material Design
    // $('body').bootstrapMaterialDesign();

    /** Click functions **/
    // Previous button
    $('#prev-button').click(function(e) { 
       if (inTransition) { return; }
      
       // Current & previous step
       var current = $('.step-progress-bar').find('.current');
       var prev = current.prev();
       // Refresh current step
       if(current && prev && prev.length > 0) {
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
      
      // Current to success
      current.removeClass('current');
      // Timeout giving time to the animation to render
      setTimeout(function() { current.addClass('success'); }, 0);
      
      // Disabled to current 
      if(next && next.length > 0) {
        next.addClass('current'); 
        // Show next slide
        nextSlideFn();    
      }
    });
    
    function nextSlideFn() {  
       inTransition = true;
       currentSlide = $('.current-slide');
       nextSlide = currentSlide.next(); 
      
       nextSlide.show(); 
       currentSlide.animate({opacity: 0}, {
         step: function(now, mix) {
           scale = 1 - (1 - now) * 0.2;
           left = (now * 100) + '%'; 
           opacity = 1 - now;
           currentSlide.css({
             '-webkit-transform': 'scale(' + scale + ')',
             '-ms-transform': 'scale(' + scale + ')',
             'transform': 'scale(' + scale + ')'
           }); 
           nextSlide.css({
             '-webkit-transform': 'translateX(' + left + ')', 
             '-ms-transform': 'translateX(' + left + ')', 
             'transform': 'translateX(' + left + ')', 
             'opacity': opacity});
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
    }
    
    function prevSlideFn() {
       inTransition = true;
       currentSlide = $('.current-slide');
       previousSlide = currentSlide.prev(); 
      
       previousSlide.show(); 
       currentSlide.css({'position': 'absolute'});
       currentSlide.animate({opacity: 0}, {
         step: function(now, mix) {
           scale = 0.8 + (1 - now) * 0.2; 
           left = ((1 - now) * 50) + '%';
           opacity = 1 - now;
           currentSlide.css({
             '-webkit-transform': 'translateX(' + left + ')',
             '-ms-transform': 'translateX(' + left + ')',
             'transform': 'translateX(' + left + ')'
           });
           previousSlide.css({
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
           previousSlide.addClass('current-slide'); 
           previousSlide.css({'position': 'relative'});
           inTransition = false;
         },
         easing: 'linear'
       });
    }
});