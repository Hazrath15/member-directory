<?php
if ( ! class_exists( 'MEDIR_Register_Post_Type' ) ) {
    class MEDIR_Register_Post_Type {
        public function __construct() {
            add_action( 'init', [ $this, 'medir_register_post_types' ] );
        }
        function medir_register_post_types() {
            register_post_type('medir_member', [
                'labels'      => [
                    'name'                  => __('Members', 'member-directory'),
                    'singular_name'         => __('Member', 'member-directory'),
                    'add_new'               => __('Add New', 'member-directory'),
                    'add_new_item'          => __('Add New Member', 'member-directory'),
                    'new_item'              => __('New Member', 'member-directory'),
                    'edit_item'             => __('Edit Member', 'member-directory'),
                    'view_item'             => __('View Member', 'member-directory'),
                    'all_items'             => __('All Members', 'member-directory'),
                ],
                'public' => true,
                'supports' => ['thumbnail'],
                'rewrite' => ['slug' => 'members'],
                'has_archive' => true,
                'menu_icon' => 'dashicons-groups',
            ]);

            register_taxonomy('medir_team', 'medir_member', [
                'label' => __('Teams','member-directory'),
                'hierarchical' => false,
                'public' => true,
                'rewrite' => ['slug' => 'teams'],
            ]);
        }
    }
}

?>