 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP - The Loop</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	</head>

	<body>
		<header id="masterhead">
			<h1><a href="#">PHP - The Loops</a></h1>
		</header>

		<div id="content">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) :
				the_post();
				?>
			<!-- Display the_title and the_content here -->
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
				<?php
			endwhile;
		} else {
			?>
			<!-- Display a 404 message here -->
			<?php _e( 'Sorry, no content found', 'phpforwp' ); ?>
			<?php
		}
		?>
		</div>
	</body>
</html>