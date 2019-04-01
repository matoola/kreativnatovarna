<?php

namespace Kt;

if ( $KtSetup['breadcrumbs'] ) {
	function the_breadcrumb() {
	
    $sep = ' > ';
		$itemListEl = ' itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" ';
		$item = ' itemscope itemtype="http://schema.org/Thing"
       itemprop="item" ';
    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">';
        echo '<li' . $itemListEl . '><a' . $item . 'href="';
        echo get_option('home');
        echo '">';
				echo '<span itemprop="name">';
        bloginfo('name');
				echo '<meta itemprop="position" content="1" /></span>';
        echo '</a></li>' . $sep;
	
	// Check if the current page is a category or archive 
        if (is_category() || is_archive() ){

					if (is_author()) {
						$authorid = get_current_user_id();
						$currentAuthor = get_author_posts_url($authorid);
						$authorName = get_the_author();
						echo '<li' . $itemListEl . '><a' . $item . 'href="' . '/author/' . $authorName . '"><span itemprop="name">';
            echo $authorName;
						echo '<meta itemprop="position" content="2" /></span></a></li>';
					} else if (is_tag()) {
						$tag = get_queried_object();
						echo '<li' . $itemListEl . '><a' . $item . 'href="' . '/tag/' . $tag->slug . '"><span itemprop="name">';
            echo $tag->name;
						echo '<meta itemprop="position" content="2" /></span></a></li>';	
					} else {
						$currentcat = get_category( get_query_var( 'cat' ) );
						echo '<li' . $itemListEl . '><a' . $item . 'href="' . '/category/' . $currentcat->slug . '"><span itemprop="name">';
            echo $currentcat->name;
						echo '<meta itemprop="position" content="3" /></span></a></li>';
					}
					
        } 

	
	// If the current page is a single post
        if (is_single()) {
						$catlist = get_the_category();
						$numCat = count($catlist);
						$counter = 0;

						foreach ($catlist as $cat) {
							echo '<li' . $itemListEl . '><a' . $item . 'href="' . '/category/' . $cat->slug . '">' . '<span itemprop="name">' . $cat->name . '</span>' .  '</a><meta itemprop="position" content="' . ($counter+2) . '" /></li>';
							if(++$counter != $numCat) {
								echo ',&nbsp;';	
							}
						} 
					
            echo $sep;
						echo '<li' . $itemListEl . '><a' . $item . 'href="' . get_the_permalink() . '"><span itemprop="name">';
            the_title();
						echo '<meta itemprop="position" content="' . ($counter+2) . '" /></span></a></li>';
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
						echo '<li' . $itemListEl . '><a' . $item . 'href="' . get_the_permalink() . '"><span itemprop="name">';
            echo the_title();
						echo '<meta itemprop="position" content="3" /></span></a></li>';
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
								echo '<li' . $itemListEl . '><a' . $item . 'href="' . get_the_permalink() . '"><span itemprop="name">';
                the_title();
								echo '<meta itemprop="position" content="2" /></span></a></li>';
                rewind_posts();
            }
        }
        echo '</ol>';
    }
		
	}
	
}
