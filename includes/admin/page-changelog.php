<?php
/**
 * Changelog tab.
 *
 * Rendered straight from readme.txt so the dashboard and the WordPress.org
 * listing can never drift apart. Entries may be tagged `[New]`, `[Fix]` or
 * `[Improvement]`; the tag is turned into a coloured badge here and stays
 * perfectly readable in the plain-text readme.
 *
 * @package Bloqra
 */

namespace Bloqra\Admin\Changelog;

defined( 'ABSPATH' ) || exit;

/**
 * Number of versions shown before the "show older versions" toggle.
 */
const VISIBLE_VERSIONS = 3;

/**
 * Get the badge types recognised in readme.txt entries.
 *
 * @since 1.0.4
 * @return array<string, string> Badge slug => translated label.
 */
function get_badges(): array {
	return array(
		'new'         => _x( 'New', 'changelog entry type', 'bloqra' ),
		'fix'         => _x( 'Fix', 'changelog entry type', 'bloqra' ),
		'improvement' => _x( 'Improvement', 'changelog entry type', 'bloqra' ),
	);
}

/**
 * Parse the Changelog section of readme.txt.
 *
 * Each release becomes an entry with a version, an optional release date and
 * a list of lines, each carrying an optional badge type. The result is cached
 * in a transient keyed by the theme version, so parsing happens once per
 * release; SCRIPT_DEBUG bypasses the cache.
 *
 * @since 1.0.4
 * @return array<int, array<string, mixed>> Releases, newest first.
 */
function get_releases(): array {
	$cache_key = 'bloqra_changelog_' . BLOQRA_THEME_VERSION;
	$debug     = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;

	if ( ! $debug ) {
		$cached = get_transient( $cache_key );

		if ( is_array( $cached ) ) {
			return $cached;
		}
	}

	$releases = parse_readme( BLOQRA_THEME_DIR . 'readme.txt' );

	if ( ! $debug ) {
		set_transient( $cache_key, $releases, WEEK_IN_SECONDS );
	}

	return $releases;
}

/**
 * Read and parse a readme.txt file.
 *
 * @since 1.0.4
 * @param string $file Absolute path to readme.txt.
 * @return array<int, array<string, mixed>> Releases in the order they appear.
 */
