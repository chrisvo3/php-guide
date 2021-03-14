<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP - Basic PHP</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	</head>

	<body>
		<header id="masterhead">
			<h1><a href="#">PHP - Basic PHP</a></h1>
		</header>

		<div id="content">
		<?php
		// Create an array of post objects using the display_post() function.
		$post_titles = array(
			'PHP Basic',
			'PHP WordPress',
			'PHP Laravel',
		);
		// Loop through array of posts and display each one on the page.
			// Call the display_title function and pass it the $post.
		foreach ( $post_titles as $post_title ) {
			display_title( $post_title );
		}

		/**
		 * Custom function for displaying the title and content for a post
		 *
		 * @param string $title The title to be displayed.
		 */
		function display_title( $title ) {
			// Echo an <h3> tag with the $title inside.
			// echo '<h3>' . $title . '</h3>'; // either this way or that way work
			echo "<h3> $title </h3>";
		}
		?>
		</div>
	</body>
</html>