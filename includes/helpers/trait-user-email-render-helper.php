<?php
trait MEDIR_User_Email_Render_Helper {
    function medir_render_member_messages_box($post) {
        $member_email = get_post_meta($post->ID, '_medir_email', true);

        if (empty($member_email)) {
            echo '<p><em>No email associated with this member.</em></p>';
            return;
        }
        $args = [
            'post_type' => 'medir_submission',
            'post_status' => 'private',
            'meta_query' => [
                [
                    'key' => '_medir_member_email',
                    'value' => $member_email,
                    'compare' => '=',
                ],
            ],
            'orderby' => 'date',
            'order'   => 'DESC',
        ];

        $messages = get_posts($args);

        if (empty($messages)) {
            echo '<p><em>No messages found for this member.</em></p>';
            return;
        }

        echo '<ul>';
        foreach ($messages as $message) {
            $from = get_post_meta($message->ID, '_medir_sender_email', true);
            $name = get_post_meta($message->ID, '_medir_sender_name', true);
            $content = get_post_meta($message->ID, '_medir_message', true);
            $date = get_the_date('', $message->ID);
            echo '<li>';
            echo '<strong>' . esc_html($from) . '</strong> on <em>' . esc_html($date) . '</em><br>';
            echo '<strong>' . esc_html($name) . '</strong> (' . esc_html($from) . ') on <em>' . esc_html($date) . '</em><br>';
            echo '<div style="margin:5px 0 15px; padding:10px; background:#f9f9f9; border-left:3px solid #007cba;">' . nl2br(esc_html($content)) . '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }

}
?>