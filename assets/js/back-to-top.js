/**
 * Back-to-top button.
 *
 * Reveals the floating button once the visitor has scrolled past the first
 * screen and scrolls the page back to the top when it is activated. The
 * button is rendered hidden, so browsers without JavaScript never see it.
 */
( function () {
	'use strict';

	var button = document.querySelector( '.bloqra-back-to-top' );

	if ( ! button ) {
		return;
	}

	var threshold = 480;
	var ticking = false;

	function update() {
		button.classList.toggle( 'is-visible', window.scrollY > threshold );
		ticking = false;
	}

	function onScroll() {
		if ( ! ticking ) {
			ticking = true;
			window.requestAnimationFrame( update );
		}
	}

	button.addEventListener( 'click', function () {
		var reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

		window.scrollTo( { top: 0, behavior: reduceMotion ? 'auto' : 'smooth' } );
	} );

	window.addEventListener( 'scroll', onScroll, { passive: true } );
	update();
} )();
