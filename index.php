<?php get_header(); ?>
<section class="intro">
  
        <div class="content">
        
            <p>Rexip.es are experiences blah blah this is where you could do a little intro pitch about just what exactly we're looking it. So, there was that.<br />Then a call to action!</p>
            <div class="callout">
                <a href="/" class="btn"><span class="text">Explore</span><span class="icon">!</span></a>
                <a href="/about" class="btn"><span class="text">Learn More</span><span class="icon">?</span></a>
                <a href="/build" class="btn"><span class="text">Build Your Own</span><span class="icon">+</span></a>
            </div>
        </div>
        

    </section>
    <section class="experiences">
    <div class="content">
               

        <div class="filter-bar">
        <div class="filter-closed open clear">
          <h4>Let's explore some experiences!</h4> <a class="btn-small filter-btn">Filter +</a>
        </div>
        <div class="filter-open clear">
          <h4>Tell us how you're feeling...</h4> <a class="btn-small close-btn">X</a>
        </div>
        <div class="filter-expand">
        <form class="controls" id="Filters">

  
  <fieldset>
     <!-- We can add an unlimited number of "filter groups" using the following format: -->
    <div class="checkbox">
      <input type="checkbox" value=".adventurous"/>
      <label>Adventurous</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".in-a-rut"/>
      <label>In a Rut</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".hungry"/>
      <label>Hungry</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".introspective"/>
      <label>Introspective</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".drunk"/>
      <label>Drunk</label>
    </div>

  </fieldset>
   <!-- <button id="Reset">Clear Filters</button> -->
</form>
</div>
        </div>
        <div class="grid">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
             <?php
                
                 $posttags = get_the_tags();
                 $slugs = '';
                $output = '';
                        if ($posttags) {
                        foreach($posttags as $tag) {
                             $slugs = $slugs . $tag->slug . ' ';
        
                            }
                        }
                        $slugs = rtrim($slugs, ", \t\n");

            ?>
                <div class="experienceBlock mix <?php echo $slugs; ?>">
                    <a href="<?php the_permalink() ?>" title="View this Experience"><span class="experienceTitle"><?php the_title(); ?></span>
                        </a>
                        <span class="meta">
                        
                    <?php  ?>
                    

                     <?php
                        
                        if ($posttags) {
                        foreach($posttags as $tag) {
                             $output = $output . '#' . $tag->name . ', ';
                             
                            }
                        }
                         $output = rtrim($output, ", \t\n");
                        echo $output; ?>
                     </span>
                     

                </div>
            <?php endwhile; else: ?>
                nothing!
            <?php endif; ?>
            <div class="placeholder"></div>
        </div>
    </div>
    </section>


<?php get_footer(); ?>