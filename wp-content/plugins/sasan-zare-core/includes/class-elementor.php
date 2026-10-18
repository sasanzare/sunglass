<?php
/**
 * Elementor extension point for future reusable theme integrations.
 *
 * @package SasanZare\Core
 */

namespace SasanZare\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Elementor integration bootstrap. No widgets or business behavior are added in Phase 0.
 */
final class Elementor {
	/**
	 * Future custom widgets and dynamic tags belong in this integration layer.
	 *
	 * @return void
	 */
	public static function boot(): void {
		// Intentionally empty during the bootstrap phase.
	}
}
