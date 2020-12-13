<?php
/*
    Plugin Name: La Pizzeria Gutenberg Block
    Plugin URI:
    Description: Agrega bloques de Gutenberg nativos
    Version: 1.0
    Author: Jose Luis Ferrete
    Author URI: https://jlferrete.com/
    License: GPL2
    License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) exit;

/** Categorias personalizadas */
function lapizzeria_categoria_personalizada($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'lapizzeria',
                'title' => 'La Pizzeria',
                'icon'  => 'store'
            )
        )
    );
}
add_filter('block_categories', 'lapizzeria_categoria_personalizada', 10, 2);

/** Registrar bloques, scripts y CSS */

function lapizzeria_registrar_bloques()
{

    //Si gutenberg no existe, salir
    if (!function_exists('register_block_type')) {
        return;
    }

    //Registrar los bloques en el editor
    wp_register_style(
        'lapizzeria-editor-script', //nombre unico
        plugins_url('build/index.js', __FILE__), //archivo con los bloques
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), //editor
        filemtime(plugin_dir_path(__FILE__) . 'build/index.js') //version
    );

    // Estilos para el editor (unicamente)
    wp_register_style(
        'lapizzeria-editor-styles',
        plugins_url('build/editor.css', __FILE__), //archivo css para el editor
        array('wp-edit-blocks'), //dependencias
        filemtime(plugin_dir_path(__FILE__) . 'build/editor.css') //version
    );

    // Estilos para los bloques (backend y frontend)
    wp_register_style(
        'lapizzeria-frontend-styles',
        plugins_url('build/styles.css', __FILE__), //archivo css para el editor
        array(), //dependencias
        filemtime(plugin_dir_path(__FILE__) . 'build/styles.css') //version
    );

    //Arreglo de bloques
    $blocks = [
        'lapizzeria/boxes'
    ];

    //Recorrer bloques y agregar scripts y styles

    foreach ($blocks as $block) {
        register_block_type($block, array(
            'editor_script' =>  'lapizzeria-editor-script',
            'editor_style'  =>  'lapizzeria-editor-styles',
            'style'         =>  'lapizzeria-frontend-styles'
        ));
    }
}
add_action('init', 'lapizzeria_registrar_bloques');
