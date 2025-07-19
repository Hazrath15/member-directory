<?php get_header(); ?>

<div class="team-archive">

    <div class="container">
        <h1>Our Teams</h1>
        <div class="team-list">
            <?php if (have_posts()) : ?>
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-2 col-12">
                        <div class="team-item">
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <div class="team-description">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <p>No teams found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
