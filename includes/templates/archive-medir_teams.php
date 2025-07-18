<?php get_header(); ?>

<div class="team-archive">
    <h1>Our Teams</h1>

    <?php if (have_posts()) : ?>
        <div class="team-list">
            <?php while (have_posts()) : the_post(); ?>
                <div class="team-item">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <div class="team-description">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p>No teams found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
