<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php

        $role = "brewery";
        $this_role = "'[[:<:]]".$role."[[:>:]]'";
        $query = "SELECT * FROM $wpdb->users WHERE ID = ANY (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value RLIKE $this_role) ORDER BY user_nicename ASC LIMIT 10000";
        $users_of_this_role = $wpdb->get_results($query);
        if ($users_of_this_role)
        {
            foreach($users_of_this_role as $user)
            {
                $curuser = get_userdata($user->ID);

                $current_status = pw_new_user_approve()->get_user_status($user->ID);

                if($current_status == "approved")
                {
                    $author_post_url=get_author_posts_url($curuser->ID, $curuser->nicename);
                    echo "<div class='post'>";
                        echo "<a href='.$user_link.' title='.$curuser->display_name.'>";
                            echo "<h2>$curuser->display_name</h2>";
                        echo '</a>';
                        echo "<a href='.$user_link.' title='.$curuser->display_name'>";
                            echo get_avatar($curuser->user_email, '80', $avatar);
                        echo '</a>';
                        echo '<p>'.$curuser->description.'</p>';
                    echo '</div>';
                }
            }
        }
        
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
