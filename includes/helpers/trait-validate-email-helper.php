<?php
trait MEDIR_Validate_Email_Helper {
    function medir_block_duplicate_email_insert($data, $postarr) {
        if (
            $data['post_type'] !== 'medir_member' ||
            (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        ) {
            return $data;
        }

        if (!isset($_POST['medir_email'])) return $data;

        $email = sanitize_email($_POST['medir_email']);
        if (empty($email)) return $data;

        $post_id = isset($postarr['ID']) ? (int)$postarr['ID'] : 0;

        $query = new WP_Query([
            'post_type' => 'medir_member',
            'post_status' => 'any',
            'post__not_in' => [$post_id],
            'meta_query' => [
                [
                    'key' => '_medir_email',
                    'value' => $email,
                    'compare' => '='
                ]
            ]
        ]);

        if ($query->found_posts > 0) {
            // Block post from saving
            wp_die(
                'Duplicate email. <a href="' . esc_url(admin_url('edit.php?post_type=medir_member')) . '">Go back</a>.',
                'Email Already Exists',
                ['response' => 403]
            );
        }

        return $data;
    }
}
?>