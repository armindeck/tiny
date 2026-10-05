<!-- Tiny core v<?= ($core_version ?? "0.1.0") . "-" . ($core_state ?? "dev") ?> (Copyright © 2026 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/tiny -->
<!DOCTYPE html>
<html lang="<?= $lang ?? 'en' ?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= secureString(($post["title"] ?? "") . ' — ' . ($page_name ?? 'Tiny')) ?></title>
	<link rel="preload" href="<?= $base_url ?? "./" ?>assets/img/favicon.png" as="image">
	<link rel="icon" type="image/png" href="<?= $base_url ?? "./" ?>assets/img/favicon.png" sizes="128x128">
	<meta name="description" content="<?= secureString($post["fragment"] ?? "") ?>" />
	<meta property="og:title" content="<?= secureString($post["title"] ?? "") ?>" />
	<meta property="og:description" content="<?= secureString($post["fragment"] ?? "") ?>" />
	<meta property="og:url" content="<?= $url ?? "" ?>">
	<link rel="canonical" href="<?= $url ?? "" ?>">
	<meta property="og:image" content="<?= ($base_url ?? "./") . secureString($post["image"] ?? "") ?>" />
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="<?= $page_name ?? "" ?>" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?= secureString($post["title"] ?? "") ?>">
	<meta name="twitter:description" content="<?= secureString($post["fragment"] ?? "") ?>">
	<meta name="twitter:image" content="<?= ($base_url ?? "./") . secureString($post["image"] ?? "") ?>">
	<meta name="keywords" content="<?= secureString($post["tags"] ?? "") . ", " . ($page_name ?? "") . ", " . ($page_link ?? "") ?>">
  <style type="text/css">
    <?= $style ?? '' ?>
  </style>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-Regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-Bold.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-Italic.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $base_url ?? "./" ?>assets/fonts/JetBrainsMono-MediumItalic.woff2" as="font" type="font/woff2" crossorigin>
</head>

<body data-theme="<?= $theme ?? 'light' ?>">
  <input type="checkbox" class="check-container-nav" id="check-container-nav" hidden>
  <header class="header">
    <div class="">
      <a class="a-label-check-container-nav">
        <label for="check-container-nav" class="label-check-container-nav"></label>
      </a>
      <a href="?theme=<?= $theme_alternative ?? 'dark' ?>" title="<?= $translate->t('switch_theme') ?>"><?= $theme_icon ?? '🌑🌕' ?></a>
    </div>
    <div class="">
      <a href="<?= $base_url ?? './' ?>">⚡ <?= $page_name ?? 'Tiny' ?></a>
    </div>
    <nav>
      <a href="<?= $base_url ?? './' ?>">🏡 <?= $translate->t('home') ?></a>
      <a href="<?= $base_url ?? './' ?>blog">📚 <?= $translate->t('blog') ?></a>
    </nav>
  </header>
  <main class="container">
    <nav class="container-nav">
      <div class="container-nav--content">
        <strong>👤 <?= $translate->t('account') ?></strong>
        <ul>
          <?php if ($is_auth ?? false): ?>
            <?php if ($is_admin ?? false): ?>
              <li><a href="<?= $base_url ?? './' ?>admin">📊 <?= $translate->t('dashboard') ?></a></li>
            <?php endif; ?>
            <li><a href="<?= $base_url ?? './' ?>profile">👤 <?= $translate->t('profile') ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>settings">🛠 <?= $translate->t('settings') ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>logout">🚪 <?= $translate->t('logout') ?></a></li>
          <?php else: ?>
            <li><a href="<?= $base_url ?? './' ?>login">👤 <?= $translate->t('login') ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>register">👥 <?= $translate->t('register') ?></a></li>
          <?php endif; ?>
        </ul>
        <strong>🌐 <?= $translate->t('languages') ?></strong>
        <ul>
          <li><a href="?lang=en">🗣️ <?= $translate->t('english') ?></a></li>
          <li><a href="?lang=es">🗣️ <?= $translate->t('spanish') ?></a></li>
          <li><a href="?lang=ja">🗣️ <?= $translate->t('japanese') ?></a></li>
        </ul>
        <strong>🎨 <?= $translate->t('themes') ?></strong>
        <ul>
          <li><a href="?theme=light">🌕 <?= $translate->t('light') ?></a></li>
          <li><a href="?theme=dark">🌑 <?= $translate->t('dark') ?></a></li>
        </ul>
        <strong>🔗 <?= $translate->t('links') ?></strong>
        <ul>
          <li><a href="<?= $base_url ?? './' ?>">🏡 <?= $translate->t('home') ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>blog">📚 <?= $translate->t('blog') ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>about">🚜 <?= $translate->t('about') ?></a></li>
        </ul>
      </div>
    </nav>
    <div class="container-content">
      <?php if (($post["template"] ?? "") == "blog"): ?>
        <div class="container-blog">
          <div class="container-blog--thumbnail">
            <img src="<?= ($base_url ?? "./") . secureString($post["image"] ?? "") ?>" alt="<?= secureString($post["title"] ?? "") ?>" title="<?= secureString($post["title"] ?? "") ?>" loading="lazy">
          </div>
          <h1><?= secureString($post["title"] ?? "") ?></h1>
          <?= michelf\MarkdownExtra::defaultTransform(secureString($post["content"] ?? "")) ?>
          <hr>
          <small><i><?= $translate->t("published_on") ?>: <?= secureString($post["date_published"] ?? "") ?></i></small>
        </div>
      <?php endif; ?>
    </div>
    <aside class="aside">
      <div class="aside-content">
        <strong>📢 <?= $translate->t('announcements') ?></strong>
        <a href="#">
          <img src="https://dbproject.rf.gd/assets/img/min-daam.png" alt="ads" loading="lazy">
        </a>
        <strong>💘 <?= $translate->t('follow_us') ?></strong>
        <ul>
          <li><a target="_blank" href="https://github.com/armindeck">🔸 Github</a></li>
          <li><a target="_blank" href="https://dbproject.rf.gd">🔹 dbproject</a></li>
          <li><a target="_blank" href="https://facebook.com/tobix64">🔸 Facebook</a></li>
          <li><a target="_blank" href="https://youtube.com/@tobix64">🔹 Youtube</a></li>
        </ul>
      </div>
    </aside>
  </main>
  <footer class="footer">
    <small>&copy; <?= $page_year ?? 2026 ?> <a href="<?= $core_link ?? "" ?>"><?= $core_name ?? 'Tiny' ?></a></small>
    <small style="float: right;">v<?= ($core_version ?? "0.1.0") . "-" . ($core_state ?? "dev2") ?></small>
  </footer>
</body>

</html>