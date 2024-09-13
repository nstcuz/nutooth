<?php 
// enqueue style sheets for child theme
function nutooth_child_theme_styles() {
  $parenthandle = 'divi-style';
  $theme = wp_get_theme();
  // enqueue parent theme stylesheet
  wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css' );
  
  // enqueue WP header comment (style.css)
  wp_enqueue_style( 'child-style',
      get_stylesheet_uri(),
      array( $parenthandle ),
      $theme->get( 'Version' )
  );
  
  // enqueue your main compiled CSS (main.css)
  wp_enqueue_style( 'child-main-style',
      get_stylesheet_directory_uri() . '/main.css',
      array( 'child-style' ),
      filemtime( get_stylesheet_directory() . '/main.css' )
  );
}
add_action( 'wp_enqueue_scripts', 'nutooth_child_theme_styles', 11 );