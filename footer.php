<?php wp_footer(); ?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Recent Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">

                            <?php

                            $recent_posts = get_posts(['numberposts' => 3]);
                            foreach ($recent_posts as $recent_post) {
                            ?>
                                <a href="<?php echo get_permalink($recent_post) ?>"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <?php echo get_the_post_thumbnail($recent_post, 'thumbnail', ['class' => 'float-left img-fluid']); ?>
                                        <h5 class="mb-1"><?php echo $recent_post->post_title ?></h5>
                                        <small><?php echo get_the_date('d M,Y', $recent_post->ID) ?></small>
                                    </div>
                                </a>
                            <?php

                            }
                            ?>

                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">

                            <?php

                            $popular_posts = get_posts([
                                'numberposts' => 3,
                                'orderby' => 'meta_value_num',
                                'meta_key' => 'wpc_post_views',
                                'order' => "DESC"

                            ]);
                            foreach ($popular_posts as $popular_post) {
                            ?>
                                <a href="<?php echo get_permalink($popular_post) ?>"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <?php echo get_the_post_thumbnail($popular_post, 'thumbnail', ['class' => 'float-left img-fluid']); ?>
                                        <h5 class="mb-1"><?php echo $popular_post->post_title ?></h5>
                                        <span class="rating">
                                            <i class="fa fa-eye"></i> <?php echo ((int)(get_post_meta($popular_post->ID, 'wpc_post_views', true))) ?>

                                        </span>
                                    </div>
                                </a>

                            <?php

                            }
                            ?>


                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Categories</h2>
                    <div class="link-widget">
                        <ul>
                            <?php
                            $popular_categories = get_terms([
                                'taxonomy' => 'category',
                                'orderby' => 'count',
                                'order' => 'DESC',
                                'h'
                            ]);
                            if (is_array($popular_categories)) {
                                foreach ($popular_categories as $popular_category) {
                            ?>

                                    <li><a href="<?php echo get_term_link($popular_category); ?>"> <?php echo $popular_category -> name;?> <span><?php echo "(".$popular_category -> count.")"; ?></span></a></li>
                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="widget">
                    <div class="footer-text text-center">
                        <a href="index.html"><img src="assets/images/flogo.png" alt="" class="img-fluid"></a>
                        <p>Cloapedia is a personal blog for handcrafted, cameramade photography content, fashion
                            styles from independent creatives around the world.</p>
                        <div class="social">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-center">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <button type="submit" class="btn btn-primary">Subscribe <i
                                        class="fa fa-envelope-open-o"></i></button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <div class="copyright">&copy; Cloapedia. Design: <a href="http://html.design">HTML Design</a>.
                </div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->
</body>

</html>