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
$assigned_team_ids = get_post_meta(get_the_ID(), '_medir_assigned_teams', true);

if ($status !== 'active') {
    echo '<p>This member is not currently active.</p>';
    return;
}
?>
<div class="container">
    <div class="member-details-area">

        <?php if ($cover_image): ?>
            <div class="member-cover">
                <img src="<?php echo esc_url($cover_image); ?>" alt="Cover Image">
            </div>
        <?php else: ?>
            <div class="member-cover">
                <img src="<?php echo esc_url(plugins_url( 'assets/img/cover-placeholder.jpg', plugin_dir_path( __DIR__ ) )); ?>" alt="Cover Image">
            </div>
        <?php endif; ?>

        <div class="member-details">
            <?php if ($profile_image): ?>
                <div class="profile-photo">
                    <img src="<?php echo esc_url($profile_image); ?>" alt="Profile Image">
                </div>
            <?php else: ?>
                <div class="profile-photo">
                    <img src="<?php echo esc_url(plugins_url( 'assets/img/profile-placeholder.jpg', plugin_dir_path( __DIR__ ) )); ?>" alt="Profile Imag">
                </div>
            <?php endif; ?>
            <h1><?php echo esc_html($first . ' ' . $last); ?></h1>
        </div>

        <div class="member-content">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="member-info">
                        <?php if ($first || $last): ?>
                            <p><strong> First Name:</strong> <?php echo esc_html($first); ?></p>
                            <p><strong> Last Name:</strong> <?php echo esc_html($last); ?></p>
                        <?php endif; ?>

                        <?php if ($email): ?>
                            <p><strong>Email:</strong> <?php echo esc_html($email); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($assigned_team_ids) && is_array($assigned_team_ids)): ?>
                            <p><strong>Assigned Teams:</strong></p>
                            <ol>
                                <?php
                                foreach ($assigned_team_ids as $assigned_team_id) :
                                                
                                    $team_title = get_the_title($assigned_team_id);
                                    echo '<li>' . esc_html($team_title) . '</li>';
                                    
                                endforeach;
                                ?>
                            </ol>
                        <?php endif; ?>

                        <?php if ($address): ?>
                            <p><strong>Address:</strong> <?php echo esc_html($address); ?></p>
                        <?php endif; ?>

                        <?php if ($color): ?>
                            <p><strong>Favorite Color:</strong>
                                <span class="color-square" style="color: <?php echo esc_attr($color); ?>">■</span>
                                <?php echo esc_html(ucfirst($color)); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
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
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>
