<?php get_header(); ?>
<body>

<section class="list">
<h1 class="list-title"><span>NEWS</span> ポートフォリオ一覧</h1>

<?php if(have_posts()): 
while(have_posts()): the_post(); ?>

<article <?php post_class(); ?>>
<a href="<?php the_permalink(); ?>">
<?php if( has_post_thumbnail() ): ?>
	<?php the_post_thumbnail( 'thumbnail' ); ?>
<?php else: ?>

	<?php preg_match( '/wp-image-(\d+)/s', $post->post_content, $thumb ); ?>
	<?php if ( $thumb ): ?>
		<?php echo wp_get_attachment_image( $thumb[1], 'thumbnail' ); ?>
	<?php else: ?>
		<img src="<?php echo get_template_directory_uri(); ?>/thumb.jpg" alt="">
	<?php endif; ?>

<?php endif; ?>
<h1><?php the_title(); ?></h1>

<div class="postinfo">
<time datetime="<?php echo get_the_date( 'c' ); ?>">
<?php echo get_the_date(); ?>
</time>
</div>

<?php the_excerpt(); ?>

</a>
</article>

<?php endwhile; endif; ?>
<?php if ( $wp_query->max_num_pages > 1 ): ?>
<div class="navlink">
<span class="navlink-prev">
<?php next_posts_link('<i class="icon-chevron-sign-left"></i> 古い記事'); ?>
</span>

<span class="navlink-next">
<?php previous_posts_link('新しい記事 <i class="icon-chevron-sign-right"></i>'); ?>
</span>
</div>
<?php endif; ?>


</section>


<?php get_footer(); ?>
</body>
</html>
