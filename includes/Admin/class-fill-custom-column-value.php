<?php
if (!class_exists('MEDIR_Fill_Custom_Column_Value')) {
    class MEDIR_Fill_Custom_Column_Value {
        public function __construct() {
            add_action('manage_medir_member_posts_custom_column', [$this, 'medir_fill_member_custom_columns'], 10, 2);
        }
        
        function medir_fill_member_custom_columns($column, $post_id) {
            switch ($column) {
                case 'first_name':
                    echo esc_html(get_post_meta($post_id, '_medir_first_name', true));
                    break;

                case 'last_name':
                    echo esc_html(get_post_meta($post_id, '_medir_last_name', true));
                    break;

                case 'email':
                    echo esc_html(get_post_meta($post_id, '_medir_email', true));
                    break;

                case 'team':
                    $teams = get_the_terms($post_id, 'medir_team');
                    if (!empty($teams) && !is_wp_error($teams)) {
                        $team_names = wp_list_pluck($teams, 'name');
                        echo esc_html(implode(', ', $team_names));
                    } else {
                        echo '—';
                    }
                    break;

                case 'status':
                    echo esc_html(get_post_meta($post_id, '_medir_status', true));
                    break;
            }
        }
    }
}
?>