<?php
/*
*Template Name: About Page Template
*/
 ?>
<?php get_template_part("hero-page");?>
			 <?php 
			while(have_posts()):the_post();?>

			<div class="posts" >
			    <div class="post"<?php post_class();?>>
			        <div class="container">
			            <div class="row">
			                <div class="col-md-12 ofset-md-1">
			                    <h2 class="post-title"style="margin:auto;text-align: center;">
			                    	<?php the_title();?></h2>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-12"style="margin:auto;text-align: center;">
			                    <p>
			                        <strong><?php the_author();?></strong><br/>
			                        <?php echo get_the_date();?>
			                    </p>


			                        <?php echo get_the_tag_list('<ul class=\"list-unstyled\"><li>','</li><li>','</li></ul>');?>
			                    <ul class="list-unstyled">
			                        <li></li>
			                    </ul>
			                </div>
			                <div class="col-md-12 ofset-md-1">
			                    <p class="image">
			                        <?php /*
			                           
			                           if(has_post_thumbnail()){
			                           	$thumbnail_url = get_the_post_thumbnail_url(null,'large');
			                           	
			                           	//echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
			                           	printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
			                           the_post_thumbnail("large");
			                           echo'</a>';
			                       } 
			                        
			                        */?>
			                    </p>

			                    <p><?php the_content();?> </p>
			                </div>
			            </div>

			        </div>
			    </div>
			<?php endwhile;?>
			    
			</div>
<?php get_footer();?>