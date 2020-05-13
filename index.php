<?php get_header();?>

<?php  while(have_posts()): the_post();?>
<div class="posts" >
    <div class="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php the_permalink();?>"><h2 class="post-title"><?php the_title();?></h2></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" >
                    <p>
                        <strong><?php the_author();?></strong><br/>
                        <?php echo get_the_date();?>
                    </p>


                        <?php echo get_the_tag_list('<ul class=\"list-unstyled\"><li>','</li><li>','</li></ul>');?>
                    <ul class="list-unstyled">
                        <li></li>
                    </ul>
                </div>
                <div class="col-md-12">
       
                        <?php 
                                       
                            if(has_post_thumbnail()){
                            //$thumbnail_url = get_the_post_thumbnail_url(null,'large');
                                        
                            //echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                            echo '<a class="popup" href="#" data-featherlight="image">';
                            the_post_thumbnail("large");
                            echo'</a>';
                            } 
                                    
                        ?>
                    </div>
                    
                    <p>
                    	<?php if(!post_password_required()){
							the_excerpt();
                    	}else {
                    		echo get_the_password_form();
                    	}
                    	?>
                        
                    </p>

                    
                </div>
            </div>

        </div>
    </div>
<?php endwhile;?>
    
</div>

<div class="container pagination">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php 
		 		the_posts_pagination( array(
				    	'screen_reader_text'=>"  ",
		) ); ?>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<?php get_footer();?>