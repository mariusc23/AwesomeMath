<?php
/*
Plugin Name: Flickr mini gallery
Plugin URI: http://wordpress.org/#
Description: This plugin is a gallery generator / lightbox view combo. Very easy to add to your post or page using short tags or the text editor
Author: Felipe Skroski	
Licence:GPL 3
Version: 1.3
Author URI: www.felipesk.com
*/

/*  Copyright 2008  FELIPE SKROSKI  (email : felipeskroski[at.]gmail[dot.]com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/





//add jquery and lightbox
function jquery_lightbox_scripts(){
	$path = WP_PLUGIN_URL.'/flickr-mini-gallery/';
	wp_enqueue_script('jquery');
	$opts = mfg_get_options();
	$format = $opts['mfg_thumbformat'];
	echo '<script type="text/javascript">
			var theblogurl ="'.get_bloginfo('url').'";
			var flickr_mini_gallery_img_format ="'.$format.'";
		</script>';
	echo '<link rel="stylesheet" type="text/css" href="'.$path.'css/jquery.lightbox-0.5.css" media="screen" />';
	echo '<link rel="stylesheet" type="text/css" href="'.$path.'css/flickr-mini-gallery.css" media="screen" />';
	wp_enqueue_script('jquerylightbox', $path.'js/jquery.lightbox-0.5.js', array('jquery'),'0.5');
	wp_enqueue_script('miniflickr', $path.'js/miniflickr.js', array('jquery'),'0.1');
}

add_action('wp_head', 'jquery_lightbox_scripts',5);


//builds the gallery
function build_mini_gallery($atts, $content='Loading... mini-flickr-gallery by Felipe Skroski') {
	$opts = mfg_get_options();
	$usr = $opts['mfg_userid'];
	$lang = $opts['mfg_language'];
	$format = $opts['mfg_thumbformat'];
	$hover = $opts['mfg_hover'];
	$description = $opts['mfg_description'];
	$galformat = $opts['mfg_galleryformat'];
	extract(shortcode_atts(array(
		'photoset_id' 		=>'',
		'lang' 				=>'',
		'user_id' 			=> $usr,
		'tags' 				=>'',
		'tag_mode'			=>'',
		'min_upload_date'	=>'',
		'max_upload_date'	=>'', 
		'min_taken_date'	=>'',
		'max_taken_date'	=>'',
		'license'			=>'',
		'sort'				=>'',
		'bbox'				=>'',
		'accuracy'			=>'',
		'safe_search'		=>'',
		'content_type'		=>'',
		'machine_tags'		=>'',
		'group_id'			=>'',
		'lat'				=>'',
		'lon'				=>'',
		'radius_units'		=>'',
		'per_page'			=>'30',
		'extras'			=>'',
		'content'			=>$content,
		'hover'				=>$hover,
	), $atts));
	//echo($hover);
	$lang = "{$lang}";
	$photoset_id ="{$photoset_id}";
	if(function_exists(xlanguage_current_language_code)){
		$code = xlanguage_current_language_code();
	}else{
		$code = $lang;
	}
	if($hover == "yes"){
		$class = "fmg-hover-image";
	}else{
		$class = "";
	}
	if($description == "yes"){
		$desc = ",description";
	}else{
		$desc = "";
	}
	if($code == $lang or $lang==''){
		$flickr_gal = "<div class='flickr-mini-gallery ".$class."' lang=\"$format&$galformat\" rel=\"user_id={$user_id}&tags={$tags}&min_upload_date={$min_upload_date}&max_upload_date={$max_upload_date}&min_taken_date={$min_taken_date}&max_taken_date={$max_taken_date}&license={$license}&sort={$sort}&bbox={$bbox}&accuracy={$accuracy}&safe_search={$safe_search}&content_type={$content_type}&machine_tags={$machine_tags}&group_id={$group_id}&lat={$lat}&lon={$lon}&radius_units={$radius_units}&per_page={$per_page}&extras={$extras}$desc\" longdesc='photosearch'>{$content}</div>";
	}else{
		$flickr_gal ="";
	}
	if($photoset_id != ''){
		$flickr_gal = "<div class='flickr-mini-gallery ".$class."' lang=".$format.'&'.$galformat." rel=\"photoset_id={$photoset_id}&extras={$extras}$desc\" longdesc='photoset'>{$content}</div>";
	}
	return $flickr_gal;
}
add_shortcode('miniflickr', 'build_mini_gallery');


//----------------------------------------------------//
//OPTIONS
//----------------------------------------------------//
function mfg_get_options() {
	$mfg_userid = get_option('mfg_userid');
	$mfg_thumbformat = get_option('mfg_thumbformat');
	$mfg_hover = get_option('mfg_hover');
	$mfg_description = get_option('mfg_description');
	$mfg_galleryformat = get_option('mfg_galleryformat');
	
	// Extra paranoia:
	if(empty($mfg_userid))
		$mfg_userid = '';
	if(empty($mfg_thumbformat))
		$mfg_thumbformat = '_s';
	if(empty($mfg_hover))
		$mfg_hover = 'no';
	if(empty($mfg_description))
		$mfg_description = 'no';
		
	if(empty($mfg_galleryformat))
		$mfg_galleryformat = '';
		
	return array(
		'mfg_userid' => $mfg_userid,
		'mfg_thumbformat' => $mfg_thumbformat,
		'mfg_hover' => $mfg_hover,
		'mfg_description' => $mfg_description,
		'mfg_galleryformat' => $mfg_galleryformat,
		
	);
}




//----------------------------------------------------//
//USER INTERFACE
//----------------------------------------------------//

// Options update page:
// action function for above hook
function mfg_add_pages() {
    // Add a new submenu under Options:
    add_options_page('Flickr Mini Gallery', 'Flickr Mini Gallery', 8, 'miniflickrgallery', 'mfg_options_page');
}
// mfg_options_page() displays the page content for the Options submenu
function mfg_options_page() {
	if($_POST['action'] == 'update'){
		update_option('mfg_userid', $_POST['mfg_userid'] );
		update_option('mfg_thumbformat', $_POST['mfg_thumbformat'] );
		update_option('mfg_hover', $_POST['mfg_hover'] );
		update_option('mfg_description', $_POST['mfg_description'] );
		update_option('mfg_galleryformat', $_POST['mfg_galleryformat'] );
		
		
		?><div class="updated"><p><strong><?php _e('Options saved.', 'eg_trans_domain' ); ?></strong></p></div><?php
	};

    ?>
	<div class='wrap'>
		<h2>Flickr Mini Gallery Options</h2>
		<form method='post'>
			<?php wp_nonce_field('miniflickrgallery_options'); ?>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="mfg_userid,mfg_thumbformat,mfg_language,mfg_hover,mfg_galleryformat" />
			<table class="form-table">
				<tbody>
					<tr valign="top">
					<th scope="row"><?php _e("Default Flickr User ID:", 'eg_trans_domain' ); ?></th>
						<td>
						<input type="text" name="mfg_userid" value="<?php echo get_option('mfg_userid'); ?>" />
						<br/>
						<a href="http://idgettr.com/">Find your flickr id</a>
						</td>
					</tr>
					
					<tr valign="top">
					<th scope="row"><?php _e("Thumbnail Format:", 'eg_trans_domain' ); ?></th>
						<td>
							<p>
							<?php $img = get_option('mfg_thumbformat'); ?>
								<select name="mfg_thumbformat">
									<option value ="_s" <?php if($img == "_s")echo 'selected="selected"'; ?>>Square</option>
  									<option value ="_t" <?php if($img == "_t")echo 'selected="selected"'; ?>>Thumbnail</option>
								</select>
								<br/>
						Square is 75px x 75px and Thumbnail is 100px max						</p></td>
					</tr>
					
					<tr valign="top">
					<th scope="row"><?php _e("Lightbox image size:", 'eg_trans_domain' ); ?></th>
						<td>
							<p>
							<?php $imgGal = get_option('mfg_galleryformat'); ?>
								<select name="mfg_galleryformat">
									<option value ="" <?php if($imgGal == "")echo 'selected="selected"'; ?>>500px</option>
  									<option value ="_z" <?php if($imgGal == "_z")echo 'selected="selected"'; ?>>640px</option>
  									<option value ="_b" <?php if($imgGal == "_b")echo 'selected="selected"'; ?>>1024px</option>
								</select>
												</p></td>
					</tr>
					
					<tr valign="top">
					<th scope="row"><?php _e("Enlarge image on rolover?", 'eg_trans_domain' ); ?></th>
						<td>
							<p>
							<?php $hover = get_option('mfg_hover'); ?>
									<input type="radio" name="mfg_hover"value ="no" <?php if($hover == "no")echo 'checked'; ?>>No
  									<input type="radio" name="mfg_hover" value ="yes" <?php if($hover == "yes")echo 'checked'; ?>>Yes
								
								<br/>
						choose if you want to show the image enlarge on rollover						</p></td>
					</tr>
					
					<tr valign="top">
					<th scope="row"><?php _e("Add descriptions on lightbox?", 'eg_trans_domain' ); ?></th>
						<td>
							<p>
							<?php $description = get_option('mfg_description'); ?>
									<input type="radio" name="mfg_description"value ="no" <?php if($description == "no")echo 'checked'; ?>>No
  									<input type="radio" name="mfg_description" value ="yes" <?php if($description == "yes")echo 'checked'; ?>>Yes
								
								<br/>
						choose yes to display flickr descriptions on your lightbox (it may decrease the plugin performance)	</p></td>
					</tr>
					
					
				</tbody>
			</table>
			
			<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}

add_action('admin_menu', 'mfg_add_pages');

//----------------------------------------------------//
//ADD BUTTON TO TINY MCE
//----------------------------------------------------//

class FMG_Buttons {
   function FMG_Buttons(){
    if(is_admin()){
        if ( current_user_can('edit_posts') && current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
        {
           add_filter('tiny_mce_version', array(&$this, 'tiny_mce_version') );
           add_filter("mce_external_plugins", array(&$this, "mce_external_plugins"));
           add_filter('mce_buttons', array(&$this, 'mce_buttons'));
        }
    }
   }
   function mce_buttons($buttons) {
    array_push($buttons, "|", "flickr_mini_gallery" );
    return $buttons;
   }
   function mce_external_plugins($plugin_array) {
    $plugin_array['flickr_mini_gallery']  =  plugins_url('/flickr-mini-gallery/tiny-mce/editor-plugin.js');
    return $plugin_array;
   }
   function tiny_mce_version($version) {
    return ++$version;
   }
}
 
add_action('init', 'FMG_Buttons');
function FMG_Buttons(){
   global $FMG_Buttons;
   $FMG_Buttons = new FMG_Buttons();
}

?>