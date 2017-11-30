<?php
// index.php
echo('<p>' . $_POST['text'] . '</p>');

?>


<form method='post' action='/2/'>
	<textarea name='text'>ここに何か入力してください</textarea>
	<input type='submit' value='送信'></input>
</form>
