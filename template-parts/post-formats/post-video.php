<article class="masonry__brick entry format-video" data-aos="fade-up">
                <!-- retreve information of src field  -->
                 <?php 
                    $iphiloso_video_file ="";
                    if(function_exists("the_field")){
                        $iphiloso_video_file = get_field("source_file");
                    }
                 ?>
                    <div class="entry__thumb video-image">
                        <a href="<?php echo esc_url($iphiloso_video_file); ?>?color=01aef0&title=0&byline=0&portrait=0" data-lity>
                            <img src="<?php echo get_theme_file_uri() ?>/assets/markup/images/thumbs/masonry/shutterbug-400.jpg" 
                                    srcset="<?php echo get_theme_file_uri() ?>/assets/markup/images/thumbs/masonry/shutterbug-400.jpg 1x, <?php echo get_theme_file_uri() ?>/assets/markup/images/thumbs/masonry/shutterbug-800.jpg 2x" alt="">
                        </a>
                    </div>
    
                    <?php get_template_part("template-parts/common/summary"); ?>
    
                </article> <!-- end article -->
