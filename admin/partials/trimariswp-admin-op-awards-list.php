<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/elmic11111/trimariswp
 * @since      1.0.0
 *
 * @package    Trimariswp
 * @subpackage Trimariswp/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">OP Award List</div>
            <div class="card-body" class="trimariswplist">
                <table id="trimariswp-awards-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Award</th>
                            <th>Kingdom Code</th>
                            <th>Award Type</th>
                            <th>Award Level</th>
                            <th>Award Rank</th>
                            <th>Award Opened</th>
                            <th>Award Closed</th>
                            <th>Award Reason</th>
                            <th>Award Name</th>
                            <th>Award Comment</th>
                            <th>Award Order</th>
                            <th>Award Image</th>
                        </tr>
                    </thead>
                    <tbody><?php if(!empty($op_awards_list_results)) { 
                    foreach ($op_awards_list_results as $row) { ?>
                        <tr>
                            <td class="td-limit"><?php echo $row->id; ?></td>
                            <td class="td-limit"><?php echo $row->award; ?></td>
                            <td class="td-limit"><?php echo $row->kingdomcode; ?></td>
                            <td class="td-limit"><?php echo $row->awardtype; ?></td>
                            <td class="td-limit"><?php echo $row->awardlevel; ?></td>
                            <td class="td-limit"><?php echo $row->awardrank; ?></td>
                            <td class="td-limit"><?php echo $row->awardopened; ?></td>
                            <td class="td-limit"><?php echo $row->awardclosed; ?></td>
                            <td class="td-limit"><?php echo $row->awardreason; ?></td>
                            <td class="td-limit"><?php echo $row->awardname; ?></td>
                            <td class="td-limit"><?php echo $row->awardcomment; ?></td>
                            <td class="td-limit"><?php echo $row->awardorder; ?></td>
                            <td class="td-limit"><?php echo $row->awardimage; ?></td>
                        </tr>     
                    <?php }} ?>                           
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Award</th>
                            <th>Kingdom Code</th>
                            <th>Award Type</th>
                            <th>Award Level</th>
                            <th>Award Rank</th>
                            <th>Award Opened</th>
                            <th>Award Closed</th>
                            <th>Award Reason</th>
                            <th>Award Name</th>
                            <th>Award Comment</th>
                            <th>Award Order</th>
                            <th>Award Image</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
