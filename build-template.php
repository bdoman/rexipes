<?php
/*
Template Name: Build Template
*/
?>
<?php get_header(); ?>

        <section id="BuildSection">
                    <div class="content">
                        <form name="contactform" method="post" action="send_form_email.php">
                            <div class="step step_one">
                                <h2>Step 1: <span class="step-title">Head Space</span></h2>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, non, quia recusandae quis placeat repudiandae eos quaerat voluptas iure aspernatur ut hic molestias fugit maxime beatae tenetur ad. Odio, exercitationem!</p>
                            </div>
                            <div class="step step_two">
                                <h2>Step 2: <span class="step-title">The Steps</span></h2>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam odio sapiente non error officiis. Adipisci, incidunt commodi sunt quo cum esse corporis alias id explicabo inventore error omnis expedita ea?</p>
                                <table>
                                
                                
                                    <tr>
                                        <td class="counter-cell"><span class="step-counter">Step 1:</span></td>
                                        <td class="step-cell"><input type="text"  name="comments[]"   value="test" ></td>
                                        <td class="icon-cell"><a href="#" data-action="add">Add</a></td>
                                        <td class="icon-cell"><a href="#" data-action="delete">Remove</a></td>
                                    </tr> 
                                </table>
                            </div>
                            <div class="step step_three">
                                <h2>Step 3: <span class="step-title">The Name</span></h2>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, iure, quam, aliquid eum asperiores repellendus est reiciendis nam saepe reprehenderit sint fugiat doloremque quia eius esse nostrum vero delectus libero.</p>
                                <input type="text"  name="title"   value="test" >
                                    
                                
                            </div>
                            <input type="hidden" name="email" value="hello@brandondoman.com">
                            <input type="submit" name="submit" value="All Done? Send in your Experience!" class="btn" />
                        </form>




                    </div>
                </section>
  
<?php get_footer(); ?>