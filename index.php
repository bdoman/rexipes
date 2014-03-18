<?php get_header(); ?>
<section>
    <div class="content">
        <div class="grid">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="experienceBlock">
                    <span><a href="<?php the_permalink() ?>" title="View this Experience"><?php the_title(); ?></a></span>
                </div>
            <?php endwhile; else: ?>
                nothing!
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>