<?php

class Wpc_Popular_Posts extends WP_Widget
{

    function __construct()
    {
        parent::__construct('wpc_popular_posts', 'Wpc Popular Posts');
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (isset($instance['title'])) {
            echo $args['before_title'];
            echo $instance['title'];
            echo $args['after_title'];
        }
        $popular_posts = get_posts([
            'numberposts' => (isset($instance['posts_count']) && is_numeric($instance['posts_count']) && $instance['posts_count'] > 0) ? $instance['posts_count'] : 4,
            'orderby' => 'meta_value_num',
            'meta_key' => 'wpc_post_views',
            'order' => "DESC"

        ]);
        if (count($popular_posts)) {
            echo '<div class="blog-list-widget"> <div class="list-group">  ';
            foreach ($popular_posts as $popular_post) {
?>
                <a href="<?php echo get_permalink($popular_post) ?>"
                    class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="w-100 justify-content-between">
                        <?php echo get_the_post_thumbnail($popular_post, 'thumbnail', ['class' => 'float-left img-fluid']); ?>
                        <h5 class="mb-1"><?php echo $popular_post->post_title ?></h5>
                        <span class="rating">
                            <?php
                            if (isset($instance['alt_content']) && $instance['alt_content'] == 'post_views') {
                            ?>
                                <i class="fa fa-eye"></i> <?php echo ((int)(get_post_meta($popular_post->ID, 'wpc_post_views', true))) ?>
                            <?php } else {
                                echo get_the_date('d M,Y', $popular_post);
                            } ?>
                        </span>
                    </div>
                </a>

        <?php

            }
            echo '</div>';
            echo '</div>';
        }

        echo $args['after_widget'];
    }



    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = 'Popular Posts';
        }
        if (isset($instance['posts_count'])) {
            $posts_count = $instance['posts_count'];
        } else {
            $posts_count = 4;
        }
        if (isset($instance['alt_content'])) {
            $alt_content = $instance['alt_content'];
        } else {
            $alt_content = 'post_date';
        } ?>
        <p>
            <label for=""> Widget Title </label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
        </p>

        <p>
            <label for=""> Posts Count </label>
            <input type="number" name="<?php echo $this->get_field_name('posts_count'); ?>" value="<?php echo $posts_count; ?>" min="1" id="">
        </p>
        <p>
            <label for=""> Alt Content </label>
            <select name="<?php echo $this->get_field_name('alt_content'); ?>" id="">
                <option value="post_date" <?php echo ($alt_content == 'post_date') ? 'selected' : ''; ?>> Post Date </option>
                <option value="post_views" <?php echo ($alt_content == 'post_views') ? 'selected' : ''; ?>> Post Views </option>

            </select>
        </p>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = [];

        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['posts_count'] = (int) $new_instance['posts_count'];
        $instance['alt_content'] = sanitize_text_field($new_instance['alt_content']);

        return $instance;
    }
}


add_action('widgets_init', function () {
    register_widget('Wpc_Popular_Posts');
});
