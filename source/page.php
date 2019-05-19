<?php get_header(); ?>
<div class="container">

	<div class="row">
		<?php while (have_posts()) { the_post() ?>
			<div class="col-sm-4">
				<h1><?php echo the_title() ?></h1>
				<p><?php echo the_content() ?></p>
			</div>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>