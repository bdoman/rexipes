<?php get_header(); ?>

<section id="MainSection">
    <div class="content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
                $headspaces = get_field('headspace');
                
            ?>
                <article>
                    <div class="box"><h2><?php the_title(); ?></h2></div>
                    <div class="clear">
                    <div class="headspaces">
                        <span class="title">For when you're feeling...</span>
                    <h3>
                    <?php $output = ''; ?>
                    <?php foreach( $headspaces as $headspace ): ?>
 
                        <?php $output = $output . $headspace->name . ', ';?>
                        
                    <?php endforeach; ?>
                    <?php $output = substr($output, 0, -2);
                     echo $output;?>
                     </h3>
                 </div>
                 <div class="number">
                    <span class="title"># of People</span>
                    <h3><?php the_field('friends'); ?></h3>
                </div>
            </div>
                <div class="box rexipe">
                    <p><?php the_field('steps'); ?></p>
                </div>
                                      
                </article>
                                <?php endwhile; else: ?>
                                    nothing!
                                <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>