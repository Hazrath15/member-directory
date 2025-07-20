<?php get_header(); ?>

<div class="team-archive">
    <div class="breadcrumb-area" style="background:url(<?php echo esc_url(plugins_url( 'assets/img/breadcrumb-bg.png', plugin_dir_path( __DIR__ ) )); ?>) no-repeat center; background-size: cover;">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="container">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="team-details-area">
                    <div class="team-description">
                        <?php the_content(); ?>
                    </div>
                    <h3>Team Members:</h3>
                    <div class="row">
                        <?php
                        
                        $team_id = get_the_ID();
                        $args = array(
                        'post_type' => 'medir_member',

                        );
                        $members = new WP_Query($args);
                        ?>

                        <?php if ($members->have_posts()) : ?>
                            <?php while ($members->have_posts()) : $members->the_post(); ?>
                                    <?php
                                    $profile_image = get_post_meta(get_the_ID(), '_medir_profile_image', true);
                                    $assigned_team_ids = get_post_meta(get_the_ID(), '_medir_assigned_teams', true);
                                    if (empty($assigned_team_ids) || !is_array($assigned_team_ids) || !in_array($team_id, $assigned_team_ids)) {
                                        continue;
                                    }
                                    ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="assign-member-list">
                                        <div class="image-wrapper">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($profile_image); ?>" alt="" />
                                            </a>
                                        </div>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <p><strong>Assigned Team</strong></p>
                                            <?php
                                            $team_names = [];
                                            if (!empty($assigned_team_ids) && is_array($assigned_team_ids)) :
                                                foreach ($assigned_team_ids as $assigned_team_id) :
                                                    $team_title = get_the_title($assigned_team_id);
                                                    if ($team_title) {
                                                        $team_names[] = $team_title;
                                                    }                
                                                endforeach;
                                                echo esc_html(implode(', ', $team_names));
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                            <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><em>No members assigned to this team yet.</em></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p>No teams found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
