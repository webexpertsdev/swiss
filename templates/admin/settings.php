<h1>Welcome to my custompage!</h1>

<!--
 if(!function_exists('add_action')){
     die;
 }

$mainClass = null;

 class SwissKnifeEcommerce
 {
     private $page_title = 'Swiss Knife Admin';
     private $menu_title = 'Swiss Knife';
     private $capability = 'manage_options';
     private $menu_slug = 'swissknife';
     private $icon_url = 'dashicons-rest-api';
     private $position = 61;

    function register(){
        //add tab to admin menu
        add_action('admin_menu', [$this, 'add_menu_items']);

        //add link to setting into plugin's page
        add_filter('plugin_action_links_'.plugin_basename(__FILE__), [$this, 'add_link_to_settings']);

        //load styles and scripts section
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
    }

    public function add_menu_items(){
        $p = new test();
        add_menu_page(
            $this->page_title, //Page Title
            $this->menu_title, //Menu Title
            $this->capability, //Capability
            $this->menu_slug, //Page slug
            [$this, 'add_admin_settings_page'], //Callback to print html
            $this->icon_url,
            $this->position
        );
    }

    public function add_admin_settings_page(){
        require_once plugin_dir_path(__FILE__).'templates/admin/settings.php';
    }

    public function add_link_to_settings($links){
        $new_link = '<a href="admin.php?page=swissknife">Settings</a>';
        array_push($links, $new_link);
        return $links;
    }

    public function enqueue_admin(){
        wp_enqueue_style('SwissKnifeEcommerceStyle', plugins_url('/assets/admin/css/admin.css', __FILE__));
        wp_enqueue_script('SwissKnifeEcommerceStyle', plugins_url('/assets/admin/js/admin.js', __FILE__));
    }
 }

 if(class_exists('SwissKnifeEcommerce')){
     $mainClass = new SwissKnifeEcommerce();
     $mainClass->register();
 }-->
