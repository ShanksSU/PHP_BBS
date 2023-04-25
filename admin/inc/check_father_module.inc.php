<?php 
	if(empty($_POST['module_name'])){	//名稱為空
		skip('father_module_add.php','error','版塊名稱不得為空！');
	}

	if(mb_strlen($_POST['module_name'])>64){	//超過64位字符
		skip('father_module_add.php','error','版塊名稱不得有64個字符！');
	}

	if(!is_numeric($_POST['sort'])){	//輸入數字以外之值
		skip('father_module_add.php','error','排名只能是數字！');
	}

	$_POST=escape($link, $_POST);
	switch ($check_flag){
		case 'add':
			$query="select * from ntc_father_module where module_name='{$_POST['module_name']}'";
			break;

		case 'update':
			$query="select * from ntc_father_module where module_name='{$_POST['module_name']}' and id!={$_GET['id']}";
			break;
			
		default:
			skip('father_module_add.php','error','$check_flag參數錯誤！');
	}

	$result=execute($link,$query);
	if(mysqli_num_rows($result)){
		skip('father_module_add.php','error','這個版塊已經有了！');
	}
?>