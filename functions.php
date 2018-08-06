<?php
/* Functions and stuff for the WP-Dimension theme
   
   Based on HTML5up html5up.net
   
   mods by and blame go to http://cog.dog
*/


// better title support https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
function bigpicture_setup() {
   add_theme_support( 'title-tag' );
   
   // give us thumbnails
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size( 1400, 715, true );


	// image sizes for the Big Picture gallery
	add_image_size( 'gallery-full', 607, 590, true );
	add_image_size( 'gallery-thumb', 440, 276, true );
	
	// another size to give typical width images
	add_image_size( 'bp_size', 700 );

	
	// give us custom headers (used for background of intro section)
	$defaults = array(
		'default-image'          => get_template_directory_uri() . '/images/header.jpg',
		'width'                  => 1400,
		'height'                 => 715,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
	);

	add_theme_support( 'custom-header', $defaults );

}

add_action( 'after_setup_theme', 'bigpicture_setup' );


add_action( 'init', 'bigpicture_register_my_menu' );

function bigpicture_register_my_menu() {
	register_nav_menu( 'bigpicture-social', __( 'Social Media' ) );
}

// add menu order to posts
function bigpicture_posts_order() {
    add_post_type_support( 'post', 'page-attributes' );
}

add_action( 'admin_init', 'bigpicture_posts_order' );


// add post order to posts
function bigpicture_columns_show_columns($name) {
    global $post;

    switch ($name) {
        case 'order':
            $views = $post->menu_order;
            echo $views;
            break;
    }
}

add_action('manage_posts_custom_column',  'bigpicture_columns_show_columns');

/* Sort posts in posts view by menu_order in ascending or descending order. */

// h/t http://wordpress.stackexchange.com/questions/66455/how-to-change-order-of-posts-in-admin
function custom_post_order($query){
    /* 
        Set post types.
        _builtin => true returns WordPress default post types. 
        _builtin => false returns custom registered post types. 
    */
    $post_types = get_post_types(array('_builtin' => true), 'names');
    /* The current post type. */
    $post_type = $query->get('post_type');
    /* Check post types. */
    if(in_array($post_type, $post_types)){
        /* Post Column: e.g. title */
        if($query->get('orderby') == ''){
            $query->set('orderby', 'menu_order');
        }
        /* Post Order: ASC / DESC */
        if($query->get('order') == ''){
            $query->set('order', 'ASC');
        }
    }
}

if (is_admin()){
    add_action('pre_get_posts', 'custom_post_order');
}

// organize the admin view; removed date / category, insert slide order columns
// h/t http://stackoverflow.com/questions/27602116/how-to-add-order-column-in-page-admin-wordpress


add_filter('manage_posts_columns', 'bigpicture_columns');

function bigpicture_columns($columns) {

	$bigpicture_columns = array(); 

	foreach( $columns as $key => $value) { 
		
		if ( $key != 'date' and $key != 'categories' ) $bigpicture_columns[$key] = $value; 
		if ( $key== 'title' ) { 
			$bigpicture_columns['order'] = ' Box Order';
		} 
	}
	
    return $bigpicture_columns;
}



// enqueue the scripts'n styles... do it right!

