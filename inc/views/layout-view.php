<!-- <?= ($core_name ?? "tiny") . " core v" . ($core_version ?? "0.1.0") . "-" . ($core_state ?? "dev") . " (Copyright © 2026 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/tiny" ?> -->
<!DOCTYPE html>
<html lang="<?= $lang ?? 'en' ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?? 'Tiny' ?></title>
  <style type="text/css"><?= $style ?? '' ?></style>
</head>
<body data-theme="<?= $theme ?? 'light' ?>">
  <input type="checkbox" class="check-container-nav" id="check-container-nav" hidden>
  <header class="header">
    <div class="">
      <a class="a-label-check-container-nav">
        <label for="check-container-nav" class="label-check-container-nav"></label>
      </a>
      <a href="?theme=<?= $theme_alternative ?? 'dark' ?>" title="<?= lang('switch_theme', $lang, $lang_data) ?>"><?= $theme_icon ?? '🌑🌕' ?></a>
    </div>
    <div class="">
      <a href="<?= $base_url ?? './' ?>">⚡ <?= $page_title ?? 'Tiny' ?></a>
    </div>
    <nav>
      <a href="<?= $base_url ?? './' ?>">🏡 <?= lang('home', $lang, $lang_data) ?></a>
      <a href="<?= $base_url ?? './' ?>blog">📚 <?= lang('blog', $lang, $lang_data) ?></a>
    </nav>
  </header>
  <main class="container">
    <nav class="container-nav">
      <div class="container-nav--content">
        <strong>👤 <?= lang('account', $lang, $lang_data) ?></strong>
        <ul>
          <?php if ($is_auth ?? false): ?>
            <?php if ($is_admin ?? false): ?>
              <li><a href="<?= $base_url ?? './' ?>admin">📊 <?= lang('dashboard', $lang, $lang_data) ?></a></li>
            <?php endif; ?>
            <li><a href="<?= $base_url ?? './' ?>profile">👤 <?= lang('profile', $lang, $lang_data) ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>settings">🛠 <?= lang('settings', $lang, $lang_data) ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>logout">🚪 <?= lang('logout', $lang, $lang_data) ?></a></li>
          <?php else: ?>
            <li><a href="<?= $base_url ?? './' ?>login">👤 <?= lang('login', $lang, $lang_data) ?></a></li>
            <li><a href="<?= $base_url ?? './' ?>register">👥 <?= lang('register', $lang, $lang_data) ?></a></li>
          <?php endif; ?>
        </ul>
        <strong>🌐 <?= lang('languages', $lang, $lang_data) ?></strong>
        <ul>
          <li><a href="?lang=en">🗣️ <?= lang('english', $lang, $lang_data) ?></a></li>
          <li><a href="?lang=es">🗣️ <?= lang('spanish', $lang, $lang_data) ?></a></li>
          <li><a href="?lang=ja">🗣️ <?= lang('japanese', $lang, $lang_data) ?></a></li>
        </ul>
        <strong>🎨 <?= lang('themes', $lang, $lang_data) ?></strong>
        <ul>
          <li><a href="?theme=light">🌕 <?= lang('light', $lang, $lang_data) ?></a></li>
          <li><a href="?theme=dark">🌑 <?= lang('dark', $lang, $lang_data) ?></a></li>
        </ul>
        <strong>🔗 <?= lang('links', $lang, $lang_data) ?></strong>
        <ul>
          <li><a href="<?= $base_url ?? './' ?>">🏡 <?= lang('home', $lang, $lang_data) ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>blog">📚 <?= lang('blog', $lang, $lang_data) ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>about">🚜 <?= lang('about', $lang, $lang_data) ?></a></li>
        </ul>
      </div>
    </nav>
    <div class="container-content">
      <div class="container--main">
        <div class="thumbnail">
          <img src="<?= secureString($post["image"] ?? "") ?>" alt="<?= secureString($post["title"] ?? "") ?>" title="<?= secureString($post["title"] ?? "") ?>">
        </div>
        <?= michelf\MarkdownExtra::defaultTransform(secureString($post["content"] ?? "")) ?>
        <h1>Lorem ipsum dolor, sit amet consectetur adipisicing elit</h1>
        <?= $slug ?>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam facilis quas, nulla minus deserunt laboriosam. Nulla rem sint officia nihil. Illum, at. Atque, commodi! Soluta similique quia autem commodi quos.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime necessitatibus accusantium voluptate ipsam. Nobis adipisci perferendis molestiae praesentium minus at pariatur et placeat hic libero ex, quis laudantium quisquam quibusdam.</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus dolore ipsum dolorem est, nemo ipsam? Animi eum aspernatur corrupti numquam repellendus aut adipisci qui repudiandae, id doloribus dolorem nihil vero.</p>
        <h2>Ipsum dolor sit amet consectetur</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima suscipit dicta ipsa quam officiis accusantium quisquam alias saepe assumenda ea? Dolore, laboriosam. Fugiat aliquid, recusandae doloribus magnam molestias nulla nesciunt?</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam perspiciatis, repudiandae minima eius earum omnis reiciendis dolores illum voluptatum? Perspiciatis consequatur blanditiis nam hic aliquid quod sunt amet quisquam quibusdam.</p>
        <ul>
          <li>lorem 1</li>
          <li>lorem 2</li>
          <li>lorem 3</li>
          <li>lorem 4</li>
        </ul>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt deserunt odit quidem quod architecto eum, eos odio aperiam temporibus doloremque <a>reiciendis</a> nesciunt saepe eveniet, expedita voluptatibus molestias debitis, ab eligendi.</p>
      </div>
    </div>
    <aside class="aside">
      <strong>📢 <?= lang('announcements', $lang, $lang_data) ?></strong>
      <p><?= lang('no_announcements', $lang, $lang_data) ?></p>
      <strong>👤 <?= lang('account', $lang, $lang_data) ?></strong>
      <ul>
        <?php if ($is_auth ?? false): ?>
          <?php if ($is_admin ?? false): ?>
            <li><a href="<?= $base_url ?? './' ?>admin"><?= lang('dashboard', $lang, $lang_data) ?></a></li>
          <?php endif; ?>
          <li><a href="<?= $base_url ?? './' ?>profile"><?= lang('profile', $lang, $lang_data) ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>settings"><?= lang('settings', $lang, $lang_data) ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>logout"><?= lang('logout', $lang, $lang_data) ?></a></li>
        <?php else: ?>
          <li><a href="<?= $base_url ?? './' ?>login">👤 <?= lang('login', $lang, $lang_data) ?></a></li>
          <li><a href="<?= $base_url ?? './' ?>register">👥 <?= lang('register', $lang, $lang_data) ?></a></li>
        <?php endif; ?>
      </ul>
      <strong>🌐 <?= lang('languages', $lang, $lang_data) ?></strong>
      <ul>
        <li><a href="?lang=en">🗣️ <?= lang('english', $lang, $lang_data) ?></a></li>
        <li><a href="?lang=es">🗣️ <?= lang('spanish', $lang, $lang_data) ?></a></li>
        <li><a href="?lang=ja">🗣️ <?= lang('japanese', $lang, $lang_data) ?></a></li>
      </ul>
      <strong>🎨 <?= lang('themes', $lang, $lang_data) ?></strong>
      <ul>
        <li><a href="?theme=light">🌕 <?= lang('light', $lang, $lang_data) ?></a></li>
        <li><a href="?theme=dark">🌑 <?= lang('dark', $lang, $lang_data) ?></a></li>
      </ul>
      <strong>🔗 <?= lang('links', $lang, $lang_data) ?></strong>
      <ul>
        <li><a href="<?= $base_url ?? './' ?>">🏡 <?= lang('home', $lang, $lang_data) ?></a></li>
        <li><a href="<?= $base_url ?? './' ?>blog">📚 <?= lang('blog', $lang, $lang_data) ?></a></li>
        <li><a href="<?= $base_url ?? './' ?>about">🚜 <?= lang('about', $lang, $lang_data) ?></a></li>
      </ul>
    </aside>
  </main>
  <footer class="footer">
    <small>&copy; <?= $page_year ?? 2026 ?> <a href="<?= $core_link ?? "" ?>"><?= $core_name ?? 'Tiny' ?></a></small>
    <small style="float: right;">v<?= ($core_version ?? "0.1.0") . "-" . ($core_state ?? "dev2") ?></small>
  </footer>
</body>
</html>