<?php
/**
 * Footer location and document close.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

if ( ! saz_render_elementor_location( 'footer' ) ) {
	get_template_part( 'template-parts/fallback/footer' );
}
?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
