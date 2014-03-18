<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  <meta name="description" content="Rexipes">  
  <meta name="author" content="Sarah Henry">  
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
   <?php wp_head(); ?>
  <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?version=1" />

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!--[if lt IE 9]>  
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
  <![endif]-->
  <script type="text/javascript" src="//use.typekit.net/kwc2fsi.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  
   <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
</head>  
<body <?php body_class(); ?>>  
 
 <div id="Wrapper">
            <div class="container">
                <header>
                    <div class="content">
                    <h1>Rexip.es!</h1>
                        <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => 'nav', 'container_id' => 'MainNav', 'theme_location' => 'primary-menu' ) ); ?>
                    </div>
                </header>

    

