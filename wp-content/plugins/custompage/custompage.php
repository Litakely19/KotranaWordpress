<?php

/**
 * Plugin Name: custompage
 * Plugin URI: https://www.your-site.com/
 * Description: Test pour créer une page dépuis un plugin.
 * Version: 0.1
 * Author: your-name
 * Author URI: https://www.your-site.com/
 **/

// define('PLUGIN_FILE_PATH', __FILE__);

// register_activation_hook(PLUGIN_FILE_PATH, 'insert_page_on_activation');

// function insert_page_on_activation()
// {
//     if (!current_user_can('activate_plugins')) return;

//     $page_slug = 'my-custom-page'; // Slug of the Post
//     $new_page = array(
//         'post_type'     => 'page',                 // Post Type Slug eg: 'page', 'post'
//         'post_title'    => 'My Custom Page',    // Title of the Content
//         'post_content'  => my_custom_form(),    // Content
//         'post_status'   => 'publish',            // Post Status
//         'post_author'   => 1,                    // Post Author ID
//         'post_name'     => $page_slug            // Slug of the Post
//     );
//     if (!get_page_by_path($page_slug, OBJECT, 'page')) { // Check If Page Not Exits
//         $new_page_id = wp_insert_post($new_page);
//     }
// }

// function my_custom_form()
// {
//     $form = '
//     <div>
//         <form action="">
//             <input type="button" value="My first button">
//         </form>
//     </div>';
//     return $form;
// }

// add_shortcode('customformforplugin', 'customformforplugin');
// function customformforplugin()
// {
//     echo ' 
// <style> 
// div { 
// margin-bottom:2px; 
// } 

// input{ 
// margin-bottom:4px; 
// } 
// </style> 
// ';
//     echo '
//     <form action="' . $_SERVER['REQUEST_URI'] . '" method="post"> 
//     <div> 
//     <label for="username">Username <strong>*</strong></label> 
//     <input type="text" name="username" > 
//     </div> 

//     <div> 
//     <label for="password">Password <strong>*</strong></label> 
//     <input type="password" name="password" > 
//     </div> 

//     <div> 
//     <label for="email">Email <strong>*</strong></label> 
//     <input type="text" name="email" > 
//     </div> 

//     <div> 
//     <label for="website">Website</label> 
//     <input type="text" name="website" > 
//     </div> 

//     <div> 
//     <label for="firstname">First Name</label> 
//     <input type="text" name="fname"> 
//     </div> 

//     <div> 
//     <label for="website">Last Name</label> 
//     <input type="text" name="lname" > 
//     </div> 

//     <div> 
//     <label for="nickname">Nickname</label> 
//     <input type="text" name="nickname" > 
//     </div> 

//     <div> 
//     <label for="bio">About / Bio</label> 
//     <textarea name="bio"></textarea> 
//     </div> 
//     <input type="submit" name="submit" value="Register"/> 
//     </form>
//     ';
// }

// global $wp_query;
// echo $wp_query->post->ID;


// function that runs when shortcode is called
// function wpb_demo_shortcode()
// {

//     // Things that you want to do.
//     $form = '
//         <form>
//             <label for="pet-select">Choose a pet:</label>

//             <select name="pets" id="pet-select">
//                 <option value="">--Please choose an option--</option>
//                 <option value="dog">Dog</option>
//                 <option value="cat">Cat</option>
//                 <option value="hamster">Hamster</option>
//                 <option value="parrot">Parrot</option>
//                 <option value="spider">Spider</option>
//                 <option value="goldfish">Goldfish</option>
//             </select>

//         </form>
//     ';

// Output needs to be return
//     return $form;
// }
// add_shortcode('champ_imbrique', 'wpb_demo_shortcode');
add_action('template_redirect', 'showid');
function showid()
{
    global $wp_query;
    $args = array(
        'post_type'      => 'product',
        'product_cat'    => 'Laptop'
    );

    $loop = new WP_Query($args);
    $form = '
        <form>
            <label for="pet-select">Choose a brand:</label>

            <select name="brandproduct" id="brandproduct-select">
            <option>---</option>';
    while ($loop->have_posts()) : $loop->the_post();
        global $product;
        $form .= '
        <option value="' . get_the_id() . '">' . get_the_title() . '</option>
        ';
    endwhile;
    $form .= '
            </select>

            <select name="pets" id="pet-select">
                <option value="">--Please choose an option--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="hamster">Hamster</option>
                <option value="parrot">Parrot</option>
                <option value="spider">Spider</option>
                <option value="goldfish">Goldfish</option>
            </select>

        </form>
    ';
    while ($loop->have_posts()) : $loop->the_post();
        global $product;
        var_dump(get_the_id());
    endwhile;

    wp_reset_query();
    // $theid = intval($wp_query->queried_object->ID);
    $page = get_page_by_title('Produit Imbrique');

    $kv_edited_post = array(
        'post_content' => $form
    );
    wp_update_post($kv_edited_post);
}

add_action('wp_enqueue_scripts', 'loadingScript');
function loadingScript()
{
    wp_enqueue_script(
        'Demos_kely',
        plugin_dir_url(__FILE__) . '/assets/imbrique.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_localize_script('Demos_kely', 'getModels', array(
        'js' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_ajax_getModels', 'getModelsFromBrand');
add_action('wp_ajax_nopriv_getModels', 'getModelsFromBrand');
function getModelsFromBrand()
{

    echo 'selectedwp';
    wp_die();
}

// Create a post type
add_action('init', 'Custom_Post_Type_Brand');
function Custom_Post_Type_Brand()
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

add_action('add_meta_boxes_model', 'add_custom_boxes');
function add_custom_boxes()
{
    add_meta_box('model_brand', 'Brand', 'add_model_boxes');
}

function add_model_boxes()
{
    global $wp_query;
    $args = array(
        'post_type'      => 'brand'
    );

    $loop = new WP_Query($args);
?>
    <label for="model_brand">Choose your brand</label>
    <select name="model_brand" id="model_brand">
        <option value="">--Please choose an option--</option>
        <?php
        while ($loop->have_posts()) : $loop->the_post();
            var_dump(get_the_id());
            // get_the_id() . '">' . get_the_title() 
        ?>
            <option value="<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></option>
        <?php
        endwhile;
        ?>
    </select>
<?php
}