function parse_readme( string $file ): array {
	if ( ! is_readable( $file ) ) {
		return array();
	}

	$contents = file_get_contents( $file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Reading a bundled theme file, not a remote resource.

	if ( ! is_string( $contents ) || '' === $contents ) {
		return array();
	}

	// Isolate the Changelog section from the surrounding readme sections.
	if ( ! preg_match( '/^==\s*Changelog\s*==\s*$(.*?)(?=^==\s*[^=]+\s*==\s*$|\z)/ms', $contents, $section ) ) {
		return array();
	}

	$changelog = $section[1];

	// Match version headings: "= 1.0.3 =" or "= 1.0.3 - 2026-08-13 =".
	$found = preg_match_all(
		'/^=\s*([0-9][^\s=]*)\s*(?:-\s*([^=]+?)\s*)?=[ \t]*$/m',
		$changelog,
		$matches,
		PREG_OFFSET_CAPTURE | PREG_SET_ORDER
	);

	if ( ! $found ) {
		return array();
	}

	$releases = array();

	foreach ( $matches as $index => $match ) {
		$start = $match[0][1] + strlen( $match[0][0] );
		$end   = isset( $matches[ $index + 1 ] ) ? $matches[ $index + 1 ][0][1] : strlen( $changelog );

		$entries = parse_entries( substr( $changelog, $start, $end - $start ) );

		if ( empty( $entries ) ) {
			continue;
		}

		$date = isset( $match[2] ) ? trim( $match[2][0] ) : '';

		$releases[] = array(
			'version' => trim( $match[1][0] ),
			'date'    => preg_match( '/^\d{4}-\d{2}-\d{2}$/', $date ) ? $date : '',
			'entries' => $entries,
		);
	}

	return $releases;
}

/**
 * Turn the body of one release into badged entries.
 *
 * @since 1.0.4
 * @param string $body Raw lines of a single release.
 * @return array<int, array<string, string>> Entries with a type and text.
 */
function parse_entries( string $body ): array {
	$entries = array();
	$badges  = get_badges();

	foreach ( preg_split( '/\R/', $body ) as $line ) {
		$line = trim( $line );

		if ( '' === $line || ! preg_match( '/^[*\-]\s*(.+)$/', $line, $matches ) ) {
			continue;
		}

		$text = trim( $matches[1] );
		$type = '';

		if ( preg_match( '/^\[([A-Za-z]+)\]\s*(.+)$/', $text, $tag ) ) {
			$candidate = strtolower( $tag[1] );

			if ( isset( $badges[ $candidate ] ) ) {
				$type = $candidate;
				$text = trim( $tag[2] );
			}
		}

		$entries[] = array(
			'type' => $type,
			'text' => $text,
		);
	}

	return $entries;
}

/**
 * Render the Changelog tab.
 *
 * @since 1.0.4
 * @return void
 */
function render(): void {
	$releases = get_releases();
	$badges   = get_badges();

	if ( empty( $releases ) ) {
		?>
		<div class="bloqra-admin-section">
			<p class="bloqra-admin-notice"><?php esc_html_e( 'No changelog entries were found.', 'bloqra' ); ?></p>
		</div>
		<?php
		return;
	}
	?>
	<div class="bloqra-admin-section bloqra-admin-changelog" data-visible="<?php echo esc_attr( (string) VISIBLE_VERSIONS ); ?>">
		<div class="bloqra-admin-changelog__legend">
			<?php foreach ( $badges as $slug => $label ) : ?>
				<span class="bloqra-badge bloqra-badge--<?php echo esc_attr( $slug ); ?>">
					<span class="bloqra-badge__dot" aria-hidden="true"></span>
					<?php echo esc_html( $label ); ?>
				</span>
			<?php endforeach; ?>
		</div>

		<?php foreach ( $releases as $index => $release ) : ?>
			<?php $is_older = ( $index >= VISIBLE_VERSIONS ); ?>
			<section class="bloqra-admin-release<?php echo $is_older ? ' is-older' : ''; ?>">
				<header class="bloqra-admin-release__header">
					<h2 class="bloqra-admin-release__version">
						<?php
						printf(
							/* translators: %s: release version number. */
							esc_html__( 'Version: %s', 'bloqra' ),
							esc_html( $release['version'] )
						);
						?>
					</h2>
					<?php if ( '' !== $release['date'] ) : ?>
						<span class="bloqra-admin-release__date">
							<?php
							printf(
								/* translators: %s: localized release date. */
								esc_html__( 'Released on %s', 'bloqra' ),
								esc_html( date_i18n( (string) get_option( 'date_format' ), (int) strtotime( $release['date'] ) ) )
							);
							?>
						</span>
					<?php endif; ?>
				</header>
				<ul class="bloqra-admin-release__entries">
					<?php foreach ( $release['entries'] as $entry ) : ?>
						<li class="bloqra-admin-release__entry">
							<?php if ( '' !== $entry['type'] ) : ?>
								<span class="bloqra-badge bloqra-badge--<?php echo esc_attr( $entry['type'] ); ?>">
									<span class="bloqra-badge__dot" aria-hidden="true"></span>
									<span class="screen-reader-text"><?php echo esc_html( $badges[ $entry['type'] ] ); ?></span>
								</span>
							<?php else : ?>
								<span class="bloqra-badge bloqra-badge--neutral">
									<span class="bloqra-badge__dot" aria-hidden="true"></span>
								</span>
							<?php endif; ?>
							<span class="bloqra-admin-release__text"><?php echo esc_html( $entry['text'] ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
		<?php endforeach; ?>

		<?php if ( count( $releases ) > VISIBLE_VERSIONS ) : ?>
			<?php /* Revealed by the admin script, which also collapses the older releases. */ ?>
			<p class="bloqra-admin-changelog__more" hidden>
				<button type="button" class="button bloqra-changelog-toggle" aria-expanded="true">
					<?php esc_html_e( 'Show older versions', 'bloqra' ); ?>
				</button>
			</p>
		<?php endif; ?>
	</div>
	<?php
}
