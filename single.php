<?php 
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
                <ul class="s-content__header-meta">
                    <li class="date"><?php echo the_date(); ?></li>
                    <li class="cat">
                        In
                        <?php
                        the_category(" "); 
                        ?>
                    </li>
                </ul>
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
                echo the_content();
                ?>
                <p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                       <?php 
                       the_tags("","","");
                       ?>
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    
                     <?php echo get_avatar(get_the_author_meta("ID")) ?>
                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href=""><?php the_author(); ?></a>
                        </h4>
                    
                        <?php 
                            echo the_author_meta("description");
                        ?>

                        <ul class="s-content__author-social">
                            <?php 
                              $iphiloso_user_facebook_url = get_field("facebook","user_". get_the_author_meta("ID") );
                              $iphiloso_user_twitter_url = get_field("twitter","user_". get_the_author_meta("ID") );
                              $iphiloso_user_linkedin_url = get_field("linkedin","user_". get_the_author_meta("ID") );
                            ?>
                           <li><a href="<?php echo esc_url($iphiloso_user_facebook_url); ?>">Facebook</a></li>
                           <li><a href="<?php echo esc_url($iphiloso_user_twitter_url); ?>">Twitter</a></li>
                           <li><a href="<?php echo esc_url($iphiloso_user_linkedin_url); ?>">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <div class="s-content__prev">
                            <?php 
                              $iphiloso_previous_post = get_previous_post();

                              if( $iphiloso_previous_post ){
                                ?>
                                <a href="<?php echo get_the_permalink($iphiloso_previous_post); ?>" rel="prev">
                                <span><?php _e("Previous Post","iphiloso") ?></span>
                                <?php echo get_the_title($iphiloso_previous_post); ?>
                                </a>
                                <?php
                              }
                            ?>
                            
                        </div>

                        <div class="s-content__next">
                        <?php 
                              $iphiloso_next_post = get_next_post();

                              if( $iphiloso_next_post ){
                                ?>
                                <a href="<?php echo get_the_permalink($iphiloso_next_post); ?>" rel="next">
                                <span><?php _e("Next Post","iphiloso") ?></span>
                                <?php echo get_the_title($iphiloso_next_post); ?>
                                </a>
                                <?php
                              }
                            ?>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
        <?php 
         if(!post_password_required()){
            comments_template();
         }
        ?>
    </section> <!-- s-content -->

    <?php 
      
      get_footer();

  ?>