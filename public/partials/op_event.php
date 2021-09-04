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
    <style>
		.divTable{ display: table; width: 100%; }
		.divTableRow { display: table-row; }
		.divTableHeading { background-color: #3877a8; color: #ffffff; display: table-cell; padding: 3px 10px; font-weight: bold;  }
        .divTableCell, .divTableHead { border: 1px solid #999999; display: table-cell; padding: 3px 10px; }
        .divTableFoot {	background-color: #EEE; display: table-footer-group; font-weight: bold; }
        .divTableBody { display: table-row-group; }
        .center-div { margin: 0 auto; }
    </style>

    <div class='center-div' style='width:100%;color: #000000; font-size: 18px;'>
    <center><strong>Awards for <?php echo "$op_events_name_results->evntname  $op_events_name_results->courtyear" ?></strong></center></br>
    </div>

    <center><div class='center-div' style='width:100%';>
		<div class='divtable'>
		<div class='divTableRow'>
		<div class='divTableHeading '>Award Date</div>
        <div class='divTableHeading '>SCA Name</div>
		<div class='divTableHeading '>Award Name</div>
		<div class='divTableHeading '>Award</div>
		<div class='divTableHeading '>Token</div>
		</div>
<?php
    if(!empty($op_event_results)) {
        foreach ($op_event_results as $row){
            ?>  <div class='divTableRow'>
                <div class='divTableCell'><?php echo $row->awarddate; ?></div>
                <div class='divTableCell'><?php echo $row->scaname; ?></div>
                <div class='divTableCell'><a href="/officers/office-of-the-triskele-herald/order-of-precedence/award/?award=<?php echo $row->award; ?>"><?php echo $row->awardname; ?></a></div>
                <div class='divTableCell'><a href="/officers/office-of-the-triskele-herald/order-of-precedence/award/?award=<?php echo $row->award; ?>"><?php echo $row->award; ?></a></div>
                <?php if (empty($row->awardimage)){ ?>
                    <div class='divTableCell'> </div>
                <?php } else { ?>
                    <div class='divTableCell'><img style='width:50px;height:auto;margin:0px !important;vertical-align: -webkit-baseline-middle !important;'  src='<?php echo $row->awardimage; ?>'></div>
                <?php } ?>                    
                </div>
            <?php 
        }
    } else{
        echo '<!-- No Data -->';
    }
?>
    </div></center>
