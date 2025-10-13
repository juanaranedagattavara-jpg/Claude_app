<?php
/**
 * PHP 8.2 Compatibility Check for Sueño Andino Theme
 * 
 * @package SueñoAndino
 * @version 1.0.0
 */

// Verificar versión de PHP
echo "=== VERIFICACIÓN DE COMPATIBILIDAD PHP 8.2 ===\n";
echo "Versión de PHP actual: " . PHP_VERSION . "\n";
echo "Versión requerida: 8.2+\n";

if (version_compare(PHP_VERSION, '8.2', '>=')) {
    echo "✅ PHP 8.2+ detectado - COMPATIBLE\n";
} else {
    echo "❌ PHP 8.2+ requerido - NO COMPATIBLE\n";
    exit(1);
}

// Verificar extensiones requeridas
echo "\n=== VERIFICACIÓN DE EXTENSIONES ===\n";
$required_extensions = ['json', 'mbstring', 'xml', 'curl', 'gd', 'zip'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "✅ $ext - Disponible\n";
    } else {
        echo "❌ $ext - NO DISPONIBLE\n";
    }
}

// Verificar configuración de memoria
echo "\n=== VERIFICACIÓN DE CONFIGURACIÓN ===\n";
echo "Memory Limit: " . ini_get('memory_limit') . "\n";
echo "Max Execution Time: " . ini_get('max_execution_time') . "\n";
echo "Upload Max Filesize: " . ini_get('upload_max_filesize') . "\n";

// Verificar si es WordPress
if (defined('ABSPATH')) {
    echo "\n=== VERIFICACIÓN DE WORDPRESS ===\n";
    echo "WordPress detectado: " . get_bloginfo('version') . "\n";
    echo "Tema activo: " . get_template() . "\n";
} else {
    echo "\n⚠️  WordPress no detectado - Ejecutar desde WordPress\n";
}

echo "\n=== VERIFICACIÓN COMPLETADA ===\n";
echo "Tema Sueño Andino optimizado para PHP 8.2\n";
echo "Fecha: " . date('Y-m-d H:i:s') . "\n";
?>
