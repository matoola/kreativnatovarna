<?php

namespace Kt;

function add_schema_json() {
	if(is_single()) {
		
		$postThumb = get_the_post_thumbnail_url();
		$postTitle = get_the_title();
		$datePublished = get_the_date();
		$dateModified = get_the_modified_date();
		$postAuthor = get_the_author();
		$postDesc = get_the_excerpt();
		$publisherName = get_bloginfo('name');
		$publisherLogoUrl = get_template_directory_uri() . '/dist/images/logo.png';
		
		echo '<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "BlogPosting",
			"mainEntityOfPage": {
				"@type": "WebPage"
			},
			"headline": "' . $postTitle . '",
			"image": [
				"' . $postThumb . '"
			 ],
			"datePublished": "' . $datePublished . '",
			"dateModified": "' . $dateModified . '",
			"author": {
				"@type": "Person",
				"name": "' . $postAuthor . '"
			},
			 "publisher": {
				"@type": "Organization",
				"name": "' . $publisherName . '",
				"logo": {
					"@type": "ImageObject",
					"url": "' . $publisherLogoUrl . '"
				}
			},
			"description": "' . $postDesc . '"
		}
		</script>';
	}
}
add_action('wp_head', __NAMESPACE__ . '\\add_schema_json');