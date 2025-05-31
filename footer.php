  <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3> <?php _e("Popular Posts","iphiloso") ?> </h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <?php 

                     $iphiloso_popular_post = new WP_Query(array(
                        'post_per_page'=> 6,
                        'ignore_sticky_posts'=>1,
                        'orderby'=>"comment_count"
                     ));
                     
                     while($iphiloso_popular_post->have_posts()){
                        $iphiloso_popular_post->the_post();
                        ?>

                         <article class="col-block popular__post">
                        <a href="<?php  the_permalink(); ?>" class="popular__thumb">
                            <?php echo the_post_thumbnail(); ?>
                        </a>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span><?php _e("By","iphiloso") ?></span> <a href="<?php esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>"> <?php the_author(); ?></a></span>
                            <span class="popular__date"><span><?php _e("on","iphiloso") ?></span> <time datetime="2017-12-19"><?php echo the_date(); ?></time></span>
                        </section>
                    </article>
                        <?php
                   
                      }
                  wp_reset_query(  );
                    ?>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
            
                
                <h3>About Philosophy</h3>

                <?php 
                  if(is_active_sidebar("footer-right-description")){
                    dynamic_sidebar("footer-right-description");
                  }
                ?>
            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <?php 
                   $iphiloso_footer_tags_title = apply_filters("iphiloso_footer_tags_title_filter", "Tags");
                   $iphiloso_footer_tags_terms = apply_filters("iphiloso_footer_tags_terms_filter", get_tags());
                ?>
                <h3><?php echo esc_html($iphiloso_footer_tags_title); ?></h3>

                <div class="tagcloud">
                <?php 
                    if(is_array($iphiloso_footer_tags_terms)){
                    foreach($iphiloso_footer_tags_terms as $pti){
                        printf('<a href="%s">%s</a>',get_term_link($pti->term_id),$pti->name);
                    }
                }
                ?>
                </div> 

               
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4><?php _e("Quick Links","iphiloso") ?></h4>

                    <ul class="s-footer__linklist">
                    <?php 
                            wp_nav_menu( array(
                                            'theme_location'  => 'footer-left-menu',
                                            'menu_class'      => 's-footer__linklist',
                                            'depth'                => 1,
                                        ) );
                        ?>
                    </ul>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__archives">
                        
                    <h4><?php _e("Archives","iphiloso") ?></h4>

                    <ul class="s-footer__linklist">
                        <?php 
                            wp_nav_menu( array(
                                            'theme_location'  => 'footer-middle-menu',
                                            'menu_class'      => 's-footer__linklist',
                                        ) );
                        ?>
                    
                    </ul>

                </div> <!-- end s-footer__archives -->

                <div class="col-two md-four mob-full s-footer__social">
                        
                    <h4><?php _e("Social Links","iphiloso") ?></h4>

                    <ul class="s-footer__linklist">
                    <?php 
                            wp_nav_menu( array(
                                            'theme_location'  => 'footer-right-menu',
                                            'menu_class'      => 's-footer__linklist',
                                        ) );
                        ?>
                    </ul>

                </div> <!-- end s-footer__social -->

                <div class="col-five md-full end s-footer__subscribe">
                        
                    <h4><?php echo __("Our NewsLatter","iphiloso"); ?></h4>

                    <?php 
                       if(is_active_sidebar('footer-our-newsletter')){
                        dynamic_sidebar('footer-our-newsletter');
                       }
                    ?>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <?php 
                       if(is_active_sidebar('copyright')){
                        dynamic_sidebar('copyright');
                       }
                    ?>
                    

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <?php wp_footer(); ?>
</body>

</html>