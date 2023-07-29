<?php 

class ATR_Master {
     
    protected $cargador;
    protected $theme_name;
    protected $version;

    public function __construct() {
         $this->theme_name = "ATR_Pruebas";
         $this->version - "1.0.0";
         $this->cargar_dependencias();
         $this->cargar_instancias();
         $this->set_idiomas();
         $this->definir_admin_hooks();
         $this->definir_public_hooks();
         
    }

    private function cargar_dependencias() {
        // LA CLASE RESPONSABLE DE ITERAR LAS ACCIONES Y FILTROS DEL NUCLEO DEL THEME
        require_once ATR_DIR_PATH . 'includes/class-atr-cargador.php';
        // LA CLASE RESPONSABLE DE DEFINIR LA FUNCIONALIDAD DE INTERNACIONALIZACION DEL THEME
        require_once ATR_DIR_PATH . 'includes/class-atr-i18n.php';
        // LA CLASE RESPONSABLE DE REGISTRAR MENUS Y SUBMENUS
        require_once ATR_DIR_PATH . 'includes/class-atr-build-menupage.php';
        // LA CLASE RESPONSABLE DE DEFINIR TODAS LAS ACCIONES EN EL AREA DE ADMINISTRACION
        require_once ATR_DIR_PATH . 'admin/class-atr-admin.php';
        // LA CLASE RESPONSABLE DE DEFINIR TODAS LAS ACCIONES EN EL AREA DEL LADO DEL CLIENTE/PUBLICO
        require_once ATR_DIR_PATH . 'public/class-atr-public.php';
         
    }

    private function set_idiomas() {
        $atr_i18n = new ATR_i18n();
        $this->cargador->add_action('after_setup_theme', $atr_i18n, 'load_theme_textdomain');
    }

    private function cargar_instancias() {
        // Crear una instancia del cargador que se utilizará para registrar los ganchos con wordpress
        $this->cargador = new ATR_Carcador;
        $this->atr_admin = new ATR_Admin($this->get_theme_name(), $this->get_version());
        $this->atr_public = new ATR_Public($this->get_theme_name(), $this->get_version());
    }

    private function definir_admin_hooks() {

    }

    private function definir_public_hooks() {
        $this->cargador->add_action('wp_enqueue_scripts', $this->atr_public, 'enqueue_styles');
        $this->cargador->add_action('wp_enqueue_scripts', $this->atr_public, 'enqueue_scripts');
    }

    public function get_theme_name() {
        return $this->theme_name;
    }

    public function get_version() {
        return $this->version;
    }

    public function get_cargador() {
        return $this->cargador;
    }

    public function run() {
        $this->cargador->run();
    }
}