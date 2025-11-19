<?php

add_action('enqueue_block_editor_assets', function () {
	global $post;

	// Check if we're editing an event post type
	if (isset($post) && get_post_type($post) === 'product') {
		// Enqueue inline script for block editor
		wp_add_inline_script('wp-blocks', '
            (function() {
                if (window.wp && window.wp.data) {
                    wp.domReady(function() {
                        // Use MutationObserver to watch for when the metabox appears
                        var observer = new MutationObserver(function(mutations, obs) {
                            var metabox = document.querySelector(".edit-post-layout__metaboxes");
                            var title = document.querySelector(".editor-post-title");

                            if (metabox && title) {
                                // Reposition the metabox right after the title
                                title.parentNode.insertBefore(metabox, title.nextSibling);
                                console.log("ACF metaboxes repositioned successfully");

                                // Stop observing once we have successfully moved it
                                obs.disconnect();
                            }
                        });

                        // Start observing the document body for changes
                        observer.observe(document.body, {
                            childList: true,
                            subtree: true
                        });
                    });
                }
            })();
        ');
	}
});
