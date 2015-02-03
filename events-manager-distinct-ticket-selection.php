<?php
/**
 * Plugin Name: Events Manager - Distinct Ticket Selection
 * Plugin URI: http://www.andyplace.co.uk
 * Description: Plugin for Events Manager which forces the user to choose from just one of the available tickets
 * Version: 1.0
 * Author: Andy Place
 * Author URI: http://www.andyplace.co.uk
 * License: GPL2
 */


/**
 * Modify the ticket Spaces select element to be displayed as a checkbox instead
 * Using checkbox instead of radio buttons as we want to retain distict form element names per ticket
 * Use some jquery to ensure only one checkbox can be selected at a time.
 *
 * Assumptions:
 * - All events need checkboxes instead of select boxes
 * - events are in single ticket mode so only one ticket can be bought per booking
 */
function dts_em_ticket_get_spaces_options( $output, $zero_value, $default_value, $EM_Ticket) {

  // Leave class as select so as not to confuse EM
  $output = '<input type="checkbox" name="em_tickets['.$EM_Ticket->ticket_id.'][spaces]" class="em-ticket-select" id="em-ticket-spaces-'.$EM_Ticket->ticket_id.'" value="1" />';

  return $output;
}
add_filter('em_ticket_get_spaces_options', 'dts_em_ticket_get_spaces_options', 10, 4);

/**
 * Modify Ticket list table headings
 * Leave spaces as a blank, as checkbox is pretty self explanitory
 */
function dts_em_booking_form_tickets_cols ($collumns, $EM_Event ) {
  $collumns['spaces'] = '';
  return $collumns;
}
add_filter('em_booking_form_tickets_cols', 'dts_em_booking_form_tickets_cols', 10, 2);


/**
 * Add our js assets
 */
function dts_scripts() {
  wp_enqueue_script( 'cnet-em-custom', plugins_url( '/events-manager-distinct-ticket-selection.js' , __FILE__ ), array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'dts_scripts' );