
<?php get_header();?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			 <?php 
			while(have_posts()):the_post();?>

			<div class="posts" >
			    <div class="post"<?php post_class();?>>
			        <div class="container">
			            <div class="row">
			                <div class="col-md-12">
			                    <h2 class="post-title"style="margin:auto;text-align: center;"><?php the_title();?></h2>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-8"style="margin:auto;text-align: center;">
			                    <p>
			                        <strong><?php the_author();?></strong><br/>
			                        <?php echo get_the_date();?>
			                    </p>


			                        <?php echo get_the_tag_list('<ul class=\"list-unstyled\"><li>','</li><li>','</li></ul>');?>
			                    <ul class="list-unstyled">
			                        <li></li>
			                    </ul>
			                </div>
			                <div class="col-md-12 ">
			                    <p class="image">
			                        <?php 
			                           
			                           if(has_post_thumbnail()){
			                           	$thumbnail_url = get_the_post_thumbnail_url(null,'large');
			                           	
			                           	//echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
			                           	printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
			                           the_post_thumbnail("large");
			                           echo'</a>';
			                       } 
			                        
			                        ?>
			                    </p>
			                    <p>
			                        <?php 

			                        the_content();

			                        next_post_link();
			                        echo"<br/>";
			                        previous_post_link();
			                        ?>
			                    </p>

			                    
			                </div>
			            </div>

			        </div>
			    </div>
			<?php endwhile;?>
			    
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-10">
						
						<?php if(comments_open()){
							comments_template();
						}?>
					</div>
				</div>
			</div>
				</div>
		<div class="col-md-4">
			<?php 
			    if(is_active_sidebar('sidebar-1')){
			    	dynamic_sidebar('sidebar-1');
			    }
			?>

		</div>
	</div>
</div>
<?php get_footer();?>