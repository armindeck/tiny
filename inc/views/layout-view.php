<!-- <?= ($core_name ?? "tiny") . " core v" . ($core_version ?? "0.1.0") . "-" . ($core_state ?? "dev") . " (Copyright © 2026 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/tiny" ?> -->
<!DOCTYPE html>
<html lang="<?= $lang ?? 'en' ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= secureString(($post["title"] ?? "") . ' — ' . ($page_title ?? 'Tiny')) ?></title>
  <style type="text/css"><?= $style ?? '' ?></style>
</head>
<body data-theme="<?= $theme ?? 'light' ?>">
  <input type="checkbox" class="check-container-nav" id="check-container-nav" hidden>
  <header class="header">
    <div class="">
      <a class="a-label-check-container-nav">
        <label for="check-container-nav" class="label-check-container-nav"></label>
      </a>
      <a href="?theme=<?= $theme_alternative ?? 'dark' ?>" title="<?= $translate->get('switch_theme') ?>"><?= $theme_icon ?? '🌑🌕' ?></a>
    </div>
    <div class="">
      <a href="<?= $base_url ?? './' ?>">⚡ <?= $page_title ?? 'Tiny' ?></a>
    </div>
    <nav>
      <a href="<?= $base_url ?? './' ?>">🏡 <?= $translate->get('home') ?></a>
      <a href="<?= $base_url ?? './' ?>blog">📚 <?= $translate->get('blog') ?></a>
    </nav>
  </header>
  <main class="container">
    <nav class="container-nav">
      <div class="container-nav--content">
        <strong>👤 <?= $translate->get('account') ?></strong>
        <ul>
          <?php if ($is_auth ?? false): ?>
            <?php if ($is_admin ?? false): ?>
              <li><a href="<?= $base_url ?? './' ?>admin">📊 <?= $translate->get('dashboard') ?></a></li>
            <?php endif; ?>
            <li><a href="<?= $base_url ?? './' ?>profile">👤 <?= $translate->get('profile') ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>settings">🛠 <?= $translate->get('settings') ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>logout">🚪 <?= $translate->get('logout') ?></a></li>
          <?php else: ?>
            <li><a href="<?= $base_url ?? './' ?>login">👤 <?= $translate->get('login') ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>register">👥 <?= $translate->get('register') ?></a></li>
          <?php endif; ?>
        </ul>
        <strong>🌐 <?= $translate->get('languages') ?></strong>
        <ul>
          <li><a href="?lang=en">🗣️ <?= $translate->get('english') ?></a></li>
          <li><a href="?lang=es">🗣️ <?= $translate->get('spanish') ?></a></li>
          <li><a href="?lang=ja">🗣️ <?= $translate->get('japanese') ?></a></li>
        </ul>
        <strong>🎨 <?= $translate->get('themes') ?></strong>
        <ul>
          <li><a href="?theme=light">🌕 <?= $translate->get('light') ?></a></li>
          <li><a href="?theme=dark">🌑 <?= $translate->get('dark') ?></a></li>
        </ul>
        <strong>🔗 <?= $translate->get('links') ?></strong>
        <ul>
          <li><a href="<?= $base_url ?? './' ?>">🏡 <?= $translate->get('home') ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>blog">📚 <?= $translate->get('blog') ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>about">🚜 <?= $translate->get('about') ?></a></li>
        </ul>
      </div>
    </nav>
    <div class="container-content">
      <?php if(($post["template"] ?? "") == "blog"): ?>
        <div class="container-blog">
          <div class="container-blog--thumbnail">
            <img src="<?= secureString($post["image"] ?? "") ?>" alt="<?= secureString($post["title"] ?? "") ?>" title="<?= secureString($post["title"] ?? "") ?>">
          </div>
          <h1><?= secureString($post["title"] ?? "") ?></h1>
          <?= michelf\MarkdownExtra::defaultTransform(secureString($post["content"] ?? "")) ?>
        </div>
      <?php endif; ?>
    </div>
    <aside class="aside">
      <strong>📢 <?= $translate->get('announcements') ?></strong>
      <p><?= $translate->get('no_announcements') ?></p>
      <strong>👤 <?= $translate->get('account') ?></strong>
      <ul>
        <?php if ($is_auth ?? false): ?>
          <?php if ($is_admin ?? false): ?>
            <li><a href="<?= $base_url ?? './' ?>admin"><?= $translate->get('dashboard') ?></a></li>
          <?php endif; ?>
          <li><a href="<?= $base_url ?? './' ?>profile"><?= $translate->get('profile') ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>settings"><?= $translate->get('settings') ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>logout"><?= $translate->get('logout') ?></a></li>
        <?php else: ?>
          <li><a href="<?= $base_url ?? './' ?>login">👤 <?= $translate->get('login') ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>register">👥 <?= $translate->get('register') ?></a></li>
        <?php endif; ?>
      </ul>
      <strong>🌐 <?= $translate->get('languages') ?></strong>
      <ul>
        <li><a href="?lang=en">🗣️ <?= $translate->get('english') ?></a></li>
        <li><a href="?lang=es">🗣️ <?= $translate->get('spanish') ?></a></li>
        <li><a href="?lang=ja">🗣️ <?= $translate->get('japanese') ?></a></li>
      </ul>
      <strong>🎨 <?= $translate->get('themes') ?></strong>
      <ul>
        <li><a href="?theme=light">🌕 <?= $translate->get('light') ?></a></li>
        <li><a href="?theme=dark">🌑 <?= $translate->get('dark') ?></a></li>
      </ul>
      <strong>🔗 <?= $translate->get('links') ?></strong>
      <ul>
        <li><a href="<?= $base_url ?? './' ?>">🏡 <?= $translate->get('home') ?></a></li>
        <li><a href="<?= $base_url ?? './' ?>blog">📚 <?= $translate->get('blog') ?></a></li>
        <li><a href="<?= $base_url ?? './' ?>about">🚜 <?= $translate->get('about') ?></a></li>
      </ul>
    </aside>
  </main>
  <footer class="footer">
    <small>&copy; <?= $page_year ?? 2026 ?> <a href="<?= $core_link ?? "" ?>"><?= $core_name ?? 'Tiny' ?></a></small>
    <small style="float: right;">v<?= ($core_version ?? "0.1.0") . "-" . ($core_state ?? "dev2") ?></small>
  </footer>
</body>
</html>