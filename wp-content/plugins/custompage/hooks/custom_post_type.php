<?php

class customPostType
{
    public static function create()
    {
        add_action('init', [self::class, 'Custom_Post_Type_Brand']);
    }

    public static function create_model_meta_boxes()
    {
        add_action('add_meta_boxes_model', [self::class, 'add_model_custom_boxes']);
    }

    public static function add_model_custom_boxes()
    {
        add_meta_box('model_brand', 'Brand', [self::class, 'add_model_boxes']);
    }

    public static function add_model_boxes($post)
    {
        global $wp_query;
        $value = get_post_meta($post->ID, 'model_brand', true);

        $args = array(
            'post_type' => 'brand'
        );

        $loop = new WP_Query($args);
?>
        <label for="model_brand">Choose your brand</label>
        <select name="model_brand" id="model_brand">
            <option value="">--Please choose an option--</option>
            <?php
            while ($loop->have_posts()) : $loop->the_post();
                if (get_the_id() == $value) { //
            ?>
                    <option selected="selected" value="<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></option>
                <?php
                } else {
                ?>
                    <option value="<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></option>
            <?php
                }

            endwhile;
            ?>
        </select>
<?php
    }

    public static function save_meta_post()
    {
        add_action('save_post', [self::class, 'save_model_metabox']);
    }

    public static function save_model_metabox($post_id)
    {
        if (array_key_exists('model_brand', $_POST) && current_user_can('edit_post', $post_id)) {
            update_post_meta($post_id, 'model_brand', $_POST['model_brand']);
        }
    }

    public static function Custom_Post_Type_Brand()
    {
        $brandArgs = [
            'label' => 'Brands',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array(
                'slug' => 'brand',
                'with_front' => false
            ),
            'query_var' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'revisions',
                'thumbnail',
                'author',
                'page-attributes'
            )
        ];


        $modelArgs = [
            'label' => 'Models',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array(
                'slug' => 'model',
                'with_front' => false
            ),
            'query_var' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'revisions',
                'thumbnail',
                'author',
                'page-attributes'
            )
        ];
        register_post_type(
            'brand',
            $brandArgs
        );

        register_post_type(
            'model',
            $modelArgs
        );
    }
}
