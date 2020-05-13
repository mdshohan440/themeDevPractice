<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name');?></title>
    
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
    <div class="header">
    <?php get_template_part("/template-parts/common/hero");?>
</div>