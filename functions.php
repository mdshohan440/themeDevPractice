<?php
//Note first you have to include this code into "functions.php" then you have write the variable "VERSION" into internal css/js files
if ( site_url() == "https//shohan.local/" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

if(!function_exists('blogvita_setup')):
function blogvita_setup(){
	load_theme_textdomain('blogvita',get_template_directory_uri().'/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	$theme_header_color = array(
	 'header-text' => true,
	 'default-text-color' =>'#fff'
	);
	add_theme_support('custom-header',$theme_header_color);
	$logo_img_size = array(
		'width'=>'100',                                                                                
        'height'=>'100'
	);
	add_theme_support('custom-logo');
	register_nav_menu('topmenu',__('Top Menu','blogvita'));
	register_nav_menu('footermenu', __('Footer Menu','blogvita'));
}
endif;
add_action('after_setup_theme','blogvita_setup'); 

function blogvita_sidebar(){
	register_sidebar(array(
			'name' =>     __('sidebar one','blogvita'),
			'id'   =>     __('sidebar-1','blogvita'),
			'description'=>__('this is first registered sidebar','blogvita'),
			'before_widget'=>'',
			'afeter_widget'=>'',
			'before_title'=>'<h1>',
			'after_title' =>'</h1>'
 
	));
	register_sidebar(array(
			'name' =>     __('sidebar Two','blogvita'),
			'id'   =>     __('sidebar-footer','blogvita'),
			'description'=>__('this is first registered sidebar','blogvita'),
			'before_widget'=>'',
			'afeter_widget'=>'',
			'before_title'=>'',
			'after_title' =>''
 
	));
}
add_action('widgets_init','blogvita_sidebar');


function blogvita_assets(){
	wp_enqueue_style('bootstraping','//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

	// min css
	wp_enqueue_style('blogvita_style', get_stylesheet_uri(),null, VERSION);
	wp_enqueue_style('blogvita_popup_image_css','//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css' , null,time());
	wp_enqueue_script('blogvita_popup_image_js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script("blogvita_main", 
		get_template_directory_uri().'/assets/js/main.js', array("jquery","blogvita_popup_image_js"),VERSION, true);

	if(is_singular() && comments_open() && get_option('thread_comments')){
	wp_enqueue_script('cooment_reply');

	}
}
//password protected post making
add_action('wp_enqueue_scripts','blogvita_assets');

function password_protected($excerpt){
	if(!post_password_required()){
		echo $excerpt;
	}else{
		the_excerpt();
	}
}
add_filter('the_excerpt','password_protected');

function protected_title_change(){
return "%s";
}
add_filter('protected_title_format','protected_title_change');

//menu css class add for inline view
function menu_class_adding($classes,$item){
        $classes[] = "list-inline-item text-center";
        return $classes;
}
add_filter('nav_menu_css_class','menu_class_adding',10,2);






//external css add 
function external_css_add_inside_page(){
	//about page banner css
	if(is_page()){
		$header_bg = get_the_post_thumbnail_url(null,'large');

?>
	<style>
		.header-page{
			background-image: url(<?php echo $header_bg;?>);
		}
	</style>
<?php 	
 	}
  //custom header css add 
 	if(is_front_page()){
 		if(current_theme_supports('custom-header')){
 			?>
				<style>
					/* header image dynamic */
					.header{
						background-image: url('<?php echo header_image();?>');
						margin-bottom: 50px;
						background-size: cover;
					}

					
						/* header text  color dynamic */

					.header h1.heading a,h3.tagline{
							color : #<?php echo get_header_textcolor();?>;
							/* header text  condition */
							<?php
							 if(! display_header_text()){
							 	echo 'display:none';
							}
							?>
						}
					.heading{
						<?php 
							if(!display_header_text()){
								echo 'border-bottom:hidden';
							}
						?>
					}
				</style>
 			<?php
 		}
 	}
    
}

add_action("wp_head",'external_css_add_inside_page');


