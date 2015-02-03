jQuery(document).ready( function($){
  $('.em-ticket-select').on('change', function(e) {
    if( $(this).val() == 1 ) {
      // Deselect any other selected checkboxes
      $('.em-ticket-select').attr('checked', false);
      $(this).attr('checked', true);
    }
  });
});