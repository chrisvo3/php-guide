<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP - Conditional Tags</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

		<?php wp_head(); ?>
	</head>

	<body class=<?php body_class(); ?>>
		<header id="masterhead">
			<h1><a href="#">PHP - Conditional Tags</a></h1>
			<h3><?php bloginfo( 'name' ); ?></h3>
		</header>