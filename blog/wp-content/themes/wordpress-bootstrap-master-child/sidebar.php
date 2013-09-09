        <div id="sidebar1" class="fluid-sidebar sidebar col-sm-4 col-md-4" role="complementary">
          <div class="panel panel-default ">
  <div class="panel-body">
        
          <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

            <?php dynamic_sidebar( 'sidebar1' ); ?>

          <?php else : ?>

            <!-- This content shows up if there are no widgets defined in the backend. -->
            
            <div class="alert alert-message">
            
              <p><?php _e("Please activate some Widgets","bonestheme"); ?>.</p>
            
            </div>

          <?php endif; ?>
</div>
</div>
        </div>