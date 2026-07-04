<?php
/**
 * Title: Contact Page
 * Slug: bloqra/page-contact
 * Categories: bloqra, contact
 * Description: A contact page with an enquiry form and contact details.
 * Keywords: contact, form, support, enquiry
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"align":"full","gradient":"soft-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-soft-light-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained","contentSize":"760px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-subheading"} -->
		<p class="has-text-align-center is-style-subheading"><?php echo esc_html__( 'Contact', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xxx-large"} -->
		<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size"><?php echo esc_html__( 'Let’s talk', 'bloqra' ); ?></h1>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"large"} -->
		<p class="has-text-align-center has-neutral-600-color has-text-color has-large-font-size"><?php echo esc_html__( 'Have a question about the theme? Send us a message and we’ll get back to you.', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:heading {"level":2,"fontSize":"x-large"} -->
				<h2 class="wp-block-heading has-x-large-font-size"><?php echo esc_html__( 'Send us a message', 'bloqra' ); ?></h2>
				<!-- /wp:heading -->
				<!-- wp:html -->
				<form class="bloqra-contact-form" method="post" action="#" style="display:flex;flex-direction:column;gap:1rem;">
					<p style="display:flex;flex-direction:column;gap:.4rem;margin:0;">
						<label for="bloqra-name" style="font-weight:600;color:var(--wp--preset--color--neutral-800);"><?php echo esc_html__( 'Name', 'bloqra' ); ?></label>
						<input id="bloqra-name" name="bloqra-name" type="text" autocomplete="name" required style="padding:.7rem .9rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:var(--wp--custom--radius--small);font:inherit;" />
					</p>
					<p style="display:flex;flex-direction:column;gap:.4rem;margin:0;">
						<label for="bloqra-email" style="font-weight:600;color:var(--wp--preset--color--neutral-800);"><?php echo esc_html__( 'Email', 'bloqra' ); ?></label>
						<input id="bloqra-email" name="bloqra-email" type="email" autocomplete="email" required style="padding:.7rem .9rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:var(--wp--custom--radius--small);font:inherit;" />
					</p>
					<p style="display:flex;flex-direction:column;gap:.4rem;margin:0;">
						<label for="bloqra-subject" style="font-weight:600;color:var(--wp--preset--color--neutral-800);"><?php echo esc_html__( 'Subject', 'bloqra' ); ?></label>
						<input id="bloqra-subject" name="bloqra-subject" type="text" style="padding:.7rem .9rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:var(--wp--custom--radius--small);font:inherit;" />
					</p>
					<p style="display:flex;flex-direction:column;gap:.4rem;margin:0;">
						<label for="bloqra-message" style="font-weight:600;color:var(--wp--preset--color--neutral-800);"><?php echo esc_html__( 'Message', 'bloqra' ); ?></label>
						<textarea id="bloqra-message" name="bloqra-message" rows="6" required style="padding:.7rem .9rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:var(--wp--custom--radius--small);font:inherit;resize:vertical;"></textarea>
					</p>
					<p style="margin:0;">
						<button type="submit" style="background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--white);border:0;border-radius:var(--wp--custom--radius--small);padding:.8rem 1.9rem;font:inherit;font-weight:600;cursor:pointer;"><?php echo esc_html__( 'Send message', 'bloqra' ); ?></button>
					</p>
				</form>
				<!-- /wp:html -->
				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
				<p class="has-neutral-500-color has-text-color has-small-font-size"><?php echo esc_html__( 'Tip: connect this form to your favorite forms plugin (such as Contact Form 7 or WPForms) to start receiving submissions.', 'bloqra' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Email', 'bloqra' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p><a href="mailto:hello@example.com">hello@example.com</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Support hours', 'bloqra' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Monday to Friday, 9am – 5pm', 'bloqra' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Follow', 'bloqra' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:social-links {"iconColor":"primary-600","iconColorValue":"#4A0FD6","className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
					<!-- wp:social-link {"url":"#","service":"x"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
