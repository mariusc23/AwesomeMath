<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('::', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/iestyle.css" type="text/css" media="screen" />
<![endif]--> 
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php bloginfo('template_directory');?>/favicon.ico" type="image/x-ico"/>
<?php wp_enqueue_script('jquery');
      wp_enqueue_script('', get_bloginfo('template_directory') . '/main.js');
?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php if ( is_home() ) {
// begin homepage specific code
?>

<?php }
//end homepage specific code
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="header">
<div id="header-inner">
    <a id="header-logo" href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>" ></a>
    <?php dynamic_sidebar('header-dynamic'); ?>
    <ul id="navigation">
        <?php wp_list_pages('title_li=&sort_column=menu_order&depth=1&meta_key=menu' ); ?>
    </ul>
</div>
</div>

<div id="page-wrapper">
<div id="page">
