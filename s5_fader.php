<?php
/*
Plugin Name: S5 Image And Content Fader
Plugin URI: http://s5co.us/ICFDetails
Description: The S5 Image and Content Fader is an advanced version of the S5 Image Fader. This tool gives you all the features of the Image Fader plus the ability to add content to each slide with a nice transition effect. Each slide's content has it's own configurable settings such as colors, sizes, opacity, and more! Best of all it's free!
Version: 1.2.1
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
		$this->xml_dir = plugin_dir_path( __FILE__ );
       parent::WP_Widget(false, $name = 'Shape5 Image & Content Fader');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
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

$moo_src = plugins_url( 'js/mootools124.js' , __FILE__ );
wp_enqueue_script( 'mootools', $moo_src, '', '1.2.4' );

?>