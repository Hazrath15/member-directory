<?php get_header(); ?>

<?php
$first  = get_post_meta(get_the_ID(), '_medir_first_name', true);
$last   = get_post_meta(get_the_ID(), '_medir_last_name', true);
$email  = get_post_meta(get_the_ID(), '_medir_email', true);
$color  = get_post_meta(get_the_ID(), '_medir_color', true);
$status = get_post_meta(get_the_ID(), '_medir_status', true);
$address = get_post_meta(get_the_ID(), '_medir_address', true);

$profile_image = get_post_meta(get_the_ID(), '_medir_profile_image', true);
$cover_image   = get_post_meta(get_the_ID(), '_medir_cover_image', true);

if ($status !== 'active') {
    echo '<p>This member is not currently active.</p>';
    return;
}
?>

<div class="member-details-area">

    <?php if ($cover_image): ?>
        <div class="member-cover">
            <img src="<?php echo esc_url($cover_image); ?>" alt="Cover Image">
        </div>
    <?php endif; ?>

    <div class="member-details">
        <?php if ($profile_image): ?>
            <div class="profile-photo">
                <img src="<?php echo esc_url($profile_image); ?>" alt="Profile Image">
            </div>
        <?php endif; ?>

        <div class="member-info">
            <h1>Hello <?php echo esc_html($first . ' ' . $last); ?></h1>
            <p>Email: <?php echo esc_html($email); ?></p>
            <?php if($address): ?>
                <p>Address: <?php echo esc_html($address); ?></p>
            <?php endif; ?>

            <?php if($color): ?>
                <p>Favorite Color: <span class="color-square" style="color: <?php echo esc_attr($color); ?>">■</span></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="contact-form">
        <form method="post" action="">
            <input type="text" name="full_name" required placeholder="Your Name">
            <input type="email" name="from_email" required placeholder="Your Email">
            <textarea name="message" required placeholder="Your Message"></textarea>
            <input type="hidden" name="to_email" value="<?php echo esc_attr($email); ?>">
            <button type="submit">Send</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
