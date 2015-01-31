<?php
/*
Plugin Name: Super Simple Social Media Widget
Plugin URI: http://luptid.com/super-simple-social-media-widget/
Description: The easiest way to add social media icons to any widget area. Includes bloglovin, facebook, google plus, instagram, pinterest, store, tumblr, twitter and youtube. Ideal for fashion blogs and lifestyle blogs.
Author: Luptid Marketing
Version: 1.0
Author URI: http://luptid.com/

Copyright 2015 Luptid Marketing

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

wp_enqueue_Style( 'super-simple-social-media-widget-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
wp_enqueue_style( 'super-simple-social-media-widget-style', plugins_url('style.css', __FILE__) );

function select_social_network( $selected_network ) {
	$output = '';

	$output .= '<option value=""';
	if( $selected_network == '' ) $output .= ' selected';
	$output .= '>-- hide --</option>';

	$output .= '<option value="bloglovin"';
	if( $selected_network == 'bloglovin' ) $output .= ' selected';
	$output .= '>bloglovin</option>';

	$output .= '<option value="facebook"';
	if( $selected_network == 'facebook' ) $output .= ' selected';
	$output .= '>facebook</option>';

	$output .= '<option value="google_plus"';
	if( $selected_network == 'google_plus' ) $output .= ' selected';
	$output .= '>google plus</option>';

	$output .= '<option value="instagram"';
	if( $selected_network == 'instagram' ) $output .= ' selected';
	$output .= '>instagram</option>';

	$output .= '<option value="pinterest"';
	if( $selected_network == 'pinterest' ) $output .= ' selected';
	$output .= '>pinterest</option>';

	$output .= '<option value="store"';
	if( $selected_network == 'store' ) $output .= ' selected';
	$output .= '>store</option>';

	$output .= '<option value="tumblr"';
	if( $selected_network == 'tumblr' ) $output .= ' selected';
	$output .= '>tumblr</option>';

	$output .= '<option value="twitter"';
	if( $selected_network == 'twitter' ) $output .= ' selected';
	$output .= '>twitter</option>';

	$output .= '<option value="yelp"';
	if( $selected_network == 'yelp' ) $output .= ' selected';
	$output .= '>yelp</option>';

	$output .= '<option value="youtube"';
	if( $selected_network == 'youtube' ) $output .= ' selected';
	$output .= '>youtube</option>';

	return $output;
}

function get_icon($network) {
	if( $network == 'bloglovin' ) return '&#xf004;';
	if( $network == 'facebook' ) return '&#xf09a;';
	if( $network == 'google_plus' ) return '&#xf0d5;';
	if( $network == 'instagram' ) return '&#xf16d;';
	if( $network == 'pinterest' ) return '&#xf0d2;';
	if( $network == 'store' ) return '&#xf07a;';
	if( $network == 'tumblr' ) return '&#xf173;';
	if( $network == 'twitter' ) return '&#xf099;';
	if( $network == 'youtube' ) return '&#xf167;';
	if( $network == 'yelp' ) return '&#xf1e9;';
}

class super_simple_social_media_widget extends WP_Widget {


	public function __construct() {
		$widget_ops = array('classname' => 'super_simple_social_media_widget', 'description' => 'Add social media icons to any widget area' );
		$this->WP_Widget('super_simple_social_media_widget', 'Super Simple Social Media Widget', $widget_ops);
	}

	function widget($args, $instance) {
		// PART 1: Extracting the arguments + getting the values
		extract($args, EXTR_SKIP);
		$network_01 = empty($instance['network_01']) ? '' : $instance['network_01'];
		$network_02 = empty($instance['network_02']) ? '' : $instance['network_02'];
		$network_03 = empty($instance['network_03']) ? '' : $instance['network_03'];
		$network_04 = empty($instance['network_04']) ? '' : $instance['network_04'];
		$network_05 = empty($instance['network_05']) ? '' : $instance['network_05'];
		$network_06 = empty($instance['network_06']) ? '' : $instance['network_06'];
		$network_07 = empty($instance['network_07']) ? '' : $instance['network_07'];
		$network_08 = empty($instance['network_08']) ? '' : $instance['network_08'];
		$network_08 = empty($instance['network_09']) ? '' : $instance['network_09'];

		$link_01 = empty($instance['link_01']) ? '' : $instance['link_01'];
		$link_02 = empty($instance['link_02']) ? '' : $instance['link_02'];
		$link_03 = empty($instance['link_03']) ? '' : $instance['link_03'];
		$link_04 = empty($instance['link_04']) ? '' : $instance['link_04'];
		$link_05 = empty($instance['link_05']) ? '' : $instance['link_05'];
		$link_06 = empty($instance['link_06']) ? '' : $instance['link_06'];
		$link_07 = empty($instance['link_07']) ? '' : $instance['link_07'];
		$link_08 = empty($instance['link_08']) ? '' : $instance['link_08'];
		$link_08 = empty($instance['link_09']) ? '' : $instance['link_09'];

		$color = empty($instance['color']) ? '' : $instance['color'];
		$font_size = empty($instance['font_size']) ? '' : $instance['font_size'];
		$spacing = empty($instance['spacing']) ? '' : $instance['spacing'];

		if( !empty($color) ) {
			$color = str_replace('#','',$color);
			$color = 'color:#' . $color . ' !important;';
		}else{
			$color = 'color:#000 !important;';
		}

		if( !empty($font_size) ) {
			$font_size = str_replace('px','',$font_size);
			$font_size = 'font-size:' . $font_size . 'px !important;';
		}else{
			$font_size = 'font-size:20px !important;';
		}

		if( !empty($spacing) ) {
			$spacing = str_replace('px','',$spacing);
			$spacing = 'padding: 0 ' . $spacing . 'px !important;';
		}else{
			$spacing = 'padding: 0 5px !important;';
		}

		echo (isset($before_widget)?$before_widget:'');

		echo '<ul class="super-simple-social-media-widget">';

		if (!empty($network_01)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_01 . '">';
			echo get_icon($network_01);
			echo '</a></li>';
		}

		if (!empty($network_02)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_02 . '">';
			echo get_icon($network_02);
			echo '</a></li>';
		}

		if (!empty($network_03)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_03 . '">';
			echo get_icon($network_03);
			echo '</a></li>';
		}

		if (!empty($network_04)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_04 . '">';
			echo get_icon($network_04);
			echo '</a></li>';
		}

		if (!empty($network_05)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_05 . '">';
			echo get_icon($network_05);
			echo '</a></li>';
		}

		if (!empty($network_06)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_06 . '">';
			echo get_icon($network_06);
			echo '</a></li>';
		}

		if (!empty($network_07)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_07 . '">';
			echo get_icon($network_07);
			echo '</a></li>';
		}

		if (!empty($network_08)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_08 . '">';
			echo get_icon($network_08);
			echo '</a></li>';
		}

		if (!empty($network_09)) {
			echo '<li style="' . $spacing . '"><a target="_blank" style="' . $color . $font_size . '" href="' . $link_09 . '">';
			echo get_icon($network_09);
			echo '</a></li>';
		}

		echo '</ul>';
		echo (isset($after_widget)?$after_widget:'');
	}

	public function form( $instance ) {


		// PART 1: Extract the data from the instance variable
		$instance = wp_parse_args( (array) $instance, array( 'network_01' => '' ) );
		$network_01 = $instance['network_01'];
		$network_02 = $instance['network_02'];
		$network_03 = $instance['network_03'];
		$network_04 = $instance['network_04'];
		$network_05 = $instance['network_05'];
		$network_06 = $instance['network_06'];
		$network_07 = $instance['network_07'];
		$network_08 = $instance['network_08'];
		$network_09 = $instance['network_09'];

		$link_01 = $instance['link_01'];
		$link_02 = $instance['link_02'];
		$link_03 = $instance['link_03'];
		$link_04 = $instance['link_04'];
		$link_05 = $instance['link_05'];
		$link_06 = $instance['link_06'];
		$link_07 = $instance['link_07'];
		$link_08 = $instance['link_08'];
		$link_09 = $instance['link_09'];

		$color = $instance['color'];
		$font_size = $instance['font_size'];
		$spacing = $instance['spacing'];

		// PART 2-3: Display the fields
		?>
		<p>Select each network and paste the full link to your profile (eg. http://twitter.com/username).<br>
			Default size is 20px<br>
			Default color is black (#000000)<br>
			Default icon spacing is 5px
		</p>
		<p>
			color (hex):<br>
			<input maxlength="6" name="<?php echo $this->get_field_name('color'); ?>" type="text" value="<?php echo attribute_escape($color); ?>" />
		</p>
		<p>
			size (in px):<br>
			<input maxlength="6" name="<?php echo $this->get_field_name('font_size'); ?>" type="text" value="<?php echo attribute_escape($font_size); ?>" />
		</p>
		<p>
			icon spacing (in px):<br>
			<input maxlength="6" name="<?php echo $this->get_field_name('spacing'); ?>" type="text" value="<?php echo attribute_escape($spacing); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_01'); ?>">
				<?php echo select_social_network($network_01); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_01'); ?>" type="text" value="<?php echo attribute_escape($link_01); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_02'); ?>">
				<?php echo select_social_network($network_02); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_02'); ?>" type="text" value="<?php echo attribute_escape($link_02); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_03'); ?>">
				<?php echo select_social_network($network_03); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_03'); ?>" type="text" value="<?php echo attribute_escape($link_03); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_04'); ?>">
				<?php echo select_social_network($network_04); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_04'); ?>" type="text" value="<?php echo attribute_escape($link_04); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_05'); ?>">
				<?php echo select_social_network($network_05); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_05'); ?>" type="text" value="<?php echo attribute_escape($link_05); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_06'); ?>">
				<?php echo select_social_network($network_06); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_06'); ?>" type="text" value="<?php echo attribute_escape($link_06); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_07'); ?>">
				<?php echo select_social_network($network_07); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_07'); ?>" type="text" value="<?php echo attribute_escape($link_07); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_08'); ?>">
				<?php echo select_social_network($network_08); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_08'); ?>" type="text" value="<?php echo attribute_escape($link_08); ?>" />
		</p>
		<p>
			<select name="<?php echo $this->get_field_name('network_09'); ?>">
				<?php echo select_social_network($network_09); ?>
			</select>
			<input name="<?php echo $this->get_field_name('link_09'); ?>" type="text" value="<?php echo attribute_escape($link_09); ?>" />
		</p>

		<?php

	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['network_01'] = $new_instance['network_01'];
		$instance['network_02'] = $new_instance['network_02'];
		$instance['network_03'] = $new_instance['network_03'];
		$instance['network_04'] = $new_instance['network_04'];
		$instance['network_05'] = $new_instance['network_05'];
		$instance['network_06'] = $new_instance['network_06'];
		$instance['network_07'] = $new_instance['network_07'];
		$instance['network_08'] = $new_instance['network_08'];
		$instance['network_09'] = $new_instance['network_09'];

		$instance['link_01'] = $new_instance['link_01'];
		$instance['link_02'] = $new_instance['link_02'];
		$instance['link_03'] = $new_instance['link_03'];
		$instance['link_04'] = $new_instance['link_04'];
		$instance['link_05'] = $new_instance['link_05'];
		$instance['link_06'] = $new_instance['link_06'];
		$instance['link_07'] = $new_instance['link_07'];
		$instance['link_08'] = $new_instance['link_08'];
		$instance['link_09'] = $new_instance['link_09'];

		$instance['color'] = $new_instance['color'];
		$instance['font_size'] = $new_instance['font_size'];
		$instance['spacing'] = $new_instance['spacing'];

		return $instance;
	}

}

add_action( 'widgets_init', create_function('', 'return register_widget("super_simple_social_media_widget");') );
