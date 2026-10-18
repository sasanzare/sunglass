<?php
/**
 * Minimal footer used when Elementor has no footer template.
 *
 * @package SasanZare
 */

defined( 'ABSPATH' ) || exit;
?>
<footer id="colophon" class="saz-site-footer">
	<p><?php echo esc_html( sprintf( '© %s %s', date_i18n( 'Y' ), get_bloginfo( 'name' ) ) ); ?></p>
</footer>
