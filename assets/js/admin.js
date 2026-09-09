/**
 * Bloqra theme dashboard behaviour.
 *
 * Three small enhancements, all of them optional: arrow-key navigation for the
 * tab strip, plugin install/activate buttons, and collapsing older changelog
 * releases. Everything on the page works without this file.
 */
( function () {
	'use strict';

	var settings = window.bloqraAdmin || {};
	var strings = settings.i18n || {};

	/**
	 * Announce a message to screen readers when wp.a11y is available.
	 *
	 * @param {string} message Message to announce.
	 */
	function bloqraSpeak( message ) {
		if ( window.wp && window.wp.a11y && window.wp.a11y.speak ) {
			window.wp.a11y.speak( message );
		}
	}

	/**
	 * Let the arrow keys move between tabs, as the tablist role implies.
	 */
	function bloqraInitTabs() {
		var tablist = document.querySelector( '.bloqra-admin__tabs' );

		if ( ! tablist ) {
			return;
		}

		var tabs = Array.prototype.slice.call( tablist.querySelectorAll( '.bloqra-admin__tab' ) );

		tablist.addEventListener( 'keydown', function ( event ) {
			var index = tabs.indexOf( document.activeElement );
			var next = -1;

			if ( index === -1 ) {
				return;
			}

			if ( 'ArrowRight' === event.key || 'ArrowDown' === event.key ) {
				next = ( index + 1 ) % tabs.length;
			} else if ( 'ArrowLeft' === event.key || 'ArrowUp' === event.key ) {
				next = ( index - 1 + tabs.length ) % tabs.length;
			} else if ( 'Home' === event.key ) {
				next = 0;
			} else if ( 'End' === event.key ) {
				next = tabs.length - 1;
			}

			if ( next === -1 ) {
				return;
			}

			event.preventDefault();
			tabs[ next ].focus();
		} );
	}

	/**
	 * Replace a card button with the "Activate" state.
	 *
	 * @param {HTMLElement} button Button that was just used to install.
	 */
	function bloqraToActivate( button ) {
		button.classList.remove( 'install-now', 'updating-message', 'updated-message', 'button-disabled' );
		button.classList.add( 'button-primary', 'bloqra-activate' );
		button.disabled = false;
		button.textContent = strings.activate || 'Activate';
	}

	/**
	 * Put a card button into the final "Active" state.
	 *
	 * @param {HTMLElement} button Button that was just used to activate.
	 */
	function bloqraToActive( button ) {
		button.classList.remove( 'button-primary', 'bloqra-activate' );
		button.classList.add( 'is-active' );
		button.disabled = true;
		button.textContent = strings.active || 'Active';
	}

	/**
	 * Show an error message inside the card holding a button.
	 *
	 * @param {HTMLElement} button  Button the error relates to.
	 * @param {string}      message Message to display.
	 */
	function bloqraShowError( button, message ) {
		var card = button.closest( '.bloqra-plugin-card' ) || button.parentNode;
		var notice = card.querySelector( '.bloqra-plugin-card__error' );

		if ( ! notice ) {
			notice = document.createElement( 'p' );
			notice.className = 'bloqra-plugin-card__error';
			card.appendChild( notice );
		}

		notice.textContent = message;
		bloqraSpeak( message );
	}

	/**
	 * Wire the install buttons to core's updater.
	 */
	function bloqraInitInstall() {
		document.addEventListener( 'click', function ( event ) {
			var button = event.target.closest( '.bloqra-admin .install-now' );

			if ( ! button || ! window.wp || ! window.wp.updates ) {
				return;
			}

			event.preventDefault();

			if ( button.disabled ) {
				return;
			}

			window.wp.updates.installPlugin( {
				slug: button.dataset.slug,
				success: function () {
					bloqraToActivate( button );
					bloqraSpeak( strings.activate || 'Activate' );
				},
				error: function ( response ) {
					if ( window.wp.updates.maybeHandleCredentialError( response, 'install-plugin' ) ) {
						return;
					}

					button.classList.remove( 'updating-message' );
					button.disabled = false;
					bloqraShowError( button, response.errorMessage || strings.failed );
				}
			} );
		} );
	}

	/**
	 * Wire the activate buttons to the theme's own endpoint.
	 */
	function bloqraInitActivate() {
		document.addEventListener( 'click', function ( event ) {
			var button = event.target.closest( '.bloqra-admin .bloqra-activate' );

			if ( ! button || button.disabled ) {
				return;
			}

			event.preventDefault();

			var original = button.textContent;

			button.disabled = true;
			button.classList.add( 'updating-message' );
			button.textContent = strings.activating || 'Activating...';

			var body = new FormData();
			body.append( 'action', 'bloqra_activate_plugin' );
			body.append( 'nonce', settings.nonce );
			body.append( 'slug', button.dataset.slug );

			window.fetch( settings.ajaxUrl, {
				method: 'POST',
				credentials: 'same-origin',
				body: body
			} ).then( function ( response ) {
				return response.json();
			} ).then( function ( result ) {
				button.classList.remove( 'updating-message' );

				if ( result && result.success ) {
					bloqraToActive( button );
					bloqraSpeak( strings.active || 'Active' );
					return;
				}

				button.disabled = false;
				button.textContent = original;
				bloqraShowError( button, ( result && result.data && result.data.message ) || strings.failed );
			} ).catch( function () {
				button.classList.remove( 'updating-message' );
				button.disabled = false;
				button.textContent = original;
				bloqraShowError( button, strings.failed );
			} );
		} );
	}

	/**
	 * Collapse older changelog releases behind a toggle.
	 */
	function bloqraInitChangelog() {
		var changelog = document.querySelector( '.bloqra-admin-changelog' );

		if ( ! changelog ) {
			return;
		}

		var wrapper = changelog.querySelector( '.bloqra-admin-changelog__more' );
		var toggle = changelog.querySelector( '.bloqra-changelog-toggle' );

		if ( ! wrapper || ! toggle ) {
			return;
		}

		// The markup ships expanded so it stays complete without JavaScript.
		changelog.classList.add( 'is-collapsed' );
		toggle.setAttribute( 'aria-expanded', 'false' );
		wrapper.hidden = false;

		toggle.addEventListener( 'click', function () {
			var collapsed = changelog.classList.toggle( 'is-collapsed' );

			toggle.setAttribute( 'aria-expanded', collapsed ? 'false' : 'true' );
			toggle.textContent = collapsed
				? ( strings.showOlder || 'Show older versions' )
				: ( strings.hideOlder || 'Hide older versions' );
		} );
	}

	function bloqraInit() {
		bloqraInitTabs();
		bloqraInitInstall();
		bloqraInitActivate();
		bloqraInitChangelog();
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', bloqraInit );
	} else {
		bloqraInit();
	}
}() );
