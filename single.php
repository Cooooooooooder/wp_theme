<?php
$post_id = get_the_ID();
$x = add_post_meta($post_id, 'wpc_post_views', 0, true);
$post_views = get_post_meta($post_id);
$post_link =  get_permalink($post_id);
update_post_meta($post_id, 'wpc_post_views',   $post_views['wpc_post_views'][0] + 1);
get_header();


while (have_posts()) {
    the_post();
?>



    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active">The golden rules you need to know for a positive life</li>
                            </ol>
                            <?php
                            $categorys = get_the_terms($post_id, 'category');
                            if (is_array($categorys)) {
                                foreach ($categorys as $category) {
                                    echo '<span class="color-aqua"><a href="' . get_term_link($category) . '" title="">' . $category->name . '</a></span>';
                                }
                            }
                            ?>

                            <h3> <?php echo get_the_title(); ?> </h3>

                            <div class="blog-meta big-meta">
                                <small><a href="<?php echo get_year_link(get_the_date('Y')); ?>" title=""><?php echo get_the_date('d M, Y', $post_id); ?></a></small>
                                <small><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="">BY <?php echo get_the_author_meta('display_name'); ?></a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo $post_views['wpc_post_views'][0]; ?></a></small>
                            </div><!-- end meta -->


                            <?php get_template_part('single_partials/social_media', null, ['post_link' => $post_link]); ?>
                        </div><!-- end title -->
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="single-post-media">
                                <?php the_post_thumbnail(); ?>
                            </div><!-- end media -->
                        <?php } ?>
                        <div class="blog-content">
                            <?php the_content(); ?>
                        </div><!-- end content -->

                        <div class="blog-title-area">
                            <div class="tag-cloud-single">
                                <span>Tags</span>
                                <?php $tags = get_the_terms($post_id, 'post_tag');
                                if (is_array($tags)) {
                                    foreach ($tags as $tag) {
                                        echo '<small><a href="' . get_term_link($tag) . '" title="">' . $tag->name . '</a></small>';
                                    }
                                }
                                ?>
                            </div><!-- end meta -->

                            <?php get_template_part('single_partials/social_media', null, ['post_link' => $post_link]); ?>

                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis1">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        <div class="custombox prevnextpost clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php if (is_object($prev_post)) { ?>

                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="<?php echo get_permalink($prev_post->ID);  ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <?php echo get_the_post_thumbnail($prev_post, 'thumbnail');  ?>
                                                        <h5 class="mb-1"><?php echo $prev_post->post_title;   ?></h5>
                                                        <small>Prev Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <?php if (is_object($next_post)) { ?>

                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="<?php echo get_permalink($next_post->ID);  ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <?php echo get_the_post_thumbnail($next_post, 'thumbnail');  ?>
                                                        <h5 class="mb-1"><?php echo $next_post->post_title;   ?></h5>
                                                        <small>Next Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">About author</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="#"><?php echo get_the_author_meta('display_name'); ?></a></h4>
                                    <p><?php echo get_the_author_meta('description'); ?></p>

                                    <div class="topsocial">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                    </div><!-- end social -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">You may also like</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="single.html" title="">
                                                <img src="upload/menu_06.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class=""></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="single.html" title="">We are guests of ABC Design Studio</a></h4>
                                            <small><a href="blog-category-01.html" title="">Trends</a></small>
                                            <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="single.html" title="">
                                                <img src="upload/menu_07.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class=""></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="single.html" title="">Nostalgia at work with family</a></h4>
                                            <small><a href="blog-category-01.html" title="">News</a></small>
                                            <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">3 Comments</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">
                                        <div class="media">
                                            <a class="media-left" href="#">
                                                <img src="upload/author.jpg" alt="" class="rounded-circle">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="#">
                                                <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                                            </a>
                                            <div class="media-body">

                                                <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                                <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                            </div>
                                        </div>
                                        <div class="media last-child">
                                            <a class="media-left" href="#">
                                                <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                            </a>
                                            <div class="media-body">

                                                <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">Leave a Reply</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-wrapper">
                                        <input type="text" class="form-control" placeholder="Your name">
                                        <input type="text" class="form-control" placeholder="Email address">
                                        <input type="text" class="form-control" placeholder="Website">
                                        <textarea class="form-control" placeholder="Your comment"></textarea>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
                
                <?php get_sidebar(); ?>

            </div><!-- end row -->
        </div><!-- end container -->
    </section>



<?php
}

get_footer();
?>