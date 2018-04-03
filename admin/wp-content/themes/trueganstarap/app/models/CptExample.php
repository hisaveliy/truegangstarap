<?php
/**
 * Example for ctp
 *
 * @package True Gansta Rap Theme
 * @since 1.0.0
 * @author hisaveliy
 */

namespace app\Models;

/**
 * CptExample
 * 
 * @package app
 */
class CptExample {

	/**
	 * Get CptExample posts
	 */
	public static function get_cpt_example() {

		$args = array(
			'post_type'      => 'cpt_example',
			'order_by'       => 'menu_order',
			'posts_per_page' => -1,
			'post_status'    => 'publish'
		);

		$query = new \WP_Query($args);

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				$id = get_the_id();
				?>

					<div>
						<h3><?php echo get_the_title(); ?></h3>
					</div>

				<?php
			endwhile;
		endif;

		wp_reset_postdata();
	}

}