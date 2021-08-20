
<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


function replace_text_wps($text){
  $replace = array(
      // 'WORD TO REPLACE' => 'REPLACE WORD WITH THIS'
      '&' => ' ',
      'quot;' => ' ',
      'amp;' => ' ',
      '#8230;'=>' ',
      '#8221;'=>' ',

  );
  $text = str_replace(array_keys($replace), $replace, $text);
  return $text;
}

add_filter('the_content', 'replace_text_wps');

function no_self_ping( &$links ) {
  $home = get_option( 'home' );
  foreach ( $links as $l => $link )
      if ( 0 === strpos( $link, $home ) )
          unset($links[$l]);
}

add_action( 'pre_ping', 'no_self_ping' );

function admin_bar(){
  if(is_user_logged_in()){
    add_filter( 'show_admin_bar', '__return_true' , 1000 );
  }
}
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');
 
//Lets add Open Graph Meta Info
 
function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
        echo '<meta property="fb:admins" content="YOUR USER ID"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="www.diniresimler.com"/>';
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
        $default_image="http://www.diniresimler.com/wp-content/uploads/2018/12/en-buyuk-sevaplar-nelerdir.jpg"; //replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
";
}

function new_excerpt_length($length) {
return 35;
}
add_filter('excerpt_length', 'new_excerpt_length');
 

function new_excerpt_more($more) {

}
// /*Öne çıkan görsel bas*/
add_theme_support( 'post-thumbnails');
set_post_thumbnail_size( 1200, 675, true );
add_image_size( 'single-post-thumbnail', 1200, 675);

/*Öne çıkan görsel son */

/** Menu **/

function register_my_menus() {
  register_nav_menus(
    array(
      'Header' => __( 'Header' )
    
    )
  );
}
add_action( 'init', 'register_my_menus' );
/** Menu **/

/** YORUM LISTELE**/
//** Sayfalama Başlangıç **//

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	function wpex_pagination() {
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
}

function webp_upload_mimes($existing_mimes) {
  $existing_mimes['webp'] = 'image/webp';
  return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

function webp_is_displayable($result, $path) {
  if ($result === false) {
      $displayable_image_types = array( IMAGETYPE_WEBP );
      $info = @getimagesize( $path );

      if (empty($info)) {
          $result = false;
      } elseif (!in_array($info[2], $displayable_image_types)) {
          $result = false;
      } else {
          $result = true;
      }
  }
  return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);
add_filter('autoptimize_filter_css_replacetag','te_css_replacetag',10,1);
function te_css_replacetag($replacetag) {
	return array("</body>","before");
  }
  if( !function_exists( 'pf_print_styles_in_footer' ) ) {
    function pf_print_styles_in_footer() {
      if ( ! doing_action( 'wp_head' ) ) { // ensure we are on head
        return;
      }
      global $wp_styles;
      // save actual queued scripts and styles
      $queued_styles  = $wp_styles->queue;
      // empty the scripts and styles queue
      $wp_styles->queue  = array();
      $wp_styles->to_do  = array();
      add_action( 'wp_footer', function() use( $queued_styles ) {
        // reset the queue to print scripts and styles in footer
        global $wp_scripts, $wp_styles;
        $wp_styles->queue  = $queued_styles;
        $wp_styles->to_do  = $queued_styles;
      }, 0 );
    }
  }
  add_action( 'wp_print_styles', 'pf_print_styles_in_footer', 999 );



  add_filter( 'the_content', 'remove_br_gallery', 11, 2);
function remove_br_gallery($output) {
    return preg_replace('/<br style=(.*)>/mi', '', $output);
}
?>

