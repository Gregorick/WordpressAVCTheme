<?php 

class ATR_Public {
     private $theme_name;
     private $version;

     public function __construct($theme_name, $version) {
         $this->theme_name = $theme_name;
         $this->version = $version;
     }

     public function enqueue_styles() {
        wp_enqueue_style(
         'public-css',
         ATR_DIR_URI . 'public/css/atr-public.css',
         array(),
         $this->version,
         "all"
        );
   
        wp_enqueue_style(
          'bootstrap-css',
          ATR_DIR_URI . 'helpers/bootstrap-5.3.0/css/bootstrap.min.css',
          array(),
          "5.3.0",
          "all"
        );
   
   
        wp_enqueue_style(
        'normalize-css',
        ATR_DIR_URI . 'public/css/normalize.css',
        array(),
        "8.0.1",
        "all"
        );
   }
   
   public function enqueue_scripts() {
        wp_enqueue_script(
           'publi-js',
           ATR_DIR_URI . 'public/js/atr-public.js',
           ['jquery', 'bootstrap-min'],
           "1.0.0",
           true
        );
   
        wp_enqueue_script(
           'bootstrap-js',
           ATR_DIR_URI . 'helpers/bootstrap-5.3.0/js/bootstrap.min.js',
           ['jquery'],
           "5.3.0",
           true
        ); 
   }
   

} 