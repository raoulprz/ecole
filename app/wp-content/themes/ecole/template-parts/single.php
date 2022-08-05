<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
while ( have_posts() ) :
	the_post();
	?>

	<div class="page-content single">
		<div class="container">
			<?php the_content(); ?>
			<?php the_field('content_text'); ?>

			<?php wp_link_pages(); ?>
		</div>
	</div>

	<?php
endwhile;
