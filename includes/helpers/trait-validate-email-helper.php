<?php
trait MEDIR_Validate_Email_Helper {
    function medir_validate_unique_email($post_id) {
        if (get_post_type($post_id) !== 'medir_member') return;

        $new_email = sanitize_email($_POST['medir_email'] ?? '');
        if (!$new_email) return;

        $query = new WP_Query([
            'post_type' => 'medir_member',
            'post__not_in' => [$post_id],
            'meta_query' => [[
                'key' => '_medir_email',
                'value' => $new_email,
                'compare' => '=',
            ]]
        ]);

        if ($query->found_posts > 0) {
            wp_redirect(add_query_arg('email_error', 1, get_edit_post_link($post_id, 'raw')));
            exit;
        }
    }
}
?>