<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name');?></title>
    
    <?php wp_head();?>
</head>
<?php 
$header_bg = get_the_post_thumbnail_url(null,'large');
?>
<body <?php body_class();?>>
    <div class="header header-page">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo('description');?></h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <a href="<?php echo site_url();?>"><?php bloginfo('name');?></a>   
                </h1>
            </div>
           
        </div>
    </div>
</div>
   <div class="col-md-12">
                <div class="navigation">
                   <?php 
                        wp_nav_menu(array(
                            'theme_location' =>'topmenu',
                             'menu_id'      =>'',
                             'menu_class'  =>'list-inline,text-center',
                                )) ;
                     ?>
                </div>
    </div>

