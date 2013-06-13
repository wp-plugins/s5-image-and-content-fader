<?php
/*
Plugin Name: S5 Image And Content Fader
Plugin URI: http://s5co.us/ICFDetails
Description: The S5 Image and Content Fader is an advanced version of the S5 Image Fader. This tool gives you all the features of the Image Fader plus the ability to add content to each slide with a nice transition effect. Each slide's content has its own configurable settings such as colors, sizes, opacity, and more! Best of all it's free!
Version: 3.0.1
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
    function S5_ICFader() {
		$this->plugin_dir = plugins_url( '/' , __FILE__ );
		$this->override_folder = 'mod_s5_image_and_content_fader';
		$this->xml_dir = plugin_dir_path( __FILE__ );
       parent::WP_Widget(false, $name = 'Shape5 Image & Content Fader');
    }

	/** Override detection**/
	function check_override($filename){
		$this->override_path = get_theme_root() . '/' . get_template().'/html/'.$this->override_folder;
		$this->override_url = get_bloginfo('template_url').'/html/'.$this->override_folder;
		$has_override = file_exists($this->override_path.'/'.$filename)? true : false;
		if($has_override){ return $this->override_url.'/'.$filename;}
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
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title ){
                    echo $before_title . $title . $after_title;
                  }else{
					//echo $before_title . $after_title;
				  }?>
                  <?php include_once('tmpl/default.php'); ?>
              <?php echo $after_widget; ?>
        <?php
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
        $title = esc_attr($instance['title']);
		$this->wid_instance = $instance;
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php include('tmpl/form.php');
    }

} // class S5_ICFader

// register S5_ICFader widget
add_action('widgets_init', create_function('', 'return register_widget("S5_ICFader");'));

//$moo_src = plugins_url( 'js/mootools124.js' , __FILE__ );
//wp_enqueue_script( 'mootools', $moo_src, '', '1.2.4' );

?>