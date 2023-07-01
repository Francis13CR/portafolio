<?php
/** 
 * Plugin name: Plugin de elementor
 * description: widget para elementor
 * Author: francis
 * 
 */
if(!defined('ABSPATH')){
    exit;
}

final class Widget_Elementor{
    const VERSION = '1.0.0';
    const MINIMUN_ELEMENTOR_VERSION = '2.0.0';
    public function __construct(){
        add_action('plugins_loaded', [$this,'init']);
    }

    public function init(){
        if(!did_action('elementor/loaded')){
            add_action('admin_notices',[$this,'admin_notice_missing_main_plugin']);
            return;
        }

        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
    }
    public  function init_widgets(){
            include_once('mi-widget.php');
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Mi_Widget());
    }
    public function admin_notice_missing_main_plugin(){
        if(isset($_GET['active'])) unset($_GET['activate']);
        echo '<div class="notice notice-warning is-dismissible"><p><strong>' . sprintf(esc_html__('"%s" requiere "$s" para funcionar'), 'widger elementor', 'Elementor') . '</strong></p></div>';
    }
}
new Widget_Elementor();