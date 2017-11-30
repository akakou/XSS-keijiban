<?php
// index.php

// セッションの開始
session_start();

// flagの宣言
$flag = 'flag{xss_attack}';
$file_name = 'message.txt';

// ユーザ名とパスワードが正しいかを調べる
$is_correct_auth_data = ($_POST['user'] === 'admin' && $_POST['pass'] === 'password');

// セッションと認証情報（ユーザ名＆パスワード）の
// どちらかが満たされているときを認証成功とする
if ($_SESSION['is_admin'] || $is_correct_auth_data){
	// 認証成功
	$_SESSION['is_admin'] = true;
	$user = 'admin';

} else {
	// 認証失敗 
	$user = 'guest';
}

if (isset($_POST['message'])) {

	$file = fopen($file_name, 'a');

	@fwrite($file, '<p>' . $user . ' : ' . $_POST['message'] . '</p><br>');

	fclose($file);
}

?>
<h1>あなたの情報</h1>
あなたは<?php echo($user); ?>です。

<h1>投稿フォーム</h1>
	<form method='post' action='/3/'>
	<p>adminとして投稿したいときのみ、ユーザ名とパスワードを入力してください</p>
	<?php
		if(!$_SESSION['is_admin']){
			echo('ユーザ名: <br><input type=\'text\' name=\'user\' /><br>');
			echo('パスワード: <br><input type=\'text\' name=\'pass\' /><br>');
		}
	?>
	<p>投稿内容</p>
	<textarea name='message'></textarea><br>
	<input type='submit' value='送信' />
</form>

<h1>投稿一覧</h1>
<?php
	echo(file_get_contents($file_name));
?>
