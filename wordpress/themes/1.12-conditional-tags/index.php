<?php get_header(); ?>

	<div id="content">
		<!-- Static Front Page -->
		<?php
		if ( is_front_page() ) {
			echo '<h1>is Front Page</h1>';
		}
		?>

		<!-- Blog Home -->
		<?php
		if ( is_home() ) {
			echo '<h1>is Home</h1>';
		}
		?>

		<!-- Page-->
		<?php
		if ( is_page() ) {
			echo '<h1>Is Page</h1>';
		}
		?>

		<!-- Page (Not Front Page) -->
		<?php
		if ( is_page() && ! is_front_page() ) {
			echo '<h1>Is Page && ! Is Front Page</h1>';
		}
		?>

		<!-- Single Post -->
		<?php
		if ( is_single() ) {
			echo '<h1>is Single</h1>';
		}
		?>

		<!-- Single Attachment (Media) -->
		<?php
		if ( is_attachment() ) {
			echo '<h2>is Attachment</h2>';
		}
		?>

		<!-- Category Archive -->
		<?php 
		if ( is_category() ) {
			echo '<h2>is Category</h2>';
			echo '<h3>' . single_cat_title() . '</h3>';
		}
		?>

		<!-- Tag Archive -->
		<?php
		if ( is_tag() ) {
			echo '<h2>is Tag</h2>';
			echo '<h3>' . single_tag_title() . '</h3>';
		}
		?>

		<!-- Author Archive -->
		<?php
		if ( is_author() ) {
			echo '<h2>is Author</h2>';
			echo '<h3>' . the_archive_title() . '</h3>';
		}
		?>

		<!-- Date Archive -->
		<?php
		if ( is_date() ) {
			echo '<h2>is Date</h2>';
		}
		?>

		<!-- 404 Page -->

	</div>

<?php get_footer(); ?>