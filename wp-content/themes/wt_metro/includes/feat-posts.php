<?php
/**
 * The template for displaying the featured posts on homepage.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, does not display.
 *
 * @package  WellThemes
 * @file     feat-posts2.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 *
 */
?>
<?php	
	$cat_id = wt_get_option('wt_feat_posts_cat');		//number of posts
	$cat_name = get_cat_name($cat_id);					//get category name
	$cat_url = get_category_link($cat_id );				//get category url	
?>

<div id="feat-posts">
	<header class="cat-header">	
		<?php
			if ($cat_id == 0 ) {	?>								
				<h3> <?php _e('Latest Posts', 'wellthemes'); ?></h3>	
				<a class="rss" href="<?php bloginfo('rss2_url'); ?>" >RSS</a>
			<?php					
			} else {													
				?>
				<h3><a href="<?php echo esc_url( $cat_url ); ?>" ><?php echo $cat_name; ?></a></h3>	
				<a class="rss" href="<?php home_url(); ?>?cat=<?php echo $cat_id; ?>&feed=rss2" >RSS</a>
				<?php
			}
		?>
	</header>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
			/* Include the Post-Format-specific template for the content.
			* If you want to overload this in a child theme then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'content', 'excerpt' );
		?>
		
	<?php endwhile; ?>
	<?php wt_pagination(); ?>
	
</div> <!--/feat-posts -->