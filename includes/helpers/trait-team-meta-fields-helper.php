<?php
trait MEDIR_Team_Meta_Fields_Helper {
    function medir_render_team_selector($post) {
        $selected_teams = get_post_meta($post->ID, '_medir_assigned_teams', true);
        if (!is_array($selected_teams)) $selected_teams = [];

        $teams = get_posts([
            'post_type' => 'medir_teams',
            'numberposts' => -1,
            'post_status' => 'publish'
        ]);

        echo '<select name="medir_assigned_teams[]" multiple style="width:100%; height:auto;">';
        foreach ($teams as $team) {
            $selected = in_array($team->ID, $selected_teams) ? 'selected' : '';
            echo "<option value='" . esc_attr($team->ID) . "' ".esc_attr($selected).">" . esc_html($team->post_title) . "</option>";

        }
        echo '</select>';
    }
}
?>