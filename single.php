<?php get_header(); ?>

<section id="MainSection">
    <div class="content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
                 $posttags = get_the_tags();
                
            ?>
                <article>
                    <div class="box"><h2><?php the_title(); ?></h2></div>
                    <div class="clear">
                    <div class="headspaces">
                        <span class="title">For when you're feeling...</span>
                    <h3>
                    <?php
                        
                        if ($posttags) {
                        foreach($posttags as $tag) {
                             $output = $output . $tag->name . ', ';
                             
                            }
                        }
                         $output = rtrim($output, ", \t\n");
                        echo $output; ?>
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