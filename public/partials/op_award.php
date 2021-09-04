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

<center><img src="<?php echo $op_awards_results->awardimage; ?>"></center><br />

<strong>Award:</strong> <?php echo $op_awards_results->awardname; ?><br />
<strong>Award Description:</strong> <?php echo $op_awards_results->awardreason; ?><br />
<strong>Kingdom of Origin:</strong>  <?php echo $op_awards_results->kingdom; ?><br />
<strong>Opened:</strong> <?php echo $op_awards_results->readable_opened_date; ?><br />  

<?php
if(!empty($op_data_results)) {
?> 
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Award Date</th>
                <th scope="col">Companion Name</th>
            </tr>
        </thead>    
        <tbody>
            <?php foreach ($op_data_results as $row) { ?>
            <tr>
                <td><?php echo $row->readable_date; ?></td>
                <td><a href="/officers/office-of-the-triskele-herald/order-of-precedence/individual/?linknum=<?php echo $row->linknum; ?>"><?php echo $row->scaname; ?></a></td>
            </tr>
        <?php } ?> 
        <tbody>
    <table>
<?php } else{
    echo '<!-- No Data -->';
}
?>
