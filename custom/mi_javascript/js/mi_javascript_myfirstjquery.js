// (function ($) {
//
//   'use strict';
//
//   $(function () {
//     // $("p").hide().fadeIn("slow").slideUp("slow").slideDown("slow");
//     $("#one").wrap("<div class=\'error\'></div>").css("border", "solid");
//   });
// })(jQuery);


Drupal.behaviors.myBehavior = {
  attach: function ($) {
    $(function () {
      $("#one").wrap("<div class=\'error\'></div>").css("border", "solid");
    })
  }(jQuery)
};
