<?php
/*
Template Name: Build Template
*/
?>
<?php get_header(); ?>

<section id="BuildSection">
    <div class="content">
        <form name="contactform" method="post" id="Rexipe">
            <div class="step step_one clear">
                <h2>Step 1: <span class="step-title">Head Space</span></h2>
                <p class="description">What mood might someone be in to want to experience this rexipe? Select from the list below or add your own.</p>
                <div class="headspace-right">
                    <fieldset id="CommonTags">
                    <?php $tags = get_tags();
                    $html = '';
                    foreach ( $tags as $tag ) {
                        $html .= ' <div class="checkbox"><input type="checkbox" name="headspace" value="'. $tag->name .'"/><label>'. $tag->name . '</label></div>';
                    }
                        echo $html; ?>
                </fieldset>
                </div>
                <div class="headspace-left">
                    <table>
                        <tr>
                <td class="step-cell"><input type="text" id="in" name="customheadspace" value="" placeholder="Add custom headspaces here!" ></td>
                <td class="icon-cell"><a href="#" class="add-headspace">Add</a></td>
            </tr>
        </table>
                <h2 class="dim">Selected Headspaces</h2>
                <div class="selected-headspaces">
                    <p class="empty">None yet! Let's add some.</p>
                </div>

                </div>
            </div>
                <div class="step step_two">
                    <h2>Step 2: <span class="step-title">The Steps</span></h2>
                    <p class="description">Walk us through each step of the experience.</p>
                    <table>
                        <tr>
                            <td class="counter-cell"><span class="step-counter">Step 1:</span></td>
                            <td class="step-cell"><input type="text"  name="comments[]"   value="" ></td>
                            <td class="icon-cell"><a href="#" data-action="add" class="cell-btn add">Add</a></td>
                            <td class="icon-cell"><a href="#" data-action="delete" class="cell-btn delete">Remove</a></td>
                        </tr> 
                    </table>
                </div>
                <div class="step step_three">
                    <h2>Step 3: <span class="step-title">The Name</span></h2>
                    <p class="description">Give your rexipe a title.</p>
                    <input type="text"  name="title"   value="" >
                        
                    
                </div>
                <input type="hidden" name="email" value="hello@brandondoman.com">
                <input type="submit" name="submit" value="All Done? Send it in! You should see it on the site soon." class="btn" />
            </form>




        </div>
    </section>
  
<?php get_footer(); ?>