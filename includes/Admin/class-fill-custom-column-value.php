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
                    $selected_teams = get_post_meta($post_id, '_medir_assigned_teams', true);
                    if (!empty($selected_teams) && is_array($selected_teams)) {
                        $team_names = [];

                        foreach ($selected_teams as $team_id) {
                            $team_title = get_the_title($team_id);
                            if ($team_title) {
                                $team_names[] = $team_title;
                            }
                        }
                        echo esc_html(implode(', ', $team_names));
                    } else {
                        echo '—';
                    }
                    break;

                case 'status':
                    echo esc_html(get_post_meta($post_id, '_medir_status', true));
                    break;
                case 'messages':
                    global $wpdb;
                    $email = get_post_meta($post_id, '_medir_email', true);
                    $count = $wpdb->get_var($wpdb->prepare(
                        "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = '_medir_member_email' AND meta_value = %s",
                        $email
                    ));
                    echo intval($count);
                break;
            }
        }
    }
}
?>