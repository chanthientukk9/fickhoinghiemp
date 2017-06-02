<?php
/**
 * @var $title
 * @var $stats_bars
 */

$shortcode = '[skills]';

foreach ($stats_bars as $stats_bar):

    $shortcode .= '[skill_bar title="' . $stats_bar['title'] . '" value="' . $stats_bar['value'] . '" ]';

endforeach;

$shortcode .= '[/skills]';

echo do_shortcode($shortcode);