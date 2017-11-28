<?php
// index.php

// セッションの開始
session_start();

// flagの宣言
$flag = 'flag{cookie_is_yummy}';

// ユーザ名とパスワードが正しいかを調べる
$is_correct_auth_data = ($_POST['user'] === 'admin' && $_POST['pass'] === 'password');

// セッションと認証情報（ユーザ名＆パスワード）の
// どちらかが満たされているときを認証成功とする
if ($_SESSION['is_admin'] || $is_correct_auth_data){
	// 認証成功
	$_SESSION['is_admin'] = true;
	echo('ログインしています<br>');
	echo($flag);

} else {
	// 認証失敗 
	echo('ログインしていません<br>');
}

?>


<form method='post' action='/1/'>
	username: <input type='text' name='user' /><br>
	password: <input type='text' name='pass' /><br>
	<input type="submit" value="送信" />
</form>
