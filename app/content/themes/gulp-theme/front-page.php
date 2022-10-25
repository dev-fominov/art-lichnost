<?php get_header(); ?>
<h1>Front Page </h1>
<?php the_title(); ?>

<?php the_content();

echo phpversion();

?>

<div class="rew steps">
	<ul class="count steps__icons">
		<li class="steps__icon-box item" data-id="1">1</li>
		<li class="steps__icon-box item" data-id="2">2</li>
		<li class="steps__icon-box item" data-id="3">3</li>
		<li class="steps__icon-box item" data-id="4">4</li>
	</ul>
	<ul class="steps__block count_block changed">
		<li class="steps__box block bl_1" data-slide="1">Content 1</li>
		<li class="steps__box block bl_2" data-slide="2">Content 2</li>
		<li class="steps__box block bl_3" data-slide="3">Content 3</li>
		<li class="steps__box block bl_4" data-slide="4">Content 4</li>
	</ul>
</div>

<div class="trew">
	fdgdf
</div>

<div class="root"></div>

<?php get_footer(); ?>