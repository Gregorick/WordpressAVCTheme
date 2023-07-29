<?php 

class ATR_i18n{
     public function load_theme_textdomain() {
         $textdomain = "Pruebas";
         load_theme_textdomain($textdomain, ATR_DIR_PATH . 'lang');
         $locate = apply_filters( 'theme_locate', is_admin() ? get_user_locale() : get_locate(), $textdomain );
         load_textdomain( $textdomain, get_theme_file_path("lang/$textdomain-$locate.mo") );
     }
}