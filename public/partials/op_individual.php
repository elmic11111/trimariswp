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
    <center><strong>Awards for <?php echo $op_masternames_results->scaname ?></strong></center></br>
    </div>
    <?php if(!empty($op_masternames_results->blazonimage)) { ?><center><img src="<?php echo $op_masternames_results->blazonimage ?>"></center><br /><?php } ?>

    <?php if(!empty($op_masternames_results->blazon)) { ?><strong>Blazon:</strong> <?php echo $op_masternames_results->blazon; ?><br /><?php } ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Award Date</th>
                <th scope="col">Award Name</th>
                <th scope="col">Award</th>
                <th scope="col">Token</th>
            </tr>
        </thead>    
        <tbody>
<?php
    if(!empty($awards_results)) {
        foreach ($awards_results as $row){?>
            <tr>
                <td><?php echo $row->awarddate; ?></td>
                <td><a href="/officers/office-of-the-triskele-herald/order-of-precedence/award/?award=<?php echo $row->award; ?>"><?php echo $row->awardname; ?></a></td>
                <td><a href="/officers/office-of-the-triskele-herald/order-of-precedence/award/?award=<?php echo $row->award; ?>"><?php echo $row->award; ?></a></td>
                <?php if (empty($row->awardimage)){ ?>
                    <td> </td>
                <?php } else { ?>
                    <td><img style='width:50px;height:auto;margin:0px !important;vertical-align: -webkit-baseline-middle !important;'  src='<?php echo $row->awardimage; ?>'><td>
                <?php } ?>                    
            </tr>
        <?php } ?> 
        <tbody>
    <table> <?php 
    } else{
        echo '<!-- No Data -->';
    }
?>
    
