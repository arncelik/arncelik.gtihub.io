<?php

/**
 * @package Revolve
 */
function revolve_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {
    $revolve_postlist[0] = array(
        'value' => 0,
        'label' => '--Choose--'
    );
    $arg = array('posts_per_page' => -1);
    $revolve_posts = get_posts($arg);
    foreach ($revolve_posts as $revolve_post) :
        $revolve_postlist[$revolve_post->ID] = array(
            'value' => $revolve_post->ID,
            'label' => $revolve_post->post_title
        );
    endforeach;

    extract($widget_field);

    switch ($revolve_widgets_field_type) {

        // Select field
        case 'selectpost' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($revolve_widgets_name)); ?>"><?php echo esc_html($revolve_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($revolve_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($revolve_widgets_name)); ?>" class="widefat">
                    <?php foreach ($revolve_postlist as $revolve_single_post) { ?>
                        <option value="<?php echo esc_attr($revolve_single_post['value']); ?>" id="<?php echo esc_attr($instance->get_field_id($revolve_single_post['label'])); ?>" <?php selected($revolve_single_post['value'], $athm_field_value); ?>><?php echo esc_html($revolve_single_post['label']); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($revolve_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($revolve_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;
    }
}

function revolve_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($revolve_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } elseif ($revolve_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
        if (!isset($revolve_widgets_allowed_tags)) {
            // If not, fallback to default tags
            $revolve_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return strip_tags($new_field_value, $revolve_widgets_allowed_tags);

        // No allowed tags for all other fields
    } elseif ($revolve_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    } else {
        return strip_tags($new_field_value);
    }
}