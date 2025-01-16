<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php
        endwhile;
    else :
        echo '<p>Không có bài viết nào.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
