 <?php


    $post_id = get_the_ID();
    $post_link = get_permalink($post_id);
    $post_title = get_the_title();
    $post_categories = get_the_terms($post_id, 'category');
    ?>



 <div class="pitem item-w1 item-h1">
     <div class="blog-box">
         <div class="post-media">
             <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
                 <?php the_post_thumbnail('medium'); ?>
                 <div class="hovereffect">
                     <span></span>
                 </div><!-- end hover -->
             </a>
         </div><!-- end media -->
         <div class="blog-meta">
             <?php
                foreach ($post_categories as $post_category) {

                    echo '<span class="bg-grey"><a href="' . get_term_link($post_category) . '" title="">' . $post_category->name . '</a></span>';
                }
                ?>
           </div><!-- end meta -->
     </div><!-- end blog-box -->
 </div><!-- end col -->