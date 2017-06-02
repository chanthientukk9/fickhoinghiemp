<?php
/**
 * @var $number_of_columns
 * @var $post_count
 * @var $image_size
 * @var $filterable
 * @var $no_margin
 */


echo do_shortcode('[show_gallery number_of_columns="' . $number_of_columns . '" post_count="' . $post_count . '" image_size="' . $image_size . '" filterable="' . ($filterable ? 'true' : 'false') . '" no_margin="' . ($no_margin ? 'true' : 'false') . '" ]');

