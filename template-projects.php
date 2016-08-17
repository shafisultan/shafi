<?php
/**
 * Template name: Projects
 * This Template Page is for the Projects page.
 * This will display content that relates to the past projects I have worked on
 *
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
<H2>Latest Projects</h2>
	<?php
				//custom Quear to show 4 posts from one specific category (Projects) on the static homepage of my site.
				$args = array('showposts' => 4, 'category_name' => 'Projects');
				$my_query = new WP_Query($args);
				?>
				<?php
				//	WP Query to show posts on this specific pag
				if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<div class="project-posts">
				<?php
				if ( has_post_thumbnail()){ the_post_thumbnail(); }
				the_excerpt(); //displays excerpts
					?>
				</div>
				<?php endwhile; endif; wp_reset_query(); ?>

<?php
get_sidebar();
get_footer();
