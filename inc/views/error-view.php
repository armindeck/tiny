<!-- Tiny core v<?= ($core_version ?? "0.1.0") . "-" . ($core_state ?? "dev") ?> (Copyright © 2026 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/tiny -->
<!DOCTYPE html>
<html lang="<?= $lang ?? 'en' ?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= secureString(($post["title"] ?? "Error") . ' — ' . ($page_name ?? 'Tiny')) ?></title>
	<link rel="preload" href="<?= $base_url ?? "./" ?>assets/img/favicon.png" as="image">
	<link rel="icon" type="image/png" href="<?= $base_url ?? "./" ?>assets/img/favicon.png" sizes="128x128">
	<meta name="description" content="<?= secureString($post["fragment"] ?? "Error") ?>" />
	<meta property="og:title" content="<?= secureString($post["title"] ?? "Error") ?>" />
	<meta property="og:description" content="<?= secureString($post["fragment"] ?? "Error") ?>" />
	<meta property="og:url" content="<?= $url ?? "" ?>">
	<link rel="canonical" href="<?= $url ?? "" ?>">
	<meta property="og:image" content="<?= ($base_url ?? "./") . secureString($post["image"] ?? "assets/img/error.png") ?>" />
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="<?= $page_name ?? "" ?>" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?= secureString($post["title"] ?? "error") ?>">
	<meta name="twitter:description" content="<?= secureString($post["fragment"] ?? "error") ?>">
	<meta name="twitter:image" content="<?= ($base_url ?? "./") . secureString($post["image"] ?? "assets/img/error.png") ?>">
	<meta name="keywords" content="<?= secureString($post["tags"] ?? "error") . ", " . ($page_name ?? "") . ", " . ($page_link ?? "") ?>">
  <style type="text/css">
    <?= $style ?? '' ?>
  </style>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-Regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-Bold.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-Italic.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-MediumItalic.woff2" as="font" type="font/woff2" crossorigin>
</head>
<body>
  <div style="margin: auto; text-align: center;">
    <h1>Error</h1>
    <p>The page you are looking for does not exist.</p>
  </div>
</body>
</html>