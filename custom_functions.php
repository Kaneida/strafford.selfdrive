<?php 

/*  BizzThemes Custom Actions

    *** Explore all available theme actions in lib_theme/theme_hooks.php
	*** Explore all available framework actions in lib_frame/frame_hooks.php
	
	*** Working ACTION example:
	    add_action( 'bizz_head_grid', 'bizz_head_grid_test' );
	    function bizz_head_grid_test() {
			echo 'test';
		}
	*** Working FILTER example:
		add_filter('widget_title', 'my_widget_title');
		function my_widget_title($title) {
			return '<h6>' . $title . '</h6>';
		}
	
START REMOVING or ADDING NEW ACTIONS BELOW THIS LINE */

add_filter('bizz_car_seats', 'custom_car_seats');
function custom_car_seats() {
	$seats = array(
		array('name' => '1', 'value' => '1'),
		array('name' => '2', 'value' => '2'),
		array('name' => '3', 'value' => '3'),
		array('name' => '4', 'value' => '4'),
		array('name' => '5', 'value' => '5'),
		array('name' => '6', 'value' => '6'),
		array('name' => '7', 'value' => '7'),
		array('name' => '8', 'value' => '8'),
		array('name' => '9', 'value' => '9'),
		array('name' => '10', 'value' => '10'),
		array('name' => '11', 'value' => '11'),
		array('name' => '12', 'value' => '12'),
		array('name' => '13', 'value' => '13'),
		array('name' => '14', 'value' => '14'),
		array('name' => '15', 'value' => '15'),
		array('name' => '16', 'value' => '16'),
		array('name' => '17', 'value' => '17'),
	);
 
	return $seats;
}


