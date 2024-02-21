$(document).ready(function() {

   
        
  // Hamberger icon Click : open menu and overlay
  
  
  $(".hamburger-menu").click(function(){
      $(".collapse-menu").toggleClass("collapse-menu-open");
      $(".menu-overlay").toggleClass("collapse-overlay");
      $("body").toggleClass("overflow-hidden");        
  });

  // Menu overlay : close menu and overlay
  
  $(".menu-overlay").click(function(){
      $(".collapse-menu").toggleClass("collapse-menu-open");
      $(".menu-overlay").toggleClass("collapse-overlay");
      $("body").toggleClass("overflow-hidden");        
  });


  // Close icon click : close menu and overlay

  $(".colapse-close").click(function(){
      $(".collapse-menu").toggleClass("collapse-menu-open");
      $(".menu-overlay").toggleClass("collapse-overlay");
      $("body").toggleClass("overflow-hidden");
      
  });



  $('.icon-wishlist').on('click', function(){
    $(this).toggleClass('in-wishlist');
  });

  // slider
  var owl = $('.explore-category-slider');
  owl.owlCarousel({
    margin: 10,
    nav: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1024: {
        items: 4
      },
      1366: {
        items: 5
      }
    }
  })

  var owl = $('.feature-product-slider');
  owl.owlCarousel({
    margin: 30,
    nav: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1024: {
        items: 3
      },
      1366: {
        items: 4
      }
    }
  })

  var owl = $('.chirpy-treat-slider');
  owl.owlCarousel({
    margin: 30,
    nav: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1
      },
      1024: {
        items: 2
      },
      1366: {
        items: 3
      }
    }
  })

  var owl = $('.pets-in-action-slider');
  owl.owlCarousel({
    margin: 30,
    nav: true,
    loop: true,
    video:true,
    lazyLoad:true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  })

  $('.testimonial-slider').owlCarousel({
    items: 1,
    loop:true,
    margin:10,
    nav:true,
})

$('.insta-slider').owlCarousel({
  center: true,
  items:2,
  loop:true,
  margin:10,
  responsive:{
      600:{
          items:4
      },
      1024: {
        items: 6
      },
      1366: {
        items: 9
      }
  }
});

document.addEventListener("DOMContentLoaded", function(){
  // make it as accordion for smaller screens
  if (window.innerWidth < 1365) {
  
    // close all inner dropdowns when parent is closed
    document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
      everydropdown.addEventListener('hidden.bs.dropdown', function () {
        // after dropdown is hidden, then find all submenus
          this.querySelectorAll('.submenu').forEach(function(everysubmenu){
            // hide every submenu as well
            everysubmenu.style.display = 'none';
          });
      })
    });
  
    document.querySelectorAll('.dropdown-menu a').forEach(function(element){
      element.addEventListener('click', function (e) {
          let nextEl = this.nextElementSibling;
          if(nextEl && nextEl.classList.contains('submenu')) {	
            // prevent opening link if link needs to open dropdown
            e.preventDefault();
            if(nextEl.style.display == 'block'){
              nextEl.style.display = 'none';
            } else {
              nextEl.style.display = 'block';
            }
  
          }
      });
    })
  }
  // end if innerWidth
  }); 
  // DOMContentLoaded  end

  /*-- back to top --*/
  
  jQuery(document).ready(function($){
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
      //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
      offset_opacity = 1200,
      //duration of the top scrolling animation (in ms)
      scroll_top_duration = 700,
      //grab the "back to top" link
      $back_to_top = $('.cd-top');
  
    //hide or show the "back to top" link
    $(window).scroll(function(){
      ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
      if( $(this).scrollTop() > offset_opacity ) { 
        $back_to_top.addClass('cd-fade-out');
      }
    });
  
    //smooth scroll to top
    $back_to_top.on('click', function(event){
      event.preventDefault();
      $('body,html').animate({
        scrollTop: 0 ,
         }, scroll_top_duration
      );
    });

  });

});