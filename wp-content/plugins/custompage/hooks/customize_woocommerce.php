<?php

class CustomizeWC
{
    public static function add_product_meta()
    {
        add_action('woocommerce_product_options_general_product_data', [self::class, 'add_product_brand_meta_field']);
        add_action('woocommerce_process_product_meta', [self::class, 'save_meta']);
    }

    public static function save_meta($post_id)
    {
        $woocommerce_select = $_POST['_brand_select'];
        if (!empty($woocommerce_select))
            update_post_meta($post_id, '_brand_select', esc_attr($woocommerce_select));
        else {
            update_post_meta($post_id, '_brand_select',  '');
        }
    }

    public static function add_product_brand_meta_field()
    {
        global $wp_query, $post;

        $args = array(
            'post_type' => 'brand'
        );

        $value = get_post_meta($post->ID, '_brand_select', true);
        if (empty($value)) $value = '';

        $loop = new WP_Query($args);
        $brands = $loop->posts;
        $options[''] = __('Select a value', 'woocommerce'); // default value
        foreach ($brands as $key => $brand) {
            $options[$brand->ID] = $brand->post_title;
        }

        echo '<div class="options_group">';

        woocommerce_wp_select(array(
            'id'      => '_brand_select',
            'label'   => 'Brand',
            'options' =>  $options,
            'value'   => $value,
        ));

        echo '</div>';
    }
}