function bigpicture_scripts() {

	// Big Picture CSS
	wp_register_style( 'bigpicture-style', get_stylesheet_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'bigpicture-style' );

	// poptrox jquery down in the footer you go
	wp_register_script( 'bigpicture-poptrox' , get_stylesheet_directory_uri() . '/assets/js/jquery.poptrox.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bigpicture-poptrox' );

	// scrolly jquery down in the footer you go
	wp_register_script( 'bigpicture-scrollex' , get_stylesheet_directory_uri() . '/assets/js/jquery.scrollex.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bigpicture-scrollex' );

	// scrolly jquery down in the footer you go
	wp_register_script( 'bigpicture-scrolly' , get_stylesheet_directory_uri() . '/assets/js/jquery.scrolly.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bigpicture-scrolly' );
	
	// custom jquery down in the footer you go
	wp_register_script( 'bigpicture-skel' , get_stylesheet_directory_uri() . '/assets/js/skel.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bigpicture-skel' );
	
	wp_register_script( 'bigpicture-util' , get_stylesheet_directory_uri() . '/assets/js/util.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bigpicture-util' );


	wp_register_script( 'bigpicture-main' , get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bigpicture-main' );
	
}

add_action( 'wp_enqueue_scripts', 'bigpicture_scripts' );


/*** Customizer settings to allow editing of a front quote, customizing the footer, and ivon ***/

add_action( 'customize_register', 'bigpicture_register_theme_customizer' );

// register custom customizer stuff

function bigpicture_register_theme_customizer( $wp_customize ) {
	// Create custom panel.
	
	/*	
	$wp_customize->add_panel( 'intro_blocks', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Big Picture Intro', 'bigpicture' ),
		'description'    => __( 'Upfront stuff for the top of the site.', 'bigpicture' ),
	) );
	*/


	// Add setting for header
	$wp_customize->add_setting( 'intro_header_text', array(
		 'default'           => __( 'Hey', 'bigpicture' ),
		 'sanitize_callback' => 'sanitize_text',

	) );
	// Add control for quote
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'intro_header_text',
		    array(
		        'label'    => __( 'Header Text', 'bigpicture' ),
		        'section'  => 'intro_stuff',
		        'settings' => 'intro_header_text',
		        'type'     => 'text'
		    )
	    )
	);


	// Add setting for front text
	$wp_customize->add_setting( 'intro_blurb_content', array(
		 'default'           => __( 'I am a compelling blob of text to put below the big name at the top. Just <em>basic</em> <strong>HTML</strong> is okay here.<br />Linebreaks and <a href="https://cog.dog/">links to cool stuff</a> are good too.', 'bigpicture' ),
		 'sanitize_callback' => 'bigpicture_sanitize_html'
	) );
	// Add control for front text
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'intro_blurb_text',
		    array(
		        'label'    => __( 'Intro Blurb (allowable HTML tags are: a, em, strong, br)', 'bigpicture' ),
		        'section'  => 'intro_stuff',
		        'settings' => 'intro_blurb_content',
		        'type'     => 'textarea'
		    )
	    )
	);	

	// Add setting for menu label
	$wp_customize->add_setting( 'intro_menu_label', array(
		 'default'           => __( 'intro', 'bigpicture' ),
		 'sanitize_callback' => 'slug_text'
	) );
	
	// Add control for menu label
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'intro_menu_label',
		    array(
		        'label'    => __( 'Menu Label (1-2 words is best)', 'bigpicture' ),
		        'section'  => 'intro_stuff',
		        'settings' => 'intro_menu_label',
		        'type'     => 'text'
		    )
	    )
	);

	// Add setting for footer
	$wp_customize->add_setting( 'footer_text_block', array(
		 'default'           => __( '', 'bigpicture' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control for footer
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_footer_text',
		    array(
		        'label'    => __( 'Footer Text', 'bigpicture' ),
		        'section'  => 'intro_stuff',
		        'settings' => 'footer_text_block',
		        'type'     => 'text'
		    )
	    )
	);


	// Add section for header
	$wp_customize->add_section( 'intro_stuff' , array(
		'title'    => __('Intro Section','bigpicture'),
		'priority' => 500
	) );
	
	
 	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
	
	// convert string to a slug-worthy one
	function slug_text ( $text ) {
		 return sanitize_title( $text );
	}

 	// Allow just some html
	function bigpicture_sanitize_html( $value ) {
	
		$allowed_html = [
			'a'      => [
				'href'  => [],
				'title' => [],
			],
			'br'     => [],
			'em'     => [],
			'strong' => [],
		];

		return  wp_kses( $value, $allowed_html );
	}	
	
}


function get_bigpicture_intro_menu_label() {
	 if ( get_theme_mod( 'intro_menu_label') != "" ) {
	 	return ucwords( get_theme_mod( 'intro_menu_label') );
	 }	else {
	 	return 'Intro';
	 }
}


function bigpicture_intro_header() {
	 if ( get_theme_mod( 'intro_header_text') != "" ) {
	 	echo get_theme_mod( 'intro_header_text');
	 }	else {
	 	echo 'Hey!';
	 }
}


function bigpicture_intro_blurb() {
	 if ( get_theme_mod( 'intro_blurb_content') != "" ) {
	 	echo '<p>' . get_theme_mod( 'intro_blurb_content') . '</p>';
	 }	else {
	 	echo '<p>This is the exciting tag line you <strong>might</strong> customize!</p>';
	 }
}


function bigpicture_footer_text() {
	 if ( get_theme_mod( 'footer_text_block') != "" ) {
	 	echo get_theme_mod( 'footer_text_block');
	 }	else {
	 	echo 'Customize this with your own tagline!';
	 }
}


/* post meta boxes 
	https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
	
	One is for the optional short name for buttons, the second for building yjr
*/

function bigpicture_add_meta_boxes( $post ) {

	add_meta_box( 'bigpicture_meta_box', __( 'Extra Big Picture Stuff', 'bigpicture' ), 'bigpicture_build_meta_box', 'post', 'normal', 'high' );
}

add_action( 'add_meta_boxes', 'bigpicture_add_meta_boxes' );

