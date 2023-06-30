<?php
/** 
 * Plugin name: Plugin de utilidades
 * description: pluging para utilidades
 * Author: francis
 * 
 */


//funciona para obtener el html del icono
function getIcon($atts) {
    $name = isset($atts['name']) ? $atts['name'] : 'default'; // Obtener el valor del atributo 'name' o establecer un valor predeterminado si no se proporciona
    $iconos = array(
        'js' => 'fa-js',
        'html' => 'fa-html5',
        'css' => 'fa-css3-alt',
        'vue' => 'fa-vuejs',
        'java' => 'fa-java',
        'php' => 'fa-php',
        'drupal' => 'fa-drupal',
        'wordpress' => 'fa-wordpress',
        'bs' => 'fa-bootstrap'
    );
    $clase_icono = isset($iconos[$name]) ? $iconos[$name] : $atts['name']; //en caso de no existir dentro del array entonces se le pasa el valor directo
    $icon = '<i class="fa-brands ' . $clase_icono . ' icon-element"></i>';
    return $icon;
}
add_shortcode('getIcon', 'getIcon');

//funcion para crear un bloque con tres columnas
function tres_columnas_icon($atts) {
    $namesString = $atts['names'];

    $namesArray = explode(',', $namesString);
    $nombresIndividuales = [];
    // Recorrer el array de nombres
    foreach ($namesArray as $name) {
        // Guardar cada nombre en el nuevo array
        $nombresIndividuales[] = array('name' => $name);
    }
    ob_start();
    ?>
    <div class="wp-block-columns is-layout-flex mt-5">
        <div class="wp-block-column is-layout-flow">
            <?php echo getIcon($nombresIndividuales[0]); ?>
        </div>
        <div class="wp-block-column is-layout-flow">
            <?php echo getIcon($nombresIndividuales[1]); ?>
        </div>
        <div class="wp-block-column is-layout-flow">
            <?php echo getIcon($nombresIndividuales[2]); ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tres_columnas_icon', 'tres_columnas_icon');




// function accion(){
//  echo 'hola  <p>a</p>';
// }
// add_action('wp_footer','accion');

// function filtro($content){
//  return  $content . '<p>por todo lado<p> ';
// }
// add_filter('the_content', 'filtro');

// function shortcode(){
//     return '<p> mi primo </p>';
//    }
// add_shortcode('shortcode_x' , 'shortcode');
// function mostrar_lista_pub(){
//     $publicaciones = new WP_Query(array(['post_type' => 'post']));
//     $content = '<ul>';
//     if($publicaciones -> have_posts()){
//         while($publicaciones->have_posts()){
//             $publicaciones->the_post();
//             $content .= '<li><a href="' . get_the_permalink() . '">' .get_the_title() . '</a><li>';
//         }
        
//     }
//     wp_reset_postdata();
//     $content .= '</ul>';
//     return $content;
// }
// add_shortcode('mostrar_lista_pub_x' , 'mostrar_lista_pub');
