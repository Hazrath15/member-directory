<?php get_header(); ?>

<?php
$first = get_post_meta(get_the_ID(), '_medir_first_name', true);
$last = get_post_meta(get_the_ID(), '_medir_last_name', true);
$email = get_post_meta(get_the_ID(), '_medir_email', true);
$color = get_post_meta(get_the_ID(), '_medir_color', true);
$status = get_post_meta(get_the_ID(), '_medir_status', true);

if ($status !== 'active') {
    echo '<p>This member is not currently active.</p>';
    return;
}
?>
<div class="member-details-area">
    <div class="member-details">
        <h1><?php echo esc_html($first . ' ' . $last); ?></h1>
        <p>Email: <?php echo esc_html($email); ?></p>
        <p>Favorite Color: <span style="color:<?php echo esc_attr($color); ?>">■</span></p>
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
