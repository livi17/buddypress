<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

</div><!-- .site-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">
		<?php
				/**
				 * Fires before the Twenty Fifteen footer text for footer customization.
				 *
				 * @since Twenty Fifteen 1.0
				 */
				do_action( 'twentyfifteen_credits' );
				?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyfifteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyfifteen' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->

	</div><!-- .site -->

	<?php wp_footer(); ?>
	<script type="text/javascript">

	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {
				lat: 43.7182412,
				lng: -79.378058},
			zoom: 10
		});
	}

	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARNe6pnLx1fu-mhkkxfR65HnGPiGrQXGc&callback=initMap">
	</script>
	<!-- script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/google-maps.js"></script -->
</body>
</html>
