<?php 


/* BizzThemes WordPress theme framework by Zeljan Topic */

//** DEFINE DIRECTORY CONSTANTS **//
	
	if ( ! defined( 'BIZZ_LIB_FRAME' ) )
		define('BIZZ_LIB_FRAME', TEMPLATEPATH . '/lib_frame');        // Framework Library
	if ( ! defined( 'BIZZ_LIB_THEME' ) )
		define('BIZZ_LIB_THEME', TEMPLATEPATH . '/lib_theme');        // Theme Library
	if ( ! defined( 'BIZZ_LIB_CUSTOM' ) )
		define('BIZZ_LIB_CUSTOM', TEMPLATEPATH . '/custom');          // Custom Library
	
//** DEFINE CSS FILE CONSTANTS **//

    if ( ! defined( 'BIZZ_STYLE_CSS' ) )
		define('BIZZ_STYLE_CSS', TEMPLATEPATH . '/style.css');        // General CSS styles
	if ( file_exists(TEMPLATEPATH . '/custom')){
		if ( ! defined( 'BIZZ_LAYOUT_CSS' ) )
			define('BIZZ_LAYOUT_CSS', BIZZ_LIB_CUSTOM . '/layout.css');   // Layout CSS styles (generated automatically)
		if ( ! defined( 'BIZZ_CUSTOM_CSS' ) )
			define('BIZZ_CUSTOM_CSS', BIZZ_LIB_CUSTOM . '/custom.css');   // Custom CSS styles (generated manually by user)
	}
	
//** DEFINE VARIABLE CONSTANTS **//

	require_once (BIZZ_LIB_THEME . '/theme_variables.php');       // THEME VARIABLES
    require_once (BIZZ_LIB_FRAME . '/frame_variables.php');       // FRAMEWORK VARIABLES	
	require_once (BIZZ_LIB_THEME . '/theme_constants.php');       // THEME CONSTANTS
	if (file_exists(TEMPLATEPATH . '/custom')) {
		include_once (BIZZ_LIB_CUSTOM . '/custom_functions.php');     // CUSTOM FILES
	}
	
//** MAKE THEME TRANSLATABLE **//
	load_theme_textdomain( 'bizzthemes', BIZZ_LIB_CUSTOM . '/lang' );
	
	
/* DIGITAL DESIGNS EDITS BELOW*/

	
	//** ADD PROFILE IMAGE **//
	
	<table class="form-table">
 
<tr>
<th><label for="pic">Profile Image</label></th>
 
<td>
<img src="<?php echo esc_attr( get_the_author_meta( 'pic', $user->ID ) ); ? >">
<input type="text" name="pic" id="pic" value="< ?php echo esc_attr( get_the_author_meta( 'pic', $user->ID ) ); ?>" class="regular-text" /><input type='button' class="button" value="Upload" id="upload" />
<span class="description">Select an image and upload it for use on your profile.</span>
</td>
</tr>
 
</table>


<?php }

function zkr_profile_upload_js() {
?>
<?php
}
add_action('admin_head','zkr_profile_upload_js');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox');
	
	//** REMOVE USER FIELDS **//
	

function hide_instant_messaging( $contactmethods ) {
unset($contactmethods['aim']);
unset($contactmethods['yim']);

	//** ADD USER FIELDS **//
	
	add_action( 'show_user_profile', 'social_fields' );
add_action( 'edit_user_profile', 'social_fields' );
 
function social_fields( $user ) { ? >
 
<h3>Social Media Profiles</h3>
 
<table class="form-table">
 
 
<tr>
<th><label for="social">Facebook</label></th>
 
<td>
<input type="text" name="Facebook" id="Facebook" value="http://www.facebook.com/USERNAME" class="regular-text" />
<span class="description">Please replace USERNAME with your Facebook username.</span>
</td>
</tr>
 
<tr>
<th><label for="social">Twitter</label></th>
 
<td>
<input type="text" name="Twitter" id="Twitter" value="http://www.twitter.com/USERNAME" class="regular-text" />
<span class="description">Please replace USERNAME with your Twitter username.</span>
</td>
</tr>
 
</table>
return $contactmethods;
}
add_filter('user_contactmethods','hide_instant_messaging',10,1);

//** CLOSE OUT **//

add_action( 'personal_options_update', 'save_social_fields' );
add_action( 'edit_user_profile_update', 'save_social_fields' );
 
function save_social_fields( $user_id ) {
 
if ( !current_user_can( 'edit_user', $user_id ) )
return false;
 
update_usermeta( $user_id, 'pic', $_POST['pic'] );
update_usermeta( $user_id, 'Facebook', $_POST['Facebook'] );
update_usermeta( $user_id, 'Twitter', $_POST['Twitter'] );
}

