<?php include "includes/header.php" ?>
<div class="kanji">
</div>
<div class="kanji-input">
	<input id="kanjiKey" type="hidden" name="key" />
	<div class="input-append">
		<input autofocus="autofocus" type="text" class="span2" id="appendedInputButtons" autocomplete="off"/>
		<button id="checkKanji" type="button" class="btn"><i class="icon-check"></i></button>
		<button type="button" id="helpKanji" rel="popover" class="btn" data-toggle="popover" data-placement="top" data-original-title="Romanji"><i class="icon-question-sign"></i></button>
	</div>
</div>
<div class="hiddenInfo">
	<div class="score">
	</div>
	<div class="alert" id="result">
		<strong>Correct!</strong>
	</div>
</div>
<?php include "includes/footer.php" ?>
