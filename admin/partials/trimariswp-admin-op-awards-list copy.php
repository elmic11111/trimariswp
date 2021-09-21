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
<div class="wrap">
    <h1 class="wp-heading-inline">Awards</h1>
    <a href="https://www.trimaris.org/wp-admin/admin.php?page=trimaris-awards-new" class="page-title-action">Add New</a>
    <hr class="wp-header-end">
    <?php
        global $wpdb;
        $pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
        $limit = 10; // number of rows in page
        $offset = ( $pagenum - 1 ) * $limit;
        $total = $wpdb->get_var( "SELECT COUNT(`id`) FROM op_awards" );
        $num_of_pages = ceil( $total / $limit );

        $page_links = paginate_links( array(
            'base' => add_query_arg( 'pagenum', '%#%' ),
            'format' => '',
            'prev_text' => __( '&laquo;', 'text-domain' ),
            'next_text' => __( '&raquo;', 'text-domain' ),
            'total' => $num_of_pages,
            'current' => $pagenum
        ) );
        
        if ( $page_links ) {
            echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
        }

    ?>  



</div>