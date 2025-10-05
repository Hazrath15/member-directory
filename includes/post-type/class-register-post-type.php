<?php
if ( ! class_exists( 'MEDIR_Register_Post_Type' ) ) {
    class MEDIR_Register_Post_Type {
        public function __construct() {
            add_action( 'init', [ $this, 'medir_register_post_types' ] );
        }
        function medir_register_post_types() {
            register_post_type('medir_member', [
                'labels'      => [
                    'name'                  => __('Members', 'membrio-member-directory'),
                    'singular_name'         => __('Member', 'membrio-member-directory'),
                    'add_new'               => __('Add New', 'membrio-member-directory'),
                    'add_new_item'          => __('Add New Member', 'membrio-member-directory'),
                    'new_item'              => __('New Member', 'membrio-member-directory'),
                    'edit_item'             => __('Edit Member', 'membrio-member-directory'),
                    'view_item'             => __('View Member', 'membrio-member-directory'),
                    'all_items'             => __('All Members', 'membrio-member-directory'),
                ],
                'public' => true,
                'supports' => ['thumbnail'],
                'rewrite' => ['slug' => 'members'],
                'has_archive' => true,
                'menu_icon' => 'dashicons-admin-users',
            ]);
            register_post_type('medir_teams', [
                'labels'      => [
                    'name'                  => __('Teams', 'membrio-member-directory'),
                    'singular_name'         => __('Team', 'membrio-member-directory'),
                    'add_new'               => __('Add New', 'membrio-member-directory'),
                    'add_new_item'          => __('Add New Team', 'membrio-member-directory'),
                    'new_item'              => __('New Team', 'membrio-member-directory'),
                    'edit_item'             => __('Edit Team', 'membrio-member-directory'),
                    'view_item'             => __('View Team', 'membrio-member-directory'),
                    'all_items'             => __('All Teams', 'membrio-member-directory'),
                ],
                'public' => true,
                'supports' => ['title', 'editor'],
                'rewrite' => ['slug' => 'teams'],
                'has_archive' => true,
                'menu_icon' => 'dashicons-groups',
            ]);
        }
    }
}

?>