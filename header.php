<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php wp_title( '-', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<?php wp_head(); ?>
</head>
<body>

<header>

<h1>
<a href="<?php echo home_url(); ?>">
<img src="<?php echo get_template_directory_uri(); ?>/logo.png" alt="">
<?php bloginfo( 'name' ); ?>
</a>
<?php 
  wp_nav_menu( array( 
    'theme_location' => 'main-menu' 
  ) ); 
?>

</h1>
</header>
