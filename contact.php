<?php 
/**
 *  Template Name: Contact Page Template
 */
the_post();
  get_header();
?>

    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php echo the_title(); ?>
                </h1>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php 
                    echo the_post_thumbnail("large" );
                    ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

              <?php  
                  if(is_active_sidebar("Contact  Page Maps")){
                     dynamic_sidebar('contact-page-maps'); 
                  }
                ?>
                <?php 
                echo the_content();
                ?>
                    
                <?php  
                  if(is_active_sidebar("Contact Page Description")){
                     dynamic_sidebar('contact-page-description'); 
                  }
                ?>
            </div> <!-- end s-content__main -->

            <h3>Say Hello.</h3>
            
            <?php  
                  if(get_field("contact_form_shortcode")){
                     echo  do_shortcode(get_field("contact_form_shortcode"));
                  }
                ?>


        </article>
    </section> <!-- s-content -->

    <?php 
      
      get_footer();

  ?>