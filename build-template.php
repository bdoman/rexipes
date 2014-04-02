<?php
/*
Template Name: Build Template
*/
?>
<?php get_header(); ?>

        <section id="BuildSection">
                    <div class="content">
                        <form name="contactform" method="post" action="/send_form_email.php">
                            <div class="step step_one">
                                <h2>Step 1: <span class="step-title">Head Space</span></h2>
                                <p class="description">What mood might someone be in to want to experience this rexipe?</p>
                            </div>
                            <div class="step step_two">
                                <h2>Step 2: <span class="step-title">The Steps</span></h2>
                                <p class="description">Walk us through each step of the experience.</p>
                                <table>
                                
                                
                                    <tr>
                                        <td class="counter-cell"><span class="step-counter">Step 1:</span></td>
                                        <td class="step-cell"><input type="text"  name="comments[]"   value="test" ></td>
                                        <td class="icon-cell"><a href="#" data-action="add" class="cell-btn add">Add</a></td>
                                        <td class="icon-cell"><a href="#" data-action="delete" class="cell-btn delete">Remove</a></td>
                                    </tr> 
                                </table>
                            </div>
                            <div class="step step_three">
                                <h2>Step 3: <span class="step-title">The Name</span></h2>
                                <p class="description">Give your rexipe a title.</p>
                                <input type="text"  name="title"   value="test" >
                                    
                                
                            </div>
                            <input type="hidden" name="email" value="hello@brandondoman.com">
                            <input type="submit" name="submit" value="All Done? Send it in! You should see it on the site soon." class="btn" />
                        </form>




                    </div>
                </section>
  
<?php get_footer(); ?>