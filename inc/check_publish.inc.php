<?php 
	if(empty($_POST['module_id']) || !is_numeric($_POST['module_id'])){
		skip('publish.php', 'error', '所屬版塊id不合法！');
	}
	$query="select * from ntc_son_module where id={$_POST['module_id']}";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)!=1){
		skip('publish.php', 'error', '所屬版塊不存在！');
	}
	if(empty($_POST['title'])){
		skip('publish.php', 'error', '標題不得為空！');
	}
	if(mb_strlen($_POST['title'])>255){
		skip('publish.php', 'error', '標題不得超過255個字符！');
	}
?>