 <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6"><?php _e("Site Navigation","iphiloso"); ?></h2>

                     

                        <!-- showing nav menu -->
                        <?php 
                          $iphiloso_navigation_menu = wp_nav_menu( array(
                              'theme_location'  => 'topmenu',
                              'menu_class'      => 'header__nav',
                              'menu_id'         => 'topmenu',
                              'echo'=> false,
                          ) );
                          $iphiloso_navigation_menu = str_replace('menu-item-has-children','has-children', $iphiloso_navigation_menu );
                          echo wp_kses_post($iphiloso_navigation_menu);
                        ?>


                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu"><?php _e("Close","iphiloso"); ?></a>

                </nav> <!-- end header__nav-wrap -->
