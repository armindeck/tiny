<?php // Provided by Armindeck: https://github.com/armindeck/tiny

switch($slug){
  case '': case 'index': case 'home':
    echo view("layout", $data);
    break;
  case 'search':
    $data["s"] = secureString($_GET['s'] ?? '');
    echo view("search", $data);
    break;
  case 'login': case 'register': case 'forgot-password':
    echo view("auth", $data);
    break;
  case 'admin':
    $style = file_get_contents(dirIni("/assets/css/tiny-admin.css")) ?? '';
    echo view("admin", $data);
    break;
  default:
    echo view("error", $data);
    break;
}