<?php
class Mi_Widget extends \Elementor\Widget_Base {
    public function get_name(){
        return 'mi-widget';
    }
    public function get_title(){
        return __('Mi Widget', 'widget-elementor');
    }

    public function get_icon(){
        return 'fas fa-greeting-card';
    }
    public function get_categories(){
        return ['blog'];
    }

    public function _register_controls(){
        $this->start_controls_section(
            'content_section',
            [
                'label' =>  __('Contenido', ',widget-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'titulo',
            [
                'label' =>  __('titulo', ',widget-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' =>__('Titulo de la tarjeta', ',widget-elementor')
            ]
        );
        $this->add_control(
            'imagen',
            [
                'label' =>  __('imagen', ',widget-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' =>[
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render(){
        $settings = $this->get_settings_for_display();
        echo '
            <div class="mi-widget">
                
                <img class="img-widget" src="'.$settings['imagen']['url'].'">
                <h2 class="mi-widget-titulo">'.$settings['titulo']. ' </h2>
            </div>
        ';
    }
}