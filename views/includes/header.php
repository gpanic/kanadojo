<!doctype html>
<html>
  <head>
    <title><?= $data["title"] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <div class="navbar">
        <div class="navbar-inner">
          <a class="brand" href="/kanadojo/">Kana Dojo</a>
          <ul class="nav">
            <li <?php if ($data["page"] == 'kana') echo "class=\"active\""?>><a href="/kanadojo/?kana">The Kana</a></li>
            <li <?php if ($data["page"] == 'settings') echo "class=\"active\""?>><a href="/kanadojo/?settings">Settings</a></li>
          </ul>
          <div class="nav pull-right">
            <?php if (isset($_SESSION['id'])): ?>
            <li><a href="/kanadojo/?logout">Logout</a></li>
            <?php else: ?>
            <li><a href="/kanadojo/?login">Login</a></li>
            <?php endif ?>
          </div>
        </div>
      </div>
      <div class="content-container">
        <div class="content">
