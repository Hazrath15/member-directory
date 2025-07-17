<?php
if( !class_exists('MEDIR_Admin_Dashboard') ) {
    /**
     * Class MEDIR_Admin_Dashboard
    **/
    class MEDIR_Admin_Dashboard {
        public function medir_admin_dashboard() {
            if ( ! current_user_can( 'manage_options' ) ) {
                return;
            }
            global $wpdb;
            $table_name = $wpdb->prefix . 'medir_user_activity';
        
            // Fetch the latest 50 user activity logs
            $results = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY modified_date DESC LIMIT 50" );

            ?>
            <div class="wrap">
                <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">User</th>
                            <th width="15%">Email</th>
                            <th width="10%">Role</th>
                            <th width="15%">Action</th>
                            <th width="20%">Description</th>
                            <th width="15%">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( ! empty( $results ) ) { ?>
                    <?php foreach ( $results as $row ) { ?>
                        <tr>
                            <td><?php echo esc_html( $row->sactid ); ?></td>
                            <td><?php echo esc_html( $row->user_name ); ?></td>
                            <td><?php echo esc_html( $row->user_email ); ?></td>
                            <td><?php echo esc_html( $row->user_role ); ?></td>
                            <td><?php echo esc_html( ucfirst( $row->action ) ); ?></td>
                            <td><?php echo esc_html( $row->post_title ) ; ?></td>
                            <td><?php echo esc_html( gmdate( 'Y-m-d H:i:s', strtotime( $row->modified_date ) ) ); ?></td>
                        </tr>
                    <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <form method="get" action="">
                <input type="hidden" name="sact_export_csv" value="1">
                <input type="hidden" name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce( 'sact_export_csv' )); ?>">
                <p><input type="submit" class="button-secondary" value="Export Activity as CSV"></p>
            </form>

            <?php
        }
    }
}

?>