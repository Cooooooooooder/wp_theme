<?php

class Wpc_Search extends WP_Widget
{
    function __construct()
    {
        parent::__construct('wpc_search_widget', 'WPC Search', ['description' => 'add a search field']);
    }

    function widget($args, $instance)
    {
        echo $args['before_widget'];
        $title = apply_filters('widget_title', $instance['title']);
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
?>
        <form class="form-inline search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="<?php echo esc_attr($instance['place_holder']) ?>">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </form>
    <?php

        echo $args['after_widget'];
    }
    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = "Search";
        }
        if (isset($instance['place_holder'])) {
            $place_holder = $instance['place_holder'];
        } else {
            $place_holder = "Search";
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"> Widget Title </label>
            <input type='text' name='<?php echo $this->get_field_name('title') ?>' id='<?php echo $this->get_field_id('title') ?>' value="<?php echo  esc_attr($title) ?>">

</p>
        <p>
            <label for="<?php echo $this->get_field_id('place_holder') ?>"> Place Holder </label>
            <input type='text' name='<?php echo $this->get_field_name('place_holder') ?>' id='<?php echo $this->get_field_id('place_holder') ?>' value="<?php echo esc_attr($place_holder) ?>">

</p>
    <?php
    }
    function update($new_instance, $old_instance)
    {
        $new_data = [];
        $new_data['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : $old_instance['title'];
        $new_data['place_holder'] = (!empty($new_instance['place_holder'])) ? strip_tags($new_instance['place_holder']) : $old_instance['place_holder'];
        return $new_data;
    }
}