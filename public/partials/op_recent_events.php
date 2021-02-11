<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       test2
 * @since      1.0.0
 *
 * @package    Trimariswp
 * @subpackage Trimariswp/public/partials
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<strong>Last 15 Events Entered Posted to the Order of Precedence</strong><br><br>

<?php
    if(!empty($op_events_results)) {
        foreach ($op_events_results as $row){ ?>  
            <a href="/officers/office-of-the-triskele-herald/order-of-precedence/event/?op_eventid=<?php echo $row->evntcode; ?>"><?php echo "$row->evntname $row->courtyear"; ?></a><BR>
        <?php }
    } else{
        echo '<!-- No Data -->';
    }
?>
