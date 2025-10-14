<?php
/**
 * Medidas de seguridad para Sueño Andino
 * 
 * @package Sueño Andino
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configuración de seguridad
 */
function sueno_andino_security_setup() {
    // Ocultar versión de WordPress
    remove_action('wp_head', 'wp_generator');
    
    // Deshabilitar XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');
    
    // Deshabilitar pingbacks
    add_filter('xmlrpc_methods', 'sueno_andino_remove_xmlrpc_pingback_ping');
    
    // Ocultar errores de login
    add_filter('login_errors', 'sueno_andino_hide_login_errors');
    
    // Limitar intentos de login
    add_action('wp_login_failed', 'sueno_andino_limit_login_attempts');
    
    // Deshabilitar editor de archivos
    if (!defined('DISALLOW_FILE_EDIT')) {
        define('DISALLOW_FILE_EDIT', true);
    }
    
    // Deshabilitar instalación de plugins desde admin
    if (!defined('DISALLOW_FILE_MODS')) {
        define('DISALLOW_FILE_MODS', true);
    }
    
    // Headers de seguridad
    add_action('send_headers', 'sueno_andino_security_headers');
    
    // Sanitizar datos de entrada
    add_filter('pre_comment_content', 'sueno_andino_sanitize_comment_content');
    
    // Validar uploads
    add_filter('wp_handle_upload_prefilter', 'sueno_andino_validate_upload');
    
    // Ocultar usuarios de la API REST
    add_filter('rest_endpoints', 'sueno_andino_remove_user_endpoints');
    
    // Deshabilitar información del servidor
    add_filter('rest_pre_serve_request', 'sueno_andino_disable_server_info');
}
add_action('init', 'sueno_andino_security_setup');

/**
 * Remover pingbacks de XML-RPC
 */
function sueno_andino_remove_xmlrpc_pingback_ping($methods) {
    unset($methods['pingback.ping']);
    return $methods;
}

/**
 * Ocultar errores de login
 */
function sueno_andino_hide_login_errors() {
    return 'Credenciales incorrectas.';
}

/**
 * Limitar intentos de login
 */
function sueno_andino_limit_login_attempts($username) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $attempts = get_transient('login_attempts_' . $ip);
    
    if ($attempts === false) {
        set_transient('login_attempts_' . $ip, 1, 15 * MINUTE_IN_SECONDS);
    } else {
        $attempts++;
        set_transient('login_attempts_' . $ip, $attempts, 15 * MINUTE_IN_SECONDS);
        
        if ($attempts >= 5) {
            wp_die('Demasiados intentos de login. Intenta de nuevo en 15 minutos.');
        }
    }
}

/**
 * Headers de seguridad
 */
function sueno_andino_security_headers() {
    // X-Frame-Options
    header('X-Frame-Options: SAMEORIGIN');
    
    // X-Content-Type-Options
    header('X-Content-Type-Options: nosniff');
    
    // X-XSS-Protection
    header('X-XSS-Protection: 1; mode=block');
    
    // Referrer-Policy
    header('Referrer-Policy: strict-origin-when-cross-origin');
    
    // Content-Security-Policy
    $csp = "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com https://fonts.googleapis.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; frame-src 'self' https://calendar.google.com;";
    header("Content-Security-Policy: $csp");
    
    // Permissions-Policy
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
}

/**
 * Sanitizar contenido de comentarios
 */
function sueno_andino_sanitize_comment_content($content) {
    // Remover scripts
    $content = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/mi', '', $content);
    
    // Remover iframes
    $content = preg_replace('/<iframe\b[^<]*(?:(?!<\/iframe>)<[^<]*)*<\/iframe>/mi', '', $content);
    
    // Remover objetos
    $content = preg_replace('/<object\b[^<]*(?:(?!<\/object>)<[^<]*)*<\/object>/mi', '', $content);
    
    // Remover embeds
    $content = preg_replace('/<embed\b[^<]*(?:(?!<\/embed>)<[^<]*)*<\/embed>/mi', '', $content);
    
    return $content;
}

/**
 * Validar uploads
 */
function sueno_andino_validate_upload($file) {
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt');
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($file_extension, $allowed_types)) {
        $file['error'] = 'Tipo de archivo no permitido.';
    }
    
    // Verificar tamaño máximo (5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        $file['error'] = 'El archivo es demasiado grande. Máximo 5MB.';
    }
    
    return $file;
}

