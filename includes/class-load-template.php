<?php
if ( ! class_exists( 'MEDIR_Load_Template' ) ) {
    class MEDIR_Load_Template {

        use MEDIR_Single_Member_Template_Load_Helper;
        use MEDIR_Member_Listing_Template_Load_Helper;
        use MEDIR_Team_Listing_Template_Load_Helper;
        use MEDIR_Single_Team_Template_Load_Helper;
        public function __construct() {
            
            add_filter('single_template', [$this, 'medir_custom_single_template']);
            add_filter('single_template', [$this, 'medir_team_single_template']);
            add_filter('archive_template', [$this, 'medir_member_archive_template']);
            add_filter('archive_template', [$this, 'medir_team_archive_template']);
        }

    }
}