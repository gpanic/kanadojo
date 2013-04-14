<?php include "includes/header.php" ?>
<h1>Log in</h1>
<form class="form-horizontal" action="/kanadojo/?login" method="POST">
  <div class="control-group <?php if (isset($data['usernameError'])) echo 'error' ?>">
    <label class="control-label" for="inputUsername">Username</label>
    <div class="controls">
      <input type="text" name="username" id="inputUsername" placeholder="Username" />
    </div>
  </div>
 <div class="control-group <?php if (isset($data['passwordError'])) echo 'error' ?>">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password" />
    </div>
  </div>
  <?php if (isset($data['errorMessage'])): ?>
    <p class="text-error"><?= $data['errorMessage'] ?></p>
  <?php endif ?>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Sign in</button>
      or <a href="/kanadojo?register">register.</a>
    </div>
  </div>
</form>
<?php include "includes/footer.php" ?>
