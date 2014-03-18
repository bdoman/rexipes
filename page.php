<?php get_header(); ?>

<section id="MainSection">
    <div class="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
            <article>
                <div class="box"><h2><?php the_title(); ?></h2></div>

                <div class="box">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; else: ?>
            nothing!
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>