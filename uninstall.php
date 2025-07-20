<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$member_posts = get_posts([
    'post_type'      => 'medir_member',
    'posts_per_page' => -1,
    'fields'         => 'ids',
]);

$member_meta_keys = [
    '_medir_first_name',
    '_medir_last_name',
    '_medir_email',
    '_medir_address',
    '_medir_color',
    '_medir_status',
    '_medir_profile_image',
    '_medir_cover_image',
];

foreach ($member_posts as $post_id) {
    foreach ($member_meta_keys as $key) {
        delete_post_meta($post_id, $key);
    }
    wp_delete_post($post_id, true);
}

$submission_posts = get_posts([
    'post_type'      => 'medir_submission',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'post_status'    => 'any',
]);

$submission_meta_keys = [
    '_medir_member_email',
    '_medir_message',
    '_medir_sender_email',
    '_medir_sender_name',
];

foreach ($submission_posts as $submission_id) {
    foreach ($submission_meta_keys as $key) {
        delete_post_meta($submission_id, $key);
    }
    wp_delete_post($submission_id, true);
}

?>