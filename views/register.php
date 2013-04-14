<?php include "includes/header.php" ?>
<h1>Register</h1>
<form class="form-horizontal" action="/kanadojo/?register" method="POST">
  <div class="control-group <?php if (isset($data['usernameError'])) echo 'error' ?>">
    <label class="control-label" for="inputUsername">Username</label>
    <div class="controls">
      <input class="span3" type="text" name="username" id="inputUsername" placeholder="Username" />
    </div>
  </div>
  <div class="control-group <?php if (isset($data['emailError'])) echo 'error' ?>">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="Email" name="email" id="inputEmail" placeholder="Email" />
    </div>
  </div>
  <div class="control-group <?php if (isset($data['passwordError'])) echo 'error' ?>">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password" />
    </div>
  </div>
  <div class="control-group <?php if (isset($data['confirmationError'])) echo 'error' ?>">
    <label class="control-label" for="inputConfirm">Confirmation</label>
    <div class="controls">
      <input type="password" name="confirmation" id="inputConfirm" placeholder="Confirmation" />
    </div>
  </div>
  <?php if (isset($data['errorMessage'])): ?>
    <p class="text-error"><?= $data['errorMessage'] ?></p>
  <?php endif ?>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Sign up</button>
    </div>
  </div>
</form>
<?php include "includes/footer.php" ?>
