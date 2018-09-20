// alert('hola q hace');
Drupal.behaviors.myBehavior = {
  attach: function ($) {
    $(function () {

      var blocks = $('.region-sidebar-first, .region-sidebar-second');




      //Add a button
      $('#block-bartik-search').prepend('<div id="hideblocksbutton">Hide Blocks</div>');
      $('#hideblocksbutton').css({
        'width': '90px',
        'border': 'solid',
        'border-width': '1px',
        'padding': '5px',
        'background-color': '#fff'
      });

      //Add a handler that runs once when the button  is clicked.
      $('#hideblocksbutton').one('click', function() {
        $('#hideblocksbutton').remove();
        blocks.slideUp("slow");
        //Hide them
        // blocks.hide();

      });



      //Add a button
      $('#block-bartik-search').prepend('<div id="collapsibutton">Show Blocks</div>');
      $('#collapsibutton').css({
        'width': '90px',
        'border': 'solid',
        'border-width': '1px',
        'padding': '5px',
        'background-color': '#fff'
      });

      //Add a handler that runs once when the button  is clicked.
      $('#collapsibutton').one('click', function() {
        $('#collapsibutton').remove();
        blocks.slideDown("slow");
      });

    })
  }(jQuery)
};