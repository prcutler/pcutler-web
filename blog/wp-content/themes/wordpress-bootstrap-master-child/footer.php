			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
		          <hr />
		          <div id="widget-footer" class="clearfix row">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>

    <div class="row">
                    <div class="col-xs-12 col-sm-9 col-md-9 col-9-lg">
					<!--social-->
                     <ul class="list-inline socialbuttons">
                  <li>
                    <div class="fb-like" data-href="http://johntransue.net" data-width="10" data-layout="button_count" data-show-faces="false" data-send="false"></div>
                  </li>
                  <li>
                    <a href="https://twitter.com/JohnTransue" class="twitter-follow-button" data-show-count="true">Follow @JohnTransue</a>
                    <script>
                      !
                      function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0],
                          p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                          js = d.createElement(s);
                          js.id = id;
                          js.src = p + '://platform.twitter.com/widgets.js';
                          fjs.parentNode.insertBefore(js, fjs);
                        }
                      }(document, 'script', 'twitter-wjs');
                    </script>
                  </li>
                  <li>
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone" data-size="medium" data-href="http://johntransue.net"></div>
                  </li>
                </ul>
                </div>
                    <!--end social-->
                    
			<div class="col-xs-12 col-3-sm col-3-md col-3-lg">
					<p class="attribution pull-right">&copy; 2013 <?php bloginfo('name'); ?></p>
			</div>

				</div> <!-- end #inner-footer -->
				</div> <!-- end #container -->
			</footer> <!-- end footer -->
		
		
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
        <!--social scripts-->
        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
        <!-- Place this tag after the last +1 button tag. -->
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script');
            po.type = 'text/javascript';
            po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
          })();
        </script>
        <!--end social scripts-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>