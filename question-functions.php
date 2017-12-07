<?php

/* Create Question post type */
// Credits to inspectorfegter for this kickass Gist
// https://gist.github.com/inspectorfegter/1207830/bca7bf7804f0eae9e5627967ac6c9421ddc79210#file-wysiwyg-meta-box-php

function custom_post_type() {

    // Set UI labels
	$labels = array(
		'name'                => __( 'Questions'),
		'singular_name'       => __( 'Question'),
		'menu_name'           => __( 'Questions'),
		'all_items'           => __( 'All Questions'),
		'view_item'           => __( 'View Question'),
		'add_new_item'        => __( 'Add New Question'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Question'),
		'update_item'         => __( 'Update Question'),
		'search_items'        => __( 'Search Question'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
    
    // Set other options for Custom Post Type	
	$args = array(
		'label'               => __( 'questions'),
		'description'         => __( 'Questions + Hints + Answers in Database'),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'topics', 'post_tag'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 2,
        'menu_icon'           => 'dashicons-star-empty',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page'
	);
	
	// Registering your Custom Post Type
	register_post_type( 'question', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'custom_post_type', 0 );

// --------------------- //
// --------------------- //
// --------------------- //

/* Create Topic Taxonomy */
add_action( 'init', 'create_taxonomies', 0 );

function create_taxonomies() 
{
        // Topics
        $labels = array(
        'name' => _x( 'Topics', 'taxonomy general name' ),
        'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Topics' ),
        'popular_items' => __( 'Popular Topics' ),
        'all_items' => __( 'All Topics' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Topic' ), 
        'update_item' => __( 'Update Topic' ),
        'add_new_item' => __( 'Add New Topic' ),
        'new_item_name' => __( 'New Topic Name' ),
        'separate_items_with_commas' => __( 'Separate topics with commas' ),
        'add_or_remove_items' => __( 'Add or remove topics' ),
        'choose_from_most_used' => __( 'Choose from the most used topics' ),
        'menu_name' => __( 'Topics' ),
        ); 

        register_taxonomy('topic','question',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'topic' ),
        ));
}

// --------------------- //
// --------------------- //
// --------------------- //

/* Tie hints and answers to questions, allow input as a WYSIWYG meta field. */

define('WYSIWYG_META_HINT_ID', 'hint-editor');
define('WYSIWYG_META_ANSWER_ID', 'answer-editor');
define('WYSIWYG_META_HINT_KEY', 'extra-hint');
define('WYSIWYG_META_ANSWER_KEY', 'extra-answer');

add_action('admin_init', 'wysiwyg_register_meta_box');
add_action('save_post', 'question_save_meta');

function wysiwyg_register_meta_box(){
        add_meta_box(WYSIWYG_META_HINT_ID, __('Hint', 'gfd_hint'), 'hint_meta_box', 'question');
        add_meta_box(WYSIWYG_META_ANSWER_ID, __('Answer', 'gfd_answer'), 'answer_meta_box', 'question');
}

function hint_meta_box(){
        echo wysiwyg_render_meta_box(WYSIWYG_META_HINT_ID, WYSIWYG_META_HINT_KEY);
}

function answer_meta_box(){
        echo wysiwyg_render_meta_box(WYSIWYG_META_ANSWER_ID, WYSIWYG_META_ANSWER_KEY);
}

function wysiwyg_render_meta_box($meta_box_id, $meta_key){
        
    //Add CSS & jQuery goodness to make this work like the original WYSIWYG
    $output = "
            <style type='text/css'>
                    #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                    #$meta_box_id #editorcontainer{background:#fff !important;}
            </style>
        
            <script type='text/javascript'>
                    jQuery(function($){
                            $('#$meta_box_id #editor-toolbar > a').click(function(){
                                    $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                    $(this).addClass('active');
                            });
                            
                            if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                    $('#$meta_box_id #ed_toolbar').hide();
                            }
                            
                            $('#$meta_box_id #edButtonPreview').click(function(){
                                    $('#$meta_box_id #ed_toolbar').hide();
                            });
                            
                            $('#$meta_box_id #edButtonHTML').click(function(){
                                    $('#$meta_box_id #ed_toolbar').show();
                            });
            //Tell the uploader to insert content into the correct WYSIWYG editor
            jQuery('#media-buttons a').bind('click', function(){
                var customEditor = $(this).parents('#$meta_box_id');
                if(customEditor.length > 0){
                    edCanvas = document.getElementById('$meta_box_id');
                }
                else{
                    edCanvas = document.getElementById('content');
                }
            });
                    });
            </script>
    ";
    
    //Create The Editor
    global $post;
    $content = get_post_meta($post->ID, $meta_key, true);
    wp_editor($content, $meta_key);
    
    //Clear The Room!
    $output = $output . "<div style='clear:both; display:block;'></div>";

    return $output;
}

function question_save_meta(){
        global $post;
        if ('question' == get_post_type()){
                if (isset($_POST[WYSIWYG_META_HINT_KEY]))
                {
                        $data = $_POST[WYSIWYG_META_HINT_KEY];
                        update_post_meta($post->ID, WYSIWYG_META_HINT_KEY, wpautop($data));
                }

                if (isset($_POST[WYSIWYG_META_ANSWER_KEY]))
                {
                        $data = $_POST[WYSIWYG_META_ANSWER_KEY];
                        update_post_meta($post->ID, WYSIWYG_META_ANSWER_KEY, wpautop($data));
                }  
        }
}