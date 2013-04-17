<?php include "includes/header.php" ?>
<h1>Settings</h1>
<form class="form-horizontal" action="/kanadojo/?settings" method="POST">
	<div class="control-group">
    <label class="control-label" for="inputWeighted">Weighted Random</label>
    <div class="controls">
      <input <?php if ($data['settings']['weighted']) echo 'checked=\"checked\"' ?> type="checkbox" name="weighted" id="inputWeighted" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Change</button>
    </div>
  </div>
  <?php if(isset($data['updated'])): ?>
  <div class="alert alert-success">
  	<strong>Success!</strong> Your settings were successfully updated.
  </div>
	<?php endif ?>
</form>
<?php include "includes/footer.php" ?>
