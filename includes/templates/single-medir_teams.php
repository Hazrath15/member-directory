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
                'post_type' => 'medir_member',

                );
                // Query members linked to this team
                $members = new WP_Query($args);
                ?>

                <?php if ($members->have_posts()) : ?>
                    <div class="team-members">
                        <h3>Team Members:</h3>
                        <ul>
                            <?php while ($members->have_posts()) : $members->the_post(); ?>
                                
                                    <?php
                                    $assigned_team_ids = get_post_meta(get_the_ID(), '_medir_assigned_teams', true);
                                    if (empty($assigned_team_ids) || !is_array($assigned_team_ids) || !in_array($team_id, $assigned_team_ids)) {
                                        continue;
                                    }
                                    ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                        <?php
                                        // Get assigned team IDs (array)
                                        

                                        if (!empty($assigned_team_ids) && is_array($assigned_team_ids)) :
                                            echo '<ul class="assigned-teams">';
                                            foreach ($assigned_team_ids as $assigned_team_id) :
                                                
                                                $team_title = get_the_title($assigned_team_id);
                                                echo '<li>' . esc_html($team_title) . ' (ID: ' . esc_html($assigned_team_id) . ')</li>';
                                                
                                            endforeach;
                                            echo '</ul>';
                                        endif;
                                        ?>
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
