<?php get_header(); ?>
<h1>Front Page </h1>
<?php the_title(); ?>

<?php the_content();

echo phpversion();

?>

<div class="root"></div>

<?php get_footer(); ?>