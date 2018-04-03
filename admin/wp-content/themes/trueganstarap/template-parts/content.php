<?php
/**
 * Content template
 * 
 * @package True Gansta Rap Theme
 * @since 1.0.0
 */
get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(); ?>
    </header>
</article><!-- #post-## -->

<?php get_footer(); ?>