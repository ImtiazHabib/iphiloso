<div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
                        <?php 
                            $iphiloso_comment_count = get_comments_number();
                            if( $iphiloso_comment_count <= 1){
                                echo esc_html($iphiloso_comment_count)." ". __("Comment","iphiloso");
                            }else{
                                echo esc_html($iphiloso_comment_count)." ". __("Comments","iphiloso");
                            }
                        ?>
                    </h3>

                    <!-- commentlist -->
                    <ol class="commentlist">

                        <?php 
                         wp_list_comments();
                        ?>

                    </ol> <!-- end commentlist -->


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2"><?php _e("Add Comment","iphiloso") ?></h3>

                        
                            <?php  comment_form(); ?>
                        

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->
