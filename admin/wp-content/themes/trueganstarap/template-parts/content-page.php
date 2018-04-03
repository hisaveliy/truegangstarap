<?php
/**
 * The template used for displaying page content 
 * 
 * @package True Gansta Rap Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title(); ?>
  </header>

	<div class="page" role="main">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</div>
</article><!-- #page-## -->