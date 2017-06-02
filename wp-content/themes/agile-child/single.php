<?php

/**
 * Post Template
 *
 * This template is loaded when browsing a Wordpress post.
 *
 * @package Agile
 * @subpackage Template
 */

function mo_display_post_thumbnail() {

    $post_id = get_the_ID();
    $args = mo_get_thumbnail_args_for_singular();
    $image_size = $args['image_size'];
    $thumbnail_exists = mo_display_video_or_slider_thumbnail($post_id, $image_size);
    if (!$thumbnail_exists) {

        $thumbnail_exists = mo_thumbnail($args);
    }
    return $thumbnail_exists;

}

//get_header();
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title><?php wp_title('|', true, 'right');
        bloginfo('name'); ?></title>

    <!-- For use in JS files -->
    <script type="text/javascript">
        var template_dir = "<?php echo get_template_directory_uri(); ?>";
    </script>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <?php mo_setup_theme_options_for_scripts(); ?>

    <?php wp_head(); // wp_head  ?>

    <!-- Facebook Comment -->
	<meta property="fb:app_id" content="223396154770009" />
	<meta property="fb:admins" content="100000184212859"/>
    <!-- End Facebook Comment -->

</head>

<!-- Facebook Comment -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=223396154770009";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End FB Comment -->

<body <?php body_class(); ?>>

<?php

$disable_smooth_page_load = mo_get_theme_option('mo_disable_smooth_page_load');

if (empty($disable_smooth_page_load)) {
    echo '<div id="page-loading"></div>';
}

?>

<?php mo_exec_action('start_body'); ?>

<?php echo '<a id="mobile-menu-toggle" href="#"><i class="icon-th-menu"></i>&nbsp;</a>'; ?>

<?php get_template_part('menu', 'mobile'); // Loads the menu-mobile.php template.    ?>

<div id="container">

    <?php mo_exec_action('before_header'); ?>

    <?php
    $header_classes = apply_filters('mo_header_class', array());
    if (!empty($header_classes))
        $header_classes = 'class="' . implode(' ', $header_classes) . '"';
    else
        $header_classes = '';
    ?>

    <header id="header" <?php echo $header_classes; ?>>

        <div class="inner clearfix">

            <div class="wrap">

                <?php mo_exec_action('start_header');

                mo_site_logo();

                mo_site_description();

                mo_display_sidebar('header');

                mo_exec_action('header');

                
                get_template_part('menu', 'primary'); // Loads the menu-primary.php template.

                mo_exec_action('end_header'); ?>

                <?php if (mo_is_woocommerce_activated()) {
                    mo_display_cart_in_header();
                }?>

            </div>

        </div>

    </header>
    <!-- #header -->

    <?php mo_exec_action('after_header'); ?>

    <?php mo_populate_top_area(); ?>

    <div id="main" class="clearfix">

        <div class="banner-page" style="background-image: url(<?php the_post_thumbnail_url( $size ); ?>);background-size: cover;position: relative;height: 500px;width: 100%;">
            <div class="banner-cover" style="">
            <div style="margin:auto;text-align:center;width:100%;top:35%;position: absolute;">
                <div class="heading2" style="width:100%;">
                    <h2 class="title title-archive" style=""><?php echo get_the_title(); ?></h2>
                </div>
            </div>
            </div>

        </div>
        
        <?php mo_exec_action('start_main'); ?>

        <div class="inner clearfix">


<?php mo_exec_action('before_content'); ?>

    <div id="content" class="<?php echo mo_get_content_class(); ?>">

        <?php mo_exec_action('start_content'); ?>

        <div class="hfeed">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php mo_exec_action('before_entry'); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php mo_exec_action('start_entry'); ?>

                        <?php echo mo_get_entry_title(); ?>


                        <?php
                        echo '<div class="entry-meta">' . mo_entry_published("M d") . mo_entry_author() . mo_entry_terms_list('category') . mo_entry_comments_link() . '</div>';
                        ?>

                        <div class="entry-content clearfix">

                            <?php
                            mo_display_post_thumbnail();
                            ?>

                            <?php the_content(); ?>

                            <?php wp_link_pages(array('link_before' => '<span class="page-number">', 'link_after' => '</span>', 'before' => '<p class="page-links">' . __('Pages:', 'mo_theme'), 'after' => '</p>')); ?>

                        </div>
                        <!-- .entry-content -->

                        <?php $post_tags = wp_get_post_tags($post->ID);

                        if (!empty($post_tags)) : ?>

                            <div class="entry-meta">

                                <div class="taglist">

                                    <i class="icon-tags2"></i>

                                    <?php echo mo_entry_terms_list('post_tag'); ?>

                                </div>

                            </div>

                        <?php endif; ?>

                        <?php mo_exec_action('end_entry'); ?>

                    </article><!-- .hentry -->


                    <?php mo_exec_action('after_entry'); ?>

                    <?php mo_display_sidebar('after-singular-post'); ?>

                    <?php mo_exec_action('after_singular'); ?>

                    <div style="clear:both;"></div>
                    <?php
                    $cat = get_the_category( get_the_ID() );
                    if ($cat) {
                        $t = $cat[0];
                        $r = new WP_Query(array('posts_per_page'=> 4, 'post__not_in'=> array( get_the_ID() ), 'cat'=> $t->term_id ));
                        echo '<h3 style="text-align:left;" class="relate-title">Bài viết liên quan</h3>';
                        echo '<div class="show-more-post">';
                        while ( $r->have_posts()): $r->the_post();
                            echo '<div style="text-align:left;" class="ovf">';
                            echo '&nbsp<a href="'.get_permalink().'">'. get_the_post_thumbnail(get_the_ID(), 'thumbnail').'<span class="mh block">'.get_the_title().'</span></a>';
                            echo '</div>';
                        endwhile;
                        echo '</div><hr>';
                        wp_reset_postdata();
                    } 
                    ?>
                    <div style="clear:both;"></div>

                    <?php echo '<div id="respond" class="fb-comments" data-numposts="20" width="100%" data-colorscheme="light" data-version="v2.3"></div>';
			//comments_template('/comments.php', true); // Loads the comments.php template.   ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>
        <!-- .hfeed -->

        <?php mo_exec_action('end_content'); ?>

        <?php //get_template_part('loop-nav'); // Loads the loop-nav.php template.   ?>

    </div><!-- #content -->

<?php mo_exec_action('after_content'); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>