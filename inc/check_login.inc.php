<?php 
	if(empty($_POST['name'])){
		skip('login.php', 'error', '用戶名不得為空！');
	}
	if(mb_strlen($_POST['name'])>32){
		skip('login.php', 'error', '用戶名長度不要超過32個字符！');
	}
	if(empty($_POST['pw'])){
		skip('login.php', 'error', '密碼不得為空！');
	}
	if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
		skip('login.php', 'error','驗證碼輸入錯誤！');
	}
	// if(empty($_POST['time']) || is_numeric($_POST['time']) || $_POST['time']>2592000){
	// 	$_POST['time']=2592000;
	// }
?>