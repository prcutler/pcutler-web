<?php get_header(); ?>
    
    <?php minimax_chop_slider(); ?>
            
<div style="clear: both;"></div>  
<div class="col2 green_posts home">
<!--<h1 class="title title_green" style="color: #fff;margin: 0px 5px 0px 0px;">
Recent Posts
</h1> -->

<?php 
query_posts('posts_per_page=4');
while(have_posts()): the_post(); ?>
<div class="col1">
<div class="post box home-box">
<h3><a href="<?php the_permalink(); ?>"><nobr><?php the_title(); ?></nobr></a></h3>
<?php minimax_post_thumb('homepage-thumb'); ?>
<div class="meta">Posted on <?php the_date(); ?> / Posted by <?php the_author(); ?></div>
<p><?php minimax_post_excerpt(110); ?></p>
</div>
</div>
<?php endwhile; ?>
</div>
<div class="col1 sidebar" style="margin-top: 5px;">
 
<?php dynamic_sidebar('Home Page'); ?>
</div>
        <!-- The JavaScript -->

        
<?php get_footer(); ?>
