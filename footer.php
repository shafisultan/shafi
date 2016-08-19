<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shafi
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- Footer Menu -->
		<div id="social">
			<?php if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu( // Adding a social media menu to link to my socail media acccounts.
					array(
						'theme_location'  => 'social',
						'container'       => 'div',
						'container_id'    => 'socialmenu',
						'container_class' => 'menu',
						'menu_id'         => 'menu-social-items',
						'menu_class'      => 'menu-items',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => '',
					)
				);
			} ?>
		</div> <!-- End Social media Footer Menu -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'shafi' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'shafi' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'shafi' ), 'shafi', '<a href="https://www.theindividualist.me" rel="designer">Shafi Sultan</a>' ); ?>
		</div><!-- .site-info -->
	<?php	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
	?>
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?> <!-- Getting the sidebar to show in the footer instead of on the side of the website -->
	</aside><!-- #secondary -->
		</aside><!-- #secondary -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
