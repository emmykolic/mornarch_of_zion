/**
 * Main
 */

'use strict';

// let menu, animate;

// var input = document.querySelector('#tag-input');
// new Tagify(input);

// function copyToClipboard(link) {
//   navigator.clipboard.writeText(link).then(() => {
//       // Display confirmation message
//       const confirmation = document.getElementById("copyConfirmation");
//       confirmation.style.display = "inline";
//       setTimeout(() => confirmation.style.display = "none", 2000); // Hide after 2 seconds
//   }).catch(err => {
//       console.error('Failed to copy: ', err);
//   });
// }


document.addEventListener('DOMContentLoaded', function () {
  const tagInput = document.querySelector('#tag-input');
  const hiddenTagInput = document.getElementById('hiddenTagInput');
  const tagContainer = document.getElementById('tagContainer');

  const tagify = new Tagify(tagInput, {
    delimiters: ", ", // Allow comma or space
    maxTags: Infinity
  });

  tagify.on('change', () => {
    const tags = tagify.value.map(tag => tag.value.trim());
    hiddenTagInput.value = tags.join(',');
    updateDisplayedTags(tags);
  });

  function updateDisplayedTags(tags) {
    tagContainer.innerHTML = '';
    tags.forEach(tag => {
      if (tag) {
        const el = document.createElement('span');
        el.className = 'badge bg-secondary me-1';
        el.textContent = tag;
        tagContainer.appendChild(el);
      }
    });
  }
});


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

// Initialize the carousel
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});

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
    // $('#uploadimageModal').modal('show');
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

  CKEDITOR.replace('editor1', { height: 300, toolbar: 'Basic' });
  CKEDITOR.replace('editor2', { height: 300, toolbar: 'Basic' });


  document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.read-more').forEach(function(readMoreLink) {
			readMoreLink.addEventListener('click', function() {
				var truncatedText = this.previousElementSibling.previousElementSibling;
				var fullText = this.previousElementSibling;
	
				console.log('Read More clicked');
				console.log('Truncated Text:', truncatedText);
				console.log('Full Text:', fullText);
	
				// Toggle the display of truncated and full text
				if (fullText.style.display === 'none') {
					fullText.style.display = 'inline';
					truncatedText.style.display = 'none';
					this.textContent = 'Read Less';
				} else {
					fullText.style.display = 'none';
					truncatedText.style.display = 'inline';
					this.textContent = 'Read More';
				}
			});
		});
	});

  document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.see-more').forEach(function(readMoreLink) {
			readMoreLink.addEventListener('click', function() {
				var truncatedText = this.previousElementSibling.previousElementSibling;
				var fullText = this.previousElementSibling;
	
				console.log('See More clicked');
				console.log('Truncated Text:', truncatedText);
				console.log('Full Text:', fullText);
	
				// Toggle the display of truncated and full text
				if (fullText.style.display === 'none') {
					fullText.style.display = 'inline';
					truncatedText.style.display = 'none';
					this.textContent = 'Read Less';
				} else {
					fullText.style.display = 'none';
					truncatedText.style.display = 'inline';
					this.textContent = 'Read More';
				}
			});
		});
	});

  


  





document.addEventListener('DOMContentLoaded', function () {
  const input = document.getElementById('tag-input');
  const tagContainer = document.querySelector('.tag-container');
  
  input.addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
          e.preventDefault();
          let text = input.value.trim();
          
          if (text) {
              createTag(text);
              input.value = '';
          }
      }
  });
  
  function createTag(text) {
      const tag = document.createElement('span');
      tag.className = 'tag';
      tag.textContent = text;
      
      const closeBtn = document.createElement('span');
      closeBtn.className = 'tag-close';
      closeBtn.innerHTML = '&times;';
      
      closeBtn.addEventListener('click', function () {
          tag.remove();
      });
      
      tag.appendChild(closeBtn);
      tagContainer.insertBefore(tag, input);
  }


});
