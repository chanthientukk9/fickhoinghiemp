<?php
/**
 * @var $id
 * @var $class
 * @var $pagination_speed
 * @var $slide_speed
 * @var $rewind_speed
 * @var $stop_on_hover
 * @var $auto_play
 * @var $scroll_per_page
 * @var $pagination
 * @var $navigation
 * @var $items
 * @var $items_mobile
 * @var $items_tablet
 * @var $items_tablet_small
 * @var $items_desktop_small
 * @var $items_desktop
 *
 * @var $posts_query
 * @var $image_size
 * @var $hide_thumbnail
 * @var $display_title
 * @var $display_summary
 * @var $show_excerpt
 * @var $excerpt_count
 * @var $show_meta
 */


$shortcode = '[post_snippets_carousel id="' . $id . '" layout_class="' . $class . '" posts_query=\'' . $posts_query . '\' image_size="' . $image_size . '" hide_thumbnail="' . ($hide_thumbnail ? 'true' : 'false')  . '" display_title="' . ($display_title ? 'true' : 'false')  . '" display_summary="' . ($display_summary ? 'true' : 'false')  . '" show_excerpt="' . ($show_excerpt ? 'true' : 'false')  . '" excerpt_count="' . $excerpt_count . '" show_meta="' . ($show_meta ? 'true' : 'false')  . '" pagination_speed="' . $pagination_speed . '" slide_speed="' . $slide_speed . '" rewind_speed="' . $rewind_speed . '" stop_on_hover="' . ($stop_on_hover ? 'true' : 'false')  . '" auto_play="' . $auto_play . '" scroll_per_page="' . ($scroll_per_page ? 'true' : 'false') . '" pagination="' . ($pagination ? 'true' : 'false') . '" navigation="' . ($navigation ? 'true' : 'false') . '" items="' . $items . '" items_mobile="' . $items_mobile . '" items_tablet="' . $items_tablet . '" items_tablet_small="' . $items_tablet_small . '" items_desktop_small="' . $items_desktop_small . '" items_desktop="' . $items_desktop . '" ]';

echo do_shortcode($shortcode);