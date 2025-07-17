<?php
trait MEDIR_Add_Meta_Fields_Helper {
    function medir_member_fields($post) {
        $fields = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'address' => '',
            'color' => '',
            'status' => 'active',
        ];

        foreach ($fields as $field => $default) {
            $$field = get_post_meta($post->ID, "_medir_$field", true) ?: $default;
        }

        wp_nonce_field('medir_save_meta_fields', 'medir_meta_nonce');

        ?>
        <p><label>First Name: <input type="text" name="medir_first_name" value="<?= esc_attr($first_name) ?>"></label></p>
        <p><label>Last Name: <input type="text" name="medir_last_name" value="<?= esc_attr($last_name) ?>"></label></p>
        <p><label>Email: <input type="email" name="medir_email" value="<?= esc_attr($email) ?>" required></label></p>
        <p><label>Address: <textarea name="medir_address"><?= esc_textarea($address) ?></textarea></label></p>
        <p><label>Favorite Color: <input type="color" name="medir_color" value="<?= esc_attr($color) ?>"></label></p>
        <p>
            <label>Status:
                <select name="medir_status">
                    <option value="active" <?= selected($status, 'active') ?>>Active</option>
                    <option value="draft" <?= selected($status, 'draft') ?>>Draft</option>
                </select>
            </label>
        </p>
        <?php
    }
}
?>