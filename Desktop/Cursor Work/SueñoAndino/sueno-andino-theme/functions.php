<?php
/**
 * Sueño Andino Theme Functions
 * 
 * @package SueñoAndino
 * @version 1.0.0
 * @requires PHP 8.0+
 * @tested up to PHP 8.2
 */

if (!defined('ABSPATH')) {
    exit;
}

// Verificar versión mínima de PHP
if (version_compare(PHP_VERSION, '8.2', '<')) {
    add_action('admin_notices', function() {
        echo '<div class="notice notice-error"><p><strong>Sueño Andino:</strong> Este tema requiere PHP 8.2 o superior. Tu versión actual es ' . PHP_VERSION . '.</p></div>';
    });
    return;
}

// Cargar módulos del tema
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/performance.php';

// Cargar configuración de Elementor si existe
if (file_exists(get_template_directory() . '/elementor-config.php')) {
    require_once get_template_directory() . '/elementor-config.php';
}