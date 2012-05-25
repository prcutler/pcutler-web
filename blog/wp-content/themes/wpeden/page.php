<?php get_header(); ?>    
     
            
<div style="clear: both;"></div>  
<div class="col2 green_posts">
<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<?php 
while(have_posts()): the_post(); ?>
 
<div class="post">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div class="meta">Posted on <?php the_date(); ?> / Posted by <?php the_author(); ?></div>
<?php minimax_post_thumb('post-thumb'); ?>
<div class="clear"></div>
<p><?php the_content(); ?></p>
<?php wp_link_pages( ); ?>
</div>
 <div class="mx_comments"> 
<?php comments_template(); ?>
</div>
<?php endwhile; ?>
</div>
</div>
<div class="col1 sidebar">
 
<?php dynamic_sidebar('Single Post'); ?>
</div>
        <!-- The JavaScript -->

<?php get_footer(); ?>
