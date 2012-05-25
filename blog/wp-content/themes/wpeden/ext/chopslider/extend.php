<?php

function minimax_chop_slider(){
    $slider_posts = get_posts("numberposts=4");
    ?>
<div id="slider-area">
<div class="slider">

  <div class="s-shadow-t"></div>
  <div class="s-shadow-b"></div>
  <a id="slide-next" href="#"></a> <a id="slide-prev" href="#"></a>
  <div id="slider">
    <?php foreach($slider_posts as $spost){ $n++; ?>                                    
    <div class="slide <?php echo $n<=1?'activeSlide':''; ?>"> <?php minimax_thumb($spost,'slider'); ?> </div>
    <?php } ?>    
  </div>
  <div class="slide-descriptions">
    <?php foreach($slider_posts as $spost){ ?>                                    
    <div class="sl-descr">
      <h2><?php echo $spost->post_title; ?></h2>
      <p><?php minimax_excerpt($spost->post_content,150) ?></p>
    </div>
    <?php } ?>        
  </div>
  <div class="caption" style="display:none;"></div>
</div>
<div id="slide-loader"></div>
</div>    
    <?php
}

wp_enqueue_script('chopslider1',MX_THEME_URL.'/ext/chopslider/jquery.id.chopslider-1.1.0.min.js');
wp_enqueue_script('chopslider2',MX_THEME_URL.'/ext/chopslider/chopslider.js');
wp_enqueue_style('nivo-slider',MX_THEME_URL.'/ext/chopslider/chopslider.css');
 