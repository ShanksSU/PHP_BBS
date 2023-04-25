<?php 
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';

	if(isset($_POST['submit'])){
		$link=connect();
		//驗證用戶填寫的信息
		$check_flag='add';
		include 'inc/check_father_module.inc.php';
		$query="insert into ntc_father_module(module_name,sort) values('{$_POST['module_name']}',{$_POST['sort']})";
		execute($link, $query);
		if(mysqli_affected_rows($link)==1){
			skip('father_module.php','ok','恭喜你，添加成功！');
		}else{
			skip('faher_module_add.php','Error','對不起，添加失敗，請重試！');
		}
	}

	$template['title']='添加父版塊';
	$template['css']=array('style/public.css','style/father_module_add.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">添加父版塊</div>
	<form method="post">
		<table class="au">
			<tr>
				<td>版塊名稱</td>
				<td><input name="module_name" type="text" required></td>
				<td>
                    版塊名稱不得為空, 最大不得超過64個字符
				</td>
			</tr>

			<tr>
				<td>排序</td>
				<td><input name="sort" value="0" type="text" /></td>
				<td>
                    填寫一個數字即可
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="添加"  class="button edit">
	</form>
</div>
<?php include 'inc/footer.inc.php'?>
