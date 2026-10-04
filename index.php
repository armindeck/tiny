<?php // Provided by Armindeck: https://github.com/armindeck/tiny

use inc\Translate;

session_start([
  "cookie_secure" => true, // Solo HTTPS
  "cookie_httponly" => true, // No accesible desde JS
  "cookie_samesite" => "lax", // Protección CSRF
  "use_strict_mode" => true // Evita session fixation
]);

require_once __DIR__.'/inc/function.php';
require_once __DIR__.'/inc/model.php';
require_once __DIR__.'/inc/lib/Markdown.php';
require_once __DIR__.'/inc/lib/MarkdownExtra.php';

$slug = secureString($_GET['slug'] ?? 'home');
$core = readJson("core");
$config = readJson("config");
$lang = secureString($_GET['lang'] ?? $config['page_lang'] ?? 'en');

date_default_timezone_set($config["page_timezone"] ?? "America/Bogota");
error_reporting($config["page_debug"] ?? false);

$translate = new Translate($lang, readJson("lang"));
$lang_data = readJson("lang");
$posts = readJson("posts");
$users = readJson("users");

$style = file_get_contents(dirIni("/assets/css/tiny.css")) ?? '';
$theme = secureString($_GET['theme'] ?? 'light');
$theme_alternative = $theme === "light" ? "dark" : "light";
$theme_icon = $theme === "light" ? "🌑" : "🌕";

$data = array_merge($core, $config, $lang_data, [
  "post" => $posts[0],
  "slug" => $slug,
  "style" => $style,
  "theme" => $theme,
  "lang" => $lang,
  "translate" => $translate,
  "theme_alternative" => $theme_alternative,
  "theme_icon" => $theme_icon,
  "base_url" => './',
  "lang_data" => $lang_data,
  "is_auth" => true, //auth()
  "is_admin" => true, //isAdmin()
]);

require_once __DIR__.'/inc/web.php';