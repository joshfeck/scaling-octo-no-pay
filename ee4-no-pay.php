<?php
/*
Plugin Name: Change free registration steps for EE4
Description: A temporary solution until the Object Oriented version of EE4's Single Page Checkout (OOSPCO) is released
*/

function my_change_payment_references( $translated, $original, $domain ) {
 
    // This is an array of original strings
    // and what they should be replaced with
    $strings = array(
        'Payment%sOptions' => 'Next step',
        'Attendee information submitted successfully.' => 'Please finalize your registration.',
        '%s Payment Options' => '%s Finalize Registration',
        'This is a free event, so no billing will occur.' => 'Please finalize your registration by clicking the button below. You will be able to confirm and edit your registration information on the next screen.',
        // Add some more strings here
    );
 
    // See if the current string is in the $strings array
    // If so, replace its translation
    if ( isset( $strings[$original] ) ) {
        // This accomplishes the same thing as __()
        // but without running it through the filter again
        $translations = get_translations_for_domain( $domain );
        $translated = $translations->translate( $strings[$original] );
    }
 
    return $translated;
}
 
add_filter( 'gettext', 'my_change_payment_references', 10, 3 );

