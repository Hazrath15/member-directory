<?php get_header(); ?>

<div class="medir-archive-wrapper">
    <h1>Our Members</h1>

    <div class="member-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="member-card">
                <?php
                $first = get_post_meta(get_the_ID(), '_medir_first_name', true);
                $last  = get_post_meta(get_the_ID(), '_medir_last_name', true);
                $email = get_post_meta(get_the_ID(), '_medir_email', true);
                $image = get_post_meta(get_the_ID(), '_medir_profile_image', true);
                ?>

                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($first . ' ' . $last); ?>" />
                    <h2><?php echo esc_html($first . ' ' . $last); ?></h2>
                    <p><?php echo esc_html($email); ?></p>
                </a>
            </div>
        <?php endwhile; else : ?>
            <p>No members found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>