function bigpicture_build_meta_box( $post ){
	
	wp_nonce_field( basename( __FILE__ ), 'bigpicture_meta_box_nonce' );


	// retrieve the  menu label current value
	$button_label = get_post_meta( $post->ID, '_button_label', true );

	?>

			<p>
			<label for="button_label" style="font-weight:bold">Menu Label</label><br />
			This is the short name to use as menu links to this section<br />
			<input type="text" name="button_label" value="<?php echo $button_label; ?>" style="width:100%" />
			</p>	
			
<?php
}

function bigpicture_save_meta_boxes_data( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    
    // got nonce?    
    $is_valid_nonce = ( isset( $_POST[ 'bigpicture_meta_box_nonce' ] ) && wp_verify_nonce( $_POST[ 'bigpicture_meta_box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits if faux save status 
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
	
	// editors only
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	// update page name label
	if ( isset( $_REQUEST['button_label'] ) ) {
		update_post_meta( $post_id, '_button_label', sanitize_text_field( $_POST['button_label'] ) );
	}
	
}

add_action( 'save_post', 'bigpicture_save_meta_boxes_data', 10, 2 );


/* --- shortcodes --------------------------------------------------------------------- */

// generate a numbered list of slides
add_shortcode("bigpicturegallery", "do_bigpicture_gallery");  

function do_bigpicture_gallery( $atts ) {  
 	
 	// use the theme styles to insert a link button. 
 	extract( shortcode_atts( array( "ids" =>  '', "orderby" => "menu_order"), $atts ) ); 
 	
 	 	
 	// convert list of ids to array
 	$pictures = explode(",",  $ids);
 	
 	// mix up order if you want it
 	if ( $orderby == 'rand') shuffle($pictures);
 	
 	$bp_gallery =  '';
 	$leftside = false;


	
	// walk the media ids
	foreach ( $pictures as $pic ) {
	
		// flip the left side flag
		$leftside = !$leftside;
		
		// set image classes
		$side_class = ( $leftside ) ? 'from-left' : 'from-right';
		
		$pic_full = wp_get_attachment_image_src( $pic, 'gallery-full');
		$pic_thumb =  wp_get_attachment_image_src( $pic, 'gallery-thumb');
	
		$bp_gallery .= '<article class="' . $side_class . '"><a href="' . $pic_full[0] . '" class="image fit"><img src="' . $pic_thumb[0] . '" title="' . get_the_title( $pic ) . '" alt="" /></a></article>' . "\n";
	
	}
	
	// return a Big Picture styled gallery code
	return ('<div class="gallery">' . $bp_gallery .'</div>');
	 

}


/**
 * This function assumes you have a Customizer export file in your theme directory
 * at 'data/customizer.dat'. That file must be created using the Customizer Export/Import
 * plugin found here... https://wordpress.org/plugins/customizer-export-import/
 * h/t - https://gist.github.com/fastlinemedia/9a8070b9a636e38b510f
 */
 
function splot_import_customizer_settings()
{
	// Check to see if the settings have already been imported.
	$template = get_template();
	$imported = get_option( $template . '_customizer_import', false );
	
	// Bail if already imported.
	if ( $imported ) {
		return;
	}
	
	// Get the path to the customizer export file.
	$path = trailingslashit( get_stylesheet_directory() ) . 'data/customizer.dat';
	
	// Return if the file doesn't exist.
	if ( ! file_exists( $path ) ) {
		return;
	}
	
	// Get the settings data.
	$data = @unserialize( file_get_contents( $path ) );
	
	// Return if something is wrong with the data.
	if ( 'array' != gettype( $data ) || ! isset( $data['mods'] ) ) {
		return;
	}
	
	// Import options.
	if ( isset( $data['options'] ) ) {
		foreach ( $data['options'] as $option_key => $option_value ) {
			update_option( $option_key, $option_value );
		}
	}
	
	// Import mods.
	foreach ( $data['mods'] as $key => $val ) {
		set_theme_mod( $key, $val );
	}
	
	// Set the option so we know these have already been imported.
	update_option( $template . '_customizer_import', true );
}

add_action( 'after_switch_theme', 'splot_import_customizer_settings' );

function strip_first_numbers( $str ) {
 	// a hack function to remove numbers and dashes from the front of a string to prevent
 	// creating illegale CSS ids (failed to get a proper preg_replace_callback to work 
 	
 	$not_allowed = ['-', '0','1','2','3','4','5','6','7','8','9'];
 	
 	while ($str) {
 		if ( in_array( $str[0], $not_allowed ) ) {
 			 $str = substr($str, 1);
 		} else {
 			return ( $str );
 		}
 	}
 	
}


?>