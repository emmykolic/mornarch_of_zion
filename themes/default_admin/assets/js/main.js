/**
 * Main
 */

'use strict';

let menu, animate;

(function () {
  // Initialize menu
  //-----------------

  let layoutMenuEl = document.querySelectorAll('#layout-menu');
  layoutMenuEl.forEach(function (element) {
    menu = new Menu(element, {
      orientation: 'vertical',
      closeChildren: false
    });
    // Change parameter to true if you want scroll animation
    window.Helpers.scrollToActive((animate = false));
    window.Helpers.mainMenu = menu;
  });

  // Initialize menu togglers and bind click on each
  let menuToggler = document.querySelectorAll('.layout-menu-toggle');
  menuToggler.forEach(item => {
    item.addEventListener('click', event => {
      event.preventDefault();
      window.Helpers.toggleCollapsed();
    });
  });

  // Display menu toggle (layout-menu-toggle) on hover with delay
  let delay = function (elem, callback) {
    let timeout = null;
    elem.onmouseenter = function () {
      // Set timeout to be a timer which will invoke callback after 300ms (not for small screen)
      if (!Helpers.isSmallScreen()) {
        timeout = setTimeout(callback, 300);
      } else {
        timeout = setTimeout(callback, 0);
      }
    };

    elem.onmouseleave = function () {
      // Clear any timers set to timeout
      document.querySelector('.layout-menu-toggle').classList.remove('d-block');
      clearTimeout(timeout);
    };
  };
  if (document.getElementById('layout-menu')) {
    delay(document.getElementById('layout-menu'), function () {
      // not for small screen
      if (!Helpers.isSmallScreen()) {
        document.querySelector('.layout-menu-toggle').classList.add('d-block');
      }
    });
  }

  // Display in main menu when menu scrolls
  let menuInnerContainer = document.getElementsByClassName('menu-inner'),
    menuInnerShadow = document.getElementsByClassName('menu-inner-shadow')[0];
  if (menuInnerContainer.length > 0 && menuInnerShadow) {
    menuInnerContainer[0].addEventListener('ps-scroll-y', function () {
      if (this.querySelector('.ps__thumb-y').offsetTop) {
        menuInnerShadow.style.display = 'block';
      } else {
        menuInnerShadow.style.display = 'none';
      }
    });
  }

  // Init helpers & misc
  // --------------------

  // Init BS Tooltip
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Accordion active class
  const accordionActiveFunction = function (e) {
    if (e.type == 'show.bs.collapse' || e.type == 'show.bs.collapse') {
      e.target.closest('.accordion-item').classList.add('active');
    } else {
      e.target.closest('.accordion-item').classList.remove('active');
    }
  };

  const accordionTriggerList = [].slice.call(document.querySelectorAll('.accordion'));
  const accordionList = accordionTriggerList.map(function (accordionTriggerEl) {
    accordionTriggerEl.addEventListener('show.bs.collapse', accordionActiveFunction);
    accordionTriggerEl.addEventListener('hide.bs.collapse', accordionActiveFunction);
  });

  // Auto update layout based on screen size
  window.Helpers.setAutoUpdate(true);

  // Toggle Password Visibility
  window.Helpers.initPasswordToggle();

  // Speech To Text
  window.Helpers.initSpeechToText();

  // Manage menu expanded/collapsed with templateCustomizer & local storage
  //------------------------------------------------------------------

  // If current layout is horizontal OR current window screen is small (overlay menu) than return from here
  if (window.Helpers.isSmallScreen()) {
    return;
  }

  // If current layout is vertical and current window screen is > small

  // Auto update menu collapsed/expanded based on the themeConfig
  window.Helpers.setCollapsed(true, false);
})();

/*--------------------------
        Image Croper
  ---------------------------- */
var mainWidth = $('#cropperWrapper').width();
var subWidth = mainWidth - 50;
var $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
        width: subWidth,
        height: subWidth,
        type: 'square' //circle
    },
    boundary: {
        width: mainWidth,
        height: mainWidth,
    }
});

$('#upload_image').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    //$('#uploadimageModal').modal('show');
});

