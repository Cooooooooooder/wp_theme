<?php

class Wpc_Instagram extends WP_Widget
{
    function __construct()
    {
        parent::__construct('wpc_instagram_widget', 'WPC Instagram', ['description' => 'This widget allow you to embed instagram post']);
    }
    function widget($args, $instance)
    {
        echo $args['before_widget'];
        $title = apply_filters('widget_title', $instance['title']);
        if (!empty($title)) {
        echo $args['before_title'] . $title . $args['after_title'];
        }
        echo $instance['embedded_code'];
        echo $args['after_widget'];
    }

    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = "Our Amazing Post";
        }

        if (isset($instance['embedded_code'])) {
            $embedded_code = $instance['embedded_code'];
        } else {
            $embedded_code = "Code";
        }
?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"> Title </label>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?>" value="<?php echo esc_attr($title) ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('embedded_code') ?>"> Embedded code for Instagram </label>
            <textarea name="<?php echo $this->get_field_name('embedded_code') ?>" id="<?php echo $this->get_field_id('embedded_code') ?>">
        <?php echo $embedded_code ?>
    </textarea>
        </p>


<?php
    }
    function update($new_instance, $old_instance)
    {
        $new_data = [];
        if (!empty($new_instance['title'])) {
            $new_data['title']  = strip_tags($new_instance['title']);
        } else {
            $new_data['title'] = $old_instance['title'];
        }
        if (!empty($new_instance['embedded_code'])) {
            $new_data['embedded_code']  = $new_instance['embedded_code'];
        } else {
            $new_data['embedded_code'] = $old_instance['embedded_code'];
        }
        return $new_data;
    }
}