/**
 * Remover endpoints de usuarios de la API REST
 */
function sueno_andino_remove_user_endpoints($endpoints) {
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
}

/**
 * Deshabilitar información del servidor
 */
function sueno_andino_disable_server_info($served, $result, $request, $server) {
    // Remover headers que revelan información del servidor
    header_remove('X-Powered-By');
    header_remove('Server');
    
    return $served;
}

/**
 * Ocultar versión de WordPress en feeds
 */
function sueno_andino_remove_wp_version_rss() {
    return '';
}
add_filter('the_generator', 'sueno_andino_remove_wp_version_rss');

/**
 * Deshabilitar acceso a archivos sensibles
 */
function sueno_andino_protect_sensitive_files() {
    $request_uri = $_SERVER['REQUEST_URI'];
    
    // Archivos a proteger
    $protected_files = array(
        'wp-config.php',
        '.htaccess',
        'readme.html',
        'license.txt',
        'wp-admin/install.php',
        'wp-admin/upgrade.php'
    );
    
    foreach ($protected_files as $file) {
        if (strpos($request_uri, $file) !== false) {
            wp_die('Acceso denegado.');
        }
    }
}
add_action('init', 'sueno_andino_protect_sensitive_files');

/**
 * Limpiar datos de usuario
 */
function sueno_andino_clean_user_data($user_id) {
    // Remover datos sensibles al eliminar usuario
    delete_user_meta($user_id, 'description');
    delete_user_meta($user_id, 'first_name');
    delete_user_meta($user_id, 'last_name');
}

/**
 * Validar nonces
 */
function sueno_andino_validate_nonce($nonce, $action) {
    if (!wp_verify_nonce($nonce, $action)) {
        wp_die('Token de seguridad inválido.');
    }
}

/**
 * Sanitizar datos de entrada
 */
function sueno_andino_sanitize_input($data) {
    if (is_array($data)) {
        return array_map('sueno_andino_sanitize_input', $data);
    }
    
    return sanitize_text_field($data);
}

/**
 * Escapar datos de salida
 */
function sueno_andino_escape_output($data) {
    if (is_array($data)) {
        return array_map('sueno_andino_escape_output', $data);
    }
    
    return esc_html($data);
}

/**
 * Log de actividades de seguridad
 */
function sueno_andino_security_log($message) {
    $log_file = WP_CONTENT_DIR . '/security.log';
    $timestamp = date('Y-m-d H:i:s');
    $log_entry = "[$timestamp] $message" . PHP_EOL;
    
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

/**
 * Monitorear intentos de login
 */
function sueno_andino_monitor_login_attempts($username, $user) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    sueno_andino_security_log("Login exitoso: $username desde $ip - $user_agent");
}
add_action('wp_login', 'sueno_andino_monitor_login_attempts', 10, 2);

/**
 * Monitorear intentos de login fallidos
 */
function sueno_andino_monitor_failed_login($username) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    sueno_andino_security_log("Login fallido: $username desde $ip - $user_agent");
}
add_action('wp_login_failed', 'sueno_andino_monitor_failed_login');

/**
 * Deshabilitar ejecución de PHP en uploads
 */
function sueno_andino_disable_php_uploads() {
    $upload_dir = wp_upload_dir();
    $htaccess_file = $upload_dir['basedir'] . '/.htaccess';
    
    if (!file_exists($htaccess_file)) {
        $htaccess_content = "Options -ExecCGI\nAddHandler cgi-script .php .pl .py .jsp .asp .sh .cgi\n";
        file_put_contents($htaccess_file, $htaccess_content);
    }
}
add_action('init', 'sueno_andino_disable_php_uploads');

/**
 * Validar referrer
 */
function sueno_andino_validate_referrer() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $referrer = $_SERVER['HTTP_REFERER'];
        $site_url = home_url();
        
        if (strpos($referrer, $site_url) === false && !wp_doing_ajax()) {
            // Log referrer sospechoso
            sueno_andino_security_log("Referrer sospechoso: $referrer");
        }
    }
}
add_action('init', 'sueno_andino_validate_referrer');
