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
        <?php //wp_list_pages('title_li=&sort_column=menu_order&depth=1&meta_key=menu' ); ?>
        <li><a href="http://awesomemath.org">Home</a></li>
        <li><a href="http://awesomemath.org/summer-program/" title="AMSP">Summer Program</a>
            <ul>
                <li><a href="/wp-content/uploads/TEST_C.pdf">Test C</a></li>
                <li><a href="/summer-program/application/">Application</a></li>
                <li><a href="/wp-content/uploads/pdf/amsp_2011_brochure_final_web2.pdf">Brochure</a></li>
                <li><a href="/summer-program/curriculum/">Curriculum &gt;</a><ul>
                <li><a href="/summer-program/curriculum/course-descriptions">Course Description</a></li>
                <li><a href="/summer-program/curriculum/course-selection-tips">Course Selection Tips</a></li></ul></li>
                <li><a href="/summer-program/daily-schedule/">Daily Schedule</a></li>
                <li><a href="/summer-program/staff/">Faculty</a></li>
                <li><a href="/summer-program/faq/">FAQ</a></li>
                <li><a href="/summer-program/testimonials/">Testimonials</a></li>
                <li><a href="/summer-program/pictures/">Pictures</a></li>					
            </ul>
        </li>
        <li><a href="/year-round-program/">Year-Round Program</a>
            <ul>
                <li><a href="/year-round-program/registration/">Registration</a></li>		
            </ul>
        </li>
        <li><a href="/mathematical-reflections/">Mathematical Reflections</a>
            <ul>
                <li><a href="/mathematical-reflections/current-issue/">Current Issue</a></li>
                <li><a href="/mathematical-reflections/subscribe/">Subscribe</a></li>
                <li><a href="/mathematical-reflections/archive/">Archive</a></li>
                <li><a href="/mathematical-reflections/submissions/">Submissions</a></li>						
            </ul>
        </li>	
        <li><a href="/xyz-press/">XYZ Press</a>
            <ul>
                <li><a href="https://checkout.google.com/view/buy?o=shoppingcart&shoppingcart=110447833026763">Buy Online</a></li>	
                <li><a href="/order-form.pdf">Mail Order Form</a></li>					
            </ul>
        </li>	
        <li><a href="/forum/">Forum</a>
            <ul>
                <li><a href="http://www.artofproblemsolving.com/Forum/index.php?f=442">Visit</a></li>					
            </ul>
        </li>	
    </ul>
</div>
</div>

<div id="page-wrapper">
<div id="page">
