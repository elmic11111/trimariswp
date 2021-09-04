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



<?php
$lastawardlevel = NULL;
if(!empty($op_awards_list_results)) {
?> 
    <table class="table">
        <tbody>
            <?php foreach ($op_awards_list_results as $row) { 
                if ($lastawardlevel != $row->awardlevel) {
                    $lastawardlevel = $row->awardlevel;
                ?>
            <tr>
                <td colspan="2"><strong>Awards for <?php echo $award_levels[$row->awardlevel]; ?></strong></td>
            </tr><?php
                }
            ?> 
            <tr>
            <?php if (empty($row->awardimage)){ ?>
                <td rowspan="2"> </td>
            <?php } else { ?>
                <td rowspan="2" class="align-middle"><img style="width: 65px;" src="<?php echo $row->awardimage; ?>"></td>
            <?php } ?> 
                <td><a href="/officers/office-of-the-triskele-herald/order-of-precedence/award/?award=<?php echo $row->award; ?>"><?php echo $row->awardname; ?> - <?php echo $row->award; ?></a></td>
            <tr style="border: 0">
                <td style="border: 0"><?php echo $row->awardreason; ?></td>
            </tr>
            
        <?php } ?> 
        <tbody>
    <table>
    <?php } else{
        echo '<!-- No Data -->';
    }
    
?>
