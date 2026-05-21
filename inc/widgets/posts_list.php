<?php

class Wpc_Posts_List extends WP_Widget
{

    function __construct()
    {
        parent::__construct('wpc_posts_list', 'Wpc Posts List', ['description' => 'This widget creates a list ']);
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        $title = apply_filters('widget_title', $instance['title']);
        if (!empty($title)) {
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
        }

        $options = [];
        if (isset($instance['order_by']) && $instance['order_by'] == 'post_views') {
            $options['orderby'] = 'meta_value_num';
            $options['meta_key'] = 'wpc_post_views';
        }elseif(isset($instance['order_by']) && $instance['order_by'] == 'post_date'){
                $options['orderby'] = 'date';
        }
        if(isset($instance['order']))
            {
                $options['order'] = $instance['order'];
            }
        if(isset($instance['posts_count']))
            {
                $options['numberposts'] = $instance['posts_count'];
            }
        $popular_posts = get_posts($options);
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
        }
        if (isset($instance['order_by'])) {
            $order_by = $instance['order_by'];
        } else {
            $order_by = 'post_views';
        }
        if (isset($instance['order'])) {
            $order = $instance['order'];
        } else {
            $order = 'DESC';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> Widget Title </label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" id="<?php echo $this->get_field_id('title'); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('posts_count'); ?>"> Posts Count </label>
            <input type="number" name="<?php echo $this->get_field_name('posts_count'); ?>" value="<?php echo esc_attr($posts_count); ?>" min="1" id="<?php echo $this->get_field_id('posts_count'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('alt_content'); ?>"> Alt Content </label>
            <select name="<?php echo $this->get_field_name('alt_content'); ?>" id="<?php echo $this->get_field_id('alt_content'); ?>">
                <option value="post_date" <?php echo ($alt_content == 'post_date') ? 'selected' : ''; ?>> Post Date </option>
                <option value="post_views" <?php echo ($alt_content == 'post_views') ? 'selected' : ''; ?>> Post Views </option>

            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('order_by'); ?>"> Order By </label>
            <select name="<?php echo $this->get_field_name('order_by'); ?>" id="<?php echo $this->get_field_id('order_by'); ?>">
                <option value="post_date" <?php echo ($order_by == 'post_date') ? 'selected' : ''; ?>> Post Date </option>
                <option value="post_views" <?php echo ($order_by == 'post_views') ? 'selected' : ''; ?>> Post Views </option>

            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>"> Order </label>
            <select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>">
                <option value="DESC" <?php echo ($order == 'DESC') ? 'selected' : ''; ?>> DESC </option>
                <option value="ASC" <?php echo ($order == 'ASC') ? 'selected' : ''; ?>> ASC </option>

            </select>
        </p>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = [];

        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : $old_instance['title'];

        $instance['posts_count'] = (
            isset($new_instance['posts_count']) &&
            is_numeric($new_instance['posts_count']) &&
            $new_instance['posts_count'] > 0
        )
            ? (int)$new_instance['posts_count']
            : $old_instance['posts_count'];

        $instance['alt_content'] = (
            isset($new_instance['alt_content']) &&
            in_array($new_instance['alt_content'], ['post_date', 'post_views'])
        )
            ? sanitize_text_field($new_instance['alt_content'])
            : $old_instance['alt_content'];

        $instance['order_by'] = (
            isset($new_instance['order_by']) &&
            in_array($new_instance['order_by'], ['post_date', 'post_views'])
        )
            ? sanitize_text_field($new_instance['order_by'])
            : $old_instance['order_by'];

        $instance['order'] = (
            isset($new_instance['order']) &&
            in_array($new_instance['order'], ['DESC', 'ASC'])
        )
            ? sanitize_text_field($new_instance['order'])
            : $old_instance['order'];

        return $instance;
    }
    // public function update($new_instance, $old_instance)
    // {
    //     $instance = [];
    //     $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : $old_instance['title']; 
    //     $instance['posts_count'] = (isset($new_instance['posts_count']) && is_numeric($new_instance['posts_count']) && $new_instance['posts_count']>0 )? 
    //     ((int) ($new_instance['posts_count']) ): $old_instance['posts_count'] ;
    //     $instance['alt_content'] = (in_array($new_instance['alt_content'] , ['post_date' , 'post_views']) )? $new_instance['alt_content']: $old_instance['alt_content'];

    //     $instance = [];
    //     $instance['title'] = sanitize_text_field($new_instance['title']);
    //     $instance['posts_count'] = (int) $new_instance['posts_count'];
    //     $instance['alt_content'] = sanitize_text_field($new_instance['alt_content']);

    //     return $instance;
    // }
}
