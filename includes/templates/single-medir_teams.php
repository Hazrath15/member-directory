<?php get_header(); ?>

<div class="team-archive">
    <h1>All Teams</h1>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="team-item">
                <h2><?php the_title(); ?></h2>
                <div class="team-description">
                    <?php the_content(); ?>
                </div>

                <?php
                // Get current team ID
                $team_id = get_the_ID();

                $args = array(
                'meta_key' => '_medir_assigned_teams',
                'meta_value' => '"' . get_the_ID() . '"',
                'meta_compare' => '=',
                'post_type' => 'medir_member'
                );
                // Query members linked to this team
                $members = new WP_Query($args);
                echo '<pre>';
                print_r($members);
                ?>

                <?php if ($members->have_posts()) : ?>
                    <div class="team-members">
                        <h3>Team Members:</h3>
                        <ul>
                            <?php while ($members->have_posts()) : $members->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><em>No members assigned to this team yet.</em></p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>

        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p>No teams found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