var $image_blog_crop = $('#image_blog_demo').croppie({
    enableExif: true,
    viewport: {
        width: subWidth,
        height: subWidth * 0.524,
        type: 'square' //circle
    },
    boundary: {
        width: mainWidth,
        height: mainWidth * 0.6,
    }
});

$('#upload_blog_image').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(event) {
        $image_blog_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    //$('#uploadimageModal').modal('show');
});

$('.crop_blog_image').click(function(event) {
    $("#loading").removeClass('d-none');
    var burl = $('#burl').val();
    var pcode = $('#pcode').val();

    $image_blog_crop.croppie('result', {
        type: 'canvas',
        size: '1200,627'
    }).then(function(response) {
        response = response.split(";");
        response = response[1];
        response = response.split(",");
        response = response[1];
        $.ajax({
            url: (burl + "posts/upload_image"),
            type: "POST",
            data: {
                "image": response,
                "pcode": pcode
            },
            success: function(data) {
                window.location.assign(burl + "posts");
            }
        });
    })
});

$('.crop_event_image').click(function(event) {
  $("#loading").removeClass('d-none');
  var burl = $('#burl').val();
  var pcode = $('#pcode').val();

  $image_blog_crop.croppie('result', {
      type: 'canvas',
      size: '1200,627'
  }).then(function(response) {
      response = response.split(";");
      response = response[1];
      response = response.split(",");
      response = response[1];
      $.ajax({
          url: (burl + "events/upload_image"),
          type: "POST",
          data: {
              "image": response,
              "pcode": pcode
          },
          success: function(data) {
              window.location.assign(burl + "events");
          }
      });
  })
});

  // For Crooping User Photo
  $('.crop_user_image').click(function(event){
    $("#loading").removeClass('d-none');
    var burl=$('#burl').val();
    var uid=$('#uid').val();

    $image_crop.croppie('result', {
      type: 'canvas',
      size: '1000,1000'
    }).then(function(response){
        response=response.split(";");
        response=response[1];
        response=response.split(",");
        response=response[1];
      $.ajax({
        url:(burl+"croppie/user_photo"),
        type: "POST",
        data:{
            "image": response,
            "uid": uid
        },
        success:function(data)
        {
          
           window.location.assign(burl+"profile/");
        }
      });
    })
  });

$("#userSearch").on('input',function(){
  let query = $("#userSearch").val();
  let burl=$('#burl').val();
  $("#loading").removeClass('d-none');
  $.ajax({
    url:(burl+"users/search"),
    type: "POST",
    data:{
        "query": query,
    },
    success:function(data){
      $("#loading").addClass('d-none');
      $("#userBox").html(data);
    }
  }) 
})

// document.addEventListener('DOMContentLoaded', function() {
//   var readMoreLinks = document.querySelectorAll('.read-more');

//   readMoreLinks.forEach(function(link) {
//       link.addEventListener('click', function() {
//           var songId = this.getAttribute('data-song-id');
//           var lyricsElement = document.getElementById('lyrics-' + songId);

//           // Fetch full lyrics from the server using AJAX
//           var xhr = new XMLHttpRequest();
//           xhr.open('GET', '<?= BURL ?>music/get_full_lyrics?id=' + songId, true);
//           xhr.onload = function() {
//               if (xhr.status === 200) {
//                   lyricsElement.textContent = xhr.responseText;
//                   // Hide the "Read more" link
//                   link.style.display = 'none';
//               }
//           };
//           xhr.send();
//       });
//   });
// });

document.addEventListener('DOMContentLoaded', function() {
  var readMoreLinks = document.querySelectorAll('.read-more');

  readMoreLinks.forEach(function(link) {
      link.addEventListener('click', function() {
          var songId = this.getAttribute('data-song-id');
          var lyricsElement = document.getElementById('lyrics-' + songId);

          // Fetch full lyrics from the server using AJAX
          var xhr = new XMLHttpRequest();
          xhr.open('GET', '<?= BURL ?>music/get_full_lyrics?id=' + songId, true);
          xhr.onload = function() {
              if (xhr.status === 200) {
                  lyricsElement.textContent = xhr.responseText;
                  // Hide the "Read more" link
                  link.style.display = 'none';
              }
          };
          xhr.send();
      });
  });
});