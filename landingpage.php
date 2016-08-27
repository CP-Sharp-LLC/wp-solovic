<?php
/**
 * Template Name: Landing Page
 *
 * @package WordPress
 * @subpackage Solovic Rebirth
 * @since Now
 */

// get four top posts using loop
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'solovic_frontpage_loop');
remove_action('genesis_entry_footer', 'genesis_do_loop');
// add_action('genesis_entry_footer', 'solovic_article_blend');
add_action('genesis_after_entry', 'solovic_article_blend');

$gradient_color='green';

function solovic_article_blend() {
	if($GLOBALS['gradient_color'] == 'green'){
		$GLOBALS['gradient_color'] = 'orange';
	}
	else {
		$GLOBALS['gradient_color'] = 'green';
	}
	echo '<div class="gradient-border '.$GLOBALS['gradient_color'].'-gradient">';
	echo  'Continue reading...&nbsp;&nbsp;';
	echo '</div>';
}


function solovic_frontpage_loop() {
	global $wpdb;
	$frontpage_query =
"SELECT DISTINCT p1.ID, maxDate.slug  FROM $wpdb->posts p1 
	INNER JOIN $wpdb->term_relationships r1 			ON p1.ID = r1.object_id
    INNER JOIN $wpdb->term_taxonomy tt1 				ON r1.term_taxonomy_id = tt1.term_taxonomy_id
    INNER JOIN (
    	SELECT DISTINCT tt.term_taxonomy_id, t.slug, MAX(p.post_date) as newDate FROM $wpdb->posts p
        	INNER JOIN $wpdb->term_relationships r 		ON p.ID = r.object_id
        	INNER JOIN $wpdb->term_taxonomy tt 			ON r.term_taxonomy_id = tt.term_taxonomy_id
        	INNER JOIN $wpdb->terms t 					ON t.term_id = tt.term_id
        	WHERE tt.taxonomy = 'category' AND t.slug in ('guest', 'tips-2', '1-podcasts') AND p.post_status = 'publish'               
        	GROUP BY tt.term_taxonomy_id) maxDate 		ON maxDate.newDate = p1.post_date";

	$posts = $wpdb -> get_results($frontpage_query, ARRAY_A);
	$postIds = array();
	$postSlug = array();
	$max = 2; //count($posts);
	for ($i = 0;  $i < $max; $i++) {
		$postIds[] = $posts[$i]['ID'];
		$postSlug[] = $posts[$i]['slug'];
	}

	 // add_filter('genesis_attr_entry', 'solovic_alternate_color');
	pullPostByCategory($postIds, 'tips-2');
	pullPostByCategory($postIds, 'guest');
	pullPostByCategory($postIds, '1-podcasts');
}

function pullPostByCategory($postIds, $category){
	$miniQuery = array('post__in' => $postIds, 'tax_query' => array(array('taxonomy' => 'category','field' => 'slug','terms' => $category)));
	genesis_custom_loop($miniQuery);
}

function solovic_reg_color($attributes){
	$attributes['class'] = str_replace(' alt-color', '', $attributes['class']);
	return $attributes;
}

function solovic_alternate_color($attributes){
	$attributes['class'] .= ' alt-color';
	return $attributes;
}

remove_action( 'genesis_loop_else', 'genesis_do_noposts' );

//remove_action('genesis_loop', 'genesis_do_loop');
//add_action('genesis_loop', 'inthenewsLoop');
/*
remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );

remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action( 'genesis_entry_content', 'inthenewsContent' );
add_action('genesis_before_loop', 'inthenewsBeforeLoop');
add_action('wp_enqueue_scripts', 'inthenewsEnqueue');

function inthenewsEnqueue()
{
    wp_enqueue_style("cp_news", get_stylesheet_directory_uri() . "/style/cp-inthenews.css");
}

function inthenewsLoop() {
    global $paged;
    global $query_args;

    $args = array(
        'category_name'  => 'in-the-news',
        'paged'          => $paged,
        'posts_per_page' => 5);
    ;

    genesis_custom_loop(wp_parse_args($query_args, $args));
}

function inthenewsContent()
{
    $postText =
        "<div class='videoContainer'>
        <div class='videoTitle'>
           {videoTitle}
        </div>
        <div class='videoContent'>
           {videoContent}
        </div>
    </div>
    <hr />";

    $videoContentRaw = get_the_content();
    $videoContentParagraphed = str_replace('</iframe>', '</iframe><p class="videoText">' , $videoContentRaw);
    $videoContentParagraphed = str_replace('</noscript>', '</noscript><p class="videoText">' , $videoContentParagraphed);
    $videoContentParagraphed = $videoContentParagraphed.'</p>';
    $output = str_replace('{videoContent}', $videoContentParagraphed, $postText);
    echo str_replace('{videoTitle}', get_the_title(), $output);
}

function inthenewsBeforeLoop() {
    $headerText = '<header class="entry-header" style="margin: 20px 0 50px 0;"><h1 class="entry-title" itemprop="headline">{pageHeadline}</h1></header>';
    echo str_replace('{pageHeadline}', get_the_title(), $headerText);
}

*/
genesis();