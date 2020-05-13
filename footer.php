
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
            	<?php 
            		if (is_active_sidebar('sidebar-footer')) {
            			dynamic_sidebar('sidebar-footer');
            		}
            	?>
                
            </div>
            <div class="col-md-12 text-right">
            	<?php 
            		wp_nav_menu(array(
            			'theme_location' =>'footermenu',
            			'menu_id'       =>'footermenu',
            			'menu_class'   =>'list-inline-item'
            		));
            	?>
                
            </div>

        </div>
    </div>
</div>
<?php wp_footer();?>
</body>
</html>