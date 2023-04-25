<?php 
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';
	$template['title']='子版塊添加頁';
	$template['css']=array('style/public.css');
	$link=connect();
	if(isset($_POST['submit'])){
		//驗證用戶填寫的訊息
		$check_flag='add';
		include 'inc/check_son_module.inc.php';
		$query="insert into ntc_son_module(father_module_id,module_name,info,member_id,sort) values({$_POST['father_module_id']},'{$_POST['module_name']}','{$_POST['info']}',{$_POST['member_id']},{$_POST['sort']})";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip('son_module.php','ok','恭喜你，添加成功！');
		}else{
			skip('son_module_add.php','Error','對不起，添加失敗，請重試！');
		}
	}
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">添加子板塊</div>
	<form method="post">
		<table class="au">
			<tr>
				<td>所屬父版塊</td>
				<td>
					<select name="father_module_id">
						<option value="0">======請選擇一個父版塊======</option>
						<?php 
						$query="select * from ntc_father_module";
						$result_father=execute($link,$query);
						while ($data_father=mysqli_fetch_assoc($result_father)){
							echo "<option value='{$data_father['id']}'>{$data_father['module_name']}</option>";
						}
						?>
					</select>
				</td>
				<td>
					必須選擇一個所屬的父版塊
				</td>
			</tr>
			<tr>
				<td>版塊名稱</td>
				<td><input name="module_name" type="text" /></td>
				<td>
					版塊名稱不得為空，最大不得超過64個字符
				</td>
			</tr>
			<tr>
				<td>版塊簡介</td>
				<td>
					<textarea name="info"></textarea>
				</td>
				<td>
					簡介不得多於255個字符
				</td>
			</tr>
			<tr>
				<td>版主</td>
				<td>
					<select name="member_id">
						<option value="0">======請選擇一個會員作為版主======</option>
						
					</select>
				</td>
				<td>
					你可以在這邊選一個會員作為版主
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
		<input type="submit" name="submit" value="添加" class="button edit">
	</form>
</div>
<?php include 'inc/footer.inc.php'?>