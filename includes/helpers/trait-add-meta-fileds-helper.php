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
            'profile_image'  => '',
            'cover_image'    => '',
        ];

        foreach ($fields as $field => $default) {
            $$field = get_post_meta($post->ID, "_medir_$field", true) ?: $default;
        }

        wp_nonce_field('medir_save_meta_fields', 'medir_meta_nonce');

        ?>
        <div class="medir-meta-box">
            <p><label>First Name: <input type="text" name="medir_first_name" value="<?php echo esc_attr($first_name); ?>" required></label></p>
            <p><label>Last Name: <input type="text" name="medir_last_name" value="<?php echo esc_attr($last_name); ?>" required></label></p>
            <p><label>Email: <input type="email" name="medir_email" value="<?php echo esc_attr($email); ?>" required></label></p>
            <p>
                <label>Profile Image:</label><br>
                <img id="profile_image_preview" src="<?php echo esc_url($profile_image); ?>" style="max-width: 100px;"><br>
                <input type="hidden" id="medir_profile_image" name="medir_profile_image" value="<?php echo esc_url($profile_image); ?>">
                <button type="button" class="button medir-upload-btn" data-target="medir_profile_image">Choose Profile Image</button>
            </p>

            <p>
                <label>Cover Image:</label><br>
                <img id="cover_image_preview" src="<?php echo esc_url($cover_image); ?>" style="max-width: 100px;"><br>
                <input type="hidden" id="medir_cover_image" name="medir_cover_image" value="<?php echo esc_url($cover_image); ?>">
                <button type="button" class="button medir-upload-btn" data-target="medir_cover_image">Choose Cover Image</button>
            </p>
            <p><label>Address: <textarea name="medir_address"><?php echo esc_textarea($address); ?></textarea></label></p>
            <p><label>Favorite Color: <input type="color" name="medir_color" value="<?php echo esc_attr($color); ?>"></label></p>
            <p>
                <label>Status:
                    <select name="medir_status">
                        <option value="active" <?php selected($status, 'active') ?>>Active</option>
                        <option value="draft" <?php selected($status, 'draft') ?>>Draft</option>
                    </select>
                </label>
            </p>
        </div>
        <?php
    }
}
?>