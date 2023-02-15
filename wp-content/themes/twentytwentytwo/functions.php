<?php

/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if (!function_exists('twentytwentytwo_support')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support()
	{

		// Add support for block styles.
		add_theme_support('wp-block-styles');

		// Enqueue editor styles.
		add_editor_style('style.css');
	}

endif;

add_action('after_setup_theme', 'twentytwentytwo_support');

if (!function_exists('twentytwentytwo_styles')) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles()
	{
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');

		$version_string = is_string($theme_version) ? $theme_version : false;
		wp_register_style('twentytwentytwo-style',get_template_directory_uri() . '/style.css',array(),$version_string);
		wp_enqueue_style('load_more-coustem_style', get_theme_file_uri('/assets/css/coustem_style.css'), array(), THEME_VERSION);
		wp_enqueue_style('load_more-bootstrap', get_theme_file_uri('/assets/css/bootstrap.css'), array(), THEME_VERSION);
		wp_enqueue_style('load_more-bootstrap.min', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), THEME_VERSION);

		wp_enqueue_script('my_loadmore', get_theme_file_uri('/assets/js/custom.js'), array('jquery'), THEME_VERSION, true);
		wp_enqueue_script('load_more-bootstrap', get_theme_file_uri('/assets/js/bootstrap.js'), array('jquery'), THEME_VERSION, true);
		wp_enqueue_script('load_more-bootstrap.min', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), THEME_VERSION, true);
		// Enqueue theme stylesheet.
		wp_enqueue_style('twentytwentytwo-style');
	}

endif;

add_action('wp_enqueue_scripts', 'twentytwentytwo_styles');



function my_enqueue() {
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

add_action('wp_ajax_nopriv_get_data', 'my_ajax_handler');
add_action('wp_ajax_get_data', 'my_ajax_handler');

function my_ajax_handler()
{
	$ajaxposts = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => 5,
		'orderby' => 'post_date',
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;
	if ($ajaxposts->have_posts()) {
		// ob_start();

		while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
			//$response .= get_template_part('parts/card', 'publication');

			$response .= '<div class="container-fluid bg-3 text-center">
			<h1>'.get_the_title().'</h1>
			<div class="row">
			<div class="col-sm-12">
			<p>'.get_the_content().'</p>
			<a>' . get_the_post_thumbnail(get_the_ID(), 'medium') . '</a>
			</div>
			</div>
			</div>';



			

		endwhile;

		// $output = ob_get_contents();
		// ob_end_clean();

	} else {
		$response = '';
	}
	// echo $response;
	$result = array(
		'max' => $max_pages,
		'html' => $response,
	);
	echo json_encode($result);
	// return $result;

	exit;
	
}

// -------------------short code ------------------

function load_more_shortcode()
{  ?>

<div class="container">
	<div clas="row">
		<div class="card" id="ajax-posts">
			<div class="card-body">
				<?php
				$postsPerPage = 5;
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => $postsPerPage,
				);

				$loop = new WP_Query($args);

				while ($loop->have_posts()) : $loop->the_post();
				?>
							<div class="container-fluid bg-3 text-center">    
								<h3 class="margin"><?php the_title(); ?></h3><br>
								<div class="row">
										<div class="col-sm-12">
											<p><?php the_content(); ?></p>
											<?php the_post_thumbnail(); ?>
										</div>
								</div>
							</div>
											

				<?php
				endwhile;
				wp_reset_postdata();
				?>
				
			</div>
			
			<div class="text-center">
      <button type="button" class="btn btn-primary btn-lg load-more">load more</button>
    </div>
		</div>
	</div>


<?php }
// register shortcode
add_shortcode('load_data', 'load_more_shortcode');



