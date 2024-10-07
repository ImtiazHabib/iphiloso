<?php 
 $iphiloso_featured_post =  new  WP_QUERY(
  array(
    'meta-key' => 'featured',
    'meta-value' => '1',
    'posts-per-page' => 3,
  ));

  $featured_post_data = array();

//reading information 
while($iphiloso_featured_post->have_posts()){
    $iphiloso_featured_post->the_post();
    $iphiloso_catagories = get_the_category();
    $featured_post_data[] = array(
        "title"=> get_the_title(),
        "date"=> get_the_date(),
        "thumbnails"=> get_the_post_thumbnail_url(get_the_ID( ),"large"),
        "author"=> get_the_author_meta("display_name"),
        "author_avater"=> get_avatar_url(get_the_author_meta("ID")),
        "cat" => $iphiloso_catagories[mt_rand(0,count($iphiloso_catagories)-1) ]->name,
    );
}

?>
<?php
 if($iphiloso_featured_post->post_count > 1) {
    ?>
<div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">

                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url('<?php echo esc_url($featured_post_data[0]["thumbnails"]) ?>'); ">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"><?php echo esc_html($featured_post_data[0]["cat"]) ?></a></span>

                                <h1><a href="#0" title=""><?php echo esc_html($featured_post_data[0]["title"]) ?></a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="<?php echo esc_html($featured_post_data[0]["author_avater"]) ?>" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0"><?php echo esc_html($featured_post_data[0]["author"]) ?></a></li>
                                        <li><?php echo esc_html($featured_post_data[0]["date"]) ?></li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                            
                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <?php 
                     for($i=1; $i<3; $i++){


                    ?>
                    <div class="featured__column featured__column--small">

                        <div class="entry" style="background-image:url('<?php echo esc_url($featured_post_data[$i]["thumbnails"]) ?>'); ">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"><?php echo esc_html($featured_post_data[$i]["cat"]) ?></a></span>

                                <h1><a href="#0" title=""><?php echo esc_html($featured_post_data[$i]["title"]) ?></a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="<?php echo esc_url($featured_post_data[$i]["author_avater"]) ?>" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0"><?php echo esc_html($featured_post_data[$i]["author"]) ?></a></li>
                                        <li><?php echo esc_html($featured_post_data[$i]["date"]) ?></li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                            
                        </div> <!-- end entry -->


                    </div> <!-- end featured__small -->
                    <?php
                       }
                    ?>
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
</div> <!-- end pageheader-content row -->
<?php

 }
 ?>
