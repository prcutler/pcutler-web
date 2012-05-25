<?php 
//Template Name: Full with page
get_header(); ?>    
     
            
<div style="clear: both;"></div>  
<div class="green_posts">
 
<?php 
while(have_posts()): the_post(); ?>
 
<div class="post">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div class="meta">Posted on <?php the_date(); ?> / Posted by <?php the_author(); ?></div>
<?php minimax_post_thumb(array(610,'auto')); ?>
<div class="clear"></div>
<p><?php the_content(); ?></p>
</div>
 
<?php endwhile; ?>
</div>

<?php get_footer(); ?>
