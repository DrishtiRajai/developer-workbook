<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); if(is_front_page()){echo "|"; bloginfo('description');}?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
<!-- header section starts  -->


<header class="header">
    <?php
      // For Hide / Show Header image(Site Logo Image)
      $header_image = get_theme_mod( 'headerwp_hide_logo' ) == '0' ? '<img src="' . get_theme_mod('header_logo') .'" class="logo-header" >': ''; 

      if( $header_image ) {
        echo $header_image;
      }
      
    ?>
   

  
 

  

</header>

<!-- header section ends  -->