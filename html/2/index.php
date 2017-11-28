<?php
// index.php
echo('<p>' . $_POST['text'] . '</p>');

?>


<form method='post' action='/2/'>
	<textarea name='text' rows='4' cols='40'></textarea>
	<input type='submit' value='送信'></input>
</form>
