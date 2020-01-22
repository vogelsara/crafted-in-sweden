<?php get_header(); ?>

</section>

<section id="posts">

    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="post">
            <div class="inner-post">
                <div class="post-image">
                    <img src="<?php the_post_thumbnail_url(); ?>" />
                </div>
                <div class="post-details">
                    <div class="post-date">
                        <i class="far fa-clock"></i> <?php the_time('Y, M, D') ?>
                    </div>
                    <div class="post-author">
                        <i class="fas fa-feather-alt"></i> <?php the_author() ?>
                    </div>
                </div>
                <div class="post-title">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="post-short-text">
                    <p><?php the_excerpt(); ?></p>
                </div>
                <div class="post-button">
                    <a href="<?php the_permalink() ?>" class="read-button">read</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>

</section>

<?php get_footer(); ?>