<?php get_header(); ?>

<div class="medir-archive-wrapper">

    <div class="breadcrumb-area" style="background:url(<?php echo esc_url(plugins_url( 'assets/img/breadcrumb-bg.png', plugin_dir_path( __DIR__ ) )); ?>) no-repeat center; background-size: cover;">
        <div class="container">
            <h1>Our Members</h1>
        </div>
    </div>
    <div class="container">
        <div class="members-area">
            <div class="row gy-4">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-lg-3 col-md-4 col-sm-2 col-12">
                    <div class="member-card">
                        <?php
                        $first = get_post_meta(get_the_ID(), '_medir_first_name', true);
                        $last  = get_post_meta(get_the_ID(), '_medir_last_name', true);
                        $image = get_post_meta(get_the_ID(), '_medir_profile_image', true);
                        $assigned_team_ids = get_post_meta(get_the_ID(), '_medir_assigned_teams', true);
                        ?>

                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($first . ' ' . $last); ?>" />
                        </a>
                        <div class="content-area">
                            <a href="<?php the_permalink(); ?>"><h2><?php echo esc_html($first . ' ' . $last); ?></h2></a>
                            <?php if (!empty($assigned_team_ids)): ?>
                                <p class="assigned-teams">
                                    <?php 
                                    $team_names = [];
                                    foreach ($assigned_team_ids as $assigned_team_id) : 
                                        $team_title = get_the_title($assigned_team_id);
                                        
                                        if ($team_title) {
                                            $team_names[] = $team_title;
                                        }                                 
                                    endforeach;
                                    echo esc_html(implode(', ', $team_names));
                                    ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                </div>
                <?php endwhile; else : ?>
                    <p>No members found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>