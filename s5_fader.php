<?php
/*
Plugin Name: S5 Image And Content Fader
Plugin URI: http://s5co.us/ICFDetails
Description: The S5 Image and Content Fader is an advanced version of the S5 Image Fader. This tool gives you all the features of the Image Fader plus the ability to add content to each slide with a nice transition effect. Each slide's content has its own configurable settings such as colors, sizes, opacity, and more! Best of all it's free!
Version: 3.1.1
Author: Shape 5 LLC
Author URI: http://www.shape5.com
License: GPL2
*/


/*  Copyright 2011  Shape 5 LLC (email : contact@shape5.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/**
 * s5_ICFader Class
 */

class S5_ICFader extends WP_Widget {

  var $plugin_dir;
  var $wid_instance;

    /** constructor */
	function __construct() {
		//Widget Specific Variables
		$this->override_folder = 'mod_s5_image_and_content_fader';
		$this->plugin_dir = plugins_url( '/' , __FILE__ );
		$this->xml_dir = plugin_dir_path( __FILE__ );
		$this->xml = simplexml_load_file($this->xml_dir.'wid_opts.xml');
		parent::WP_Widget(false, $name = $this->xml->name, array('description' => $this->xml->description));
		if(!is_admin()){
			add_action( 'wp_head', array(&$this,'head_calls' ));
			add_action( 'wp_enqueue_scripts', array(&$this,'scripts' ));
		}else{add_thickbox();}
	}

	/** Override detection**/
	function check_override($filename, $use_path=false){
		$this->override_path = get_theme_root() . '/' . get_template().'/html/'.$this->override_folder;
		$this->override_url = get_bloginfo('template_url').'/html/'.$this->override_folder;
		$has_override = file_exists($this->override_path.'/'.$filename)? true : false;
		if($has_override && $use_path == false){ return $this->override_url.'/'.$filename;}
		elseif($has_override && $use_path == true){ return $this->override_path.'/'.$filename;}
		elseif(!$has_override && $use_path == true){ return $filename;}
		else{ return $this->plugin_dir.'/'.$filename;}
	}

	function get($opt_name,$demo=false, $shortname=null){
		if($shortname == null){$shortname = $opt_name;}
		$$opt_name = isset($this->instance["$opt_name"])? $this->instance["$opt_name"] : null;
		if($enable = '1' && $demo != false){
			if(isset($_GET[$shortname])||(isset($_GET['reset']))){
				if($_GET[$shortname] != 'default'){
				$_SESSION[$shortname] = $_GET[$shortname];}
				if(($_GET[$shortname] == 'default')||($_GET['reset']==1)){
				unset($_SESSION[$shortname],$_GET[$shortname]);}
				}
			if(isset($_SESSION[$shortname])){
				$$opt_name = $_SESSION[$shortname];}
		}
		if($$opt_name==" "){$$opt_name=null;}
		return $$opt_name;
	}


	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		$this->instance = $instance;
		extract( $args );
		require_once('params.php');
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		if ( $title ){ echo $before_title . $title . $after_title;}
		include_once($this->check_override('tmpl/default.php',true));
		echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance = $new_instance;
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$this->wid_instance = $instance;
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php include('tmpl/form.php');
	}

		function head_calls(){
		$template_vertex = "no";
		$template_json_location = get_theme_root() . '/' . get_template().'/vertex/';
		if(file_exists($template_json_location)) {
			$template_vertex = "yes";
		}
		if($template_vertex == "no"){ }
	}
	
	function scripts(){
		if(!is_admin()){wp_enqueue_script( 'jQuery');}
	}
	

} // class S5_ICFader

// register S5_ICFader widget
add_action('widgets_init', create_function('', 'return register_widget("S5_ICFader");'));


?>