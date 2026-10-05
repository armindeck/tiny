<?php // It is part of https://github.com/armindeck/tiny

function dirIni(string $path = ''): string
{
  return __DIR__ . '/..' . $path;
}

function readJson(string $file): array
{
  $path_file = dirIni("/data/{$file}.json");
  if (!file_exists($path_file)) {
    return [];
  }

  $json = file_get_contents($path_file);
  return json_decode($json, true) ?? [];
}

function writeJson(string $file, array $data): bool
{
  $path_file = dirIni("/data/{$file}.json");
  $json = json_encode($data, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  return file_put_contents($path_file, $json) !== false;
}

function view(string $view, array $data = []): string
{
  $path_view = dirIni("/inc/views/{$view}-view.php");
  if (!file_exists($path_view)) {
    return 'View not found: ' . $view;
  }
  extract($data);
  ob_start();
  require $path_view;
  return ob_get_clean();
}

function secureString(string $string): string
{
  return trim(htmlspecialchars($string, ENT_QUOTES, 'UTF-8'));
}

function lang(string $key, string $lang = 'en', array $lang_data = []): string
{
  return $lang_data[$key][$lang] ?? $key;
}

function auth(): bool
{
  return true;
}

function isAdmin(): bool
{
  return true;
}

function route(string $string = ""): string
{
  $s = trim($string);

  // Si es una URL absoluta válida (http(s)://...) o protocolo relativo (//dominio), devolver tal cual
  if (filter_var($s, FILTER_VALIDATE_URL) || strpos($s, '//') === 0) {
    return $s;
  }

  return path_directory() . $string;
}


function path_directory(): string
{
  $route = trim(get_slug(), "/");
  if ($route === "") {
    return "./";
  }

  // eliminar segmentos vacíos (por dobles slashes) y contar profundidad
  $segments = array_values(array_filter(explode("/", $route), function ($s) {
    return $s !== "";
  }));

  $count = count($segments);

  // si sólo hay un segmento (ej. "page") seguimos en ./, si hay más, subimos niveles
  if ($count <= 1) {
    return "./";
  }

  return str_repeat("../", $count - 1);
}

function get_slug(): string { return secureString($_GET["slug"] ?? ""); }