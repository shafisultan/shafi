<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shafi
 */

get_header(); ?>
<?php $options=get_option( 'options_settings' ); ?>
		<!-- Custom style from options page -->
		<style>
		p {
				 font-size: <?php echo $options['select_field']; ?>
		 }
		</style>

		<?php $options=get_option( 'options_settings' ); ?>
				<!-- Custom style from options page -->
				<style>
				p {
						 font-family: <?php echo $options['radio2_field']; ?>
				 }
				</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
