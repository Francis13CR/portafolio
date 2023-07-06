<?php
class Mi_Widget extends \Elementor\Widget_Base {
    public function get_name(){
        return 'mi-widget';
    }

    public function get_title(){
        return __('New post', 'widget-elementor');
    }

    public function get_icon(){
        return 'fa fa-greeting-card';
    }

    public function get_categories(){
        return ['blog'];
    }

    public function _register_controls(){
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contenido', 'widget-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'titulo',
            [
                'label' => __('Título', 'widget-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Título de la tarjeta', 'widget-elementor')
            ]
        );

        $this->add_control(
            'imagenes',
            [
                'label' => __('Imágenes', 'widget-elementor'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->add_control(
            'campo_de_texto',
            [
                'label' => __('Campo de Texto', 'widget-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Texto de ejemplo', 'widget-elementor'),
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

        $this->add_control(
            'enlace',
            [
                'label' => __('Enlace', 'widget-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://ejemplo.com', 'widget-elementor'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'tamanio_fuente',
            [
                'label' => __('Tamaño de Fuente', 'widget-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mi-widget-titulo' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .mi-widget-texto' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $settings = $this->get_settings_for_display();

        echo '<div class="mi-widget">';
        foreach ($settings['imagenes'] as $imagen) {
            echo '<img class="img-widget" src="'.$imagen['url'].'">';
        }
        echo '<h2 class="mi-widget-titulo" style="font-size: '.$settings['tamanio_fuente']['size'].$settings['tamanio_fuente']['unit'].';">'.$settings['titulo'].'</h2>';
        echo '<p class="mi-widget-texto" style="font-size: '.$settings['tamanio_fuente']['size'].$settings['tamanio_fuente']['unit'].';">'.$settings['campo_de_texto'].'</p>';
        echo '<img class="img-widget" src="'.$settings['imagen']['url'].'"> <br>';

        if (!empty($settings['enlace']['url'])) {
            echo '<br><a style="color:#FFFF00!important" href="'.$settings['enlace']['url'].'"';
            if ($settings['enlace']['is_external']) {
                echo ' target="_blank"';
            }
            if ($settings['enlace']['nofollow']) {
                echo ' rel="nofollow"';
            }
            echo '>Ver mas información</a>';
        }

        echo '</div>';
    }
}
