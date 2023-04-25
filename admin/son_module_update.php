<?php 
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';
	$template['title']='子版塊修改頁';
	$template['css']=array('style/public.css');
	$link=connect();
	if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
		skip('son_module.php','Error','id參數錯誤！');
	}
	$query="select * from ntc_son_module where id={$_GET['id']}";
	$result=execute($link,$query);
	if(!mysqli_num_rows($result)){
		skip('son_module.php','Error','這條子版塊信息不存在！');
	}
	$data=mysqli_fetch_assoc($result);
	if(isset($_POST['submit'])){
		//驗證
		$check_flag='update';
		include 'inc/check_son_module.inc.php';
		$query="update ntc_son_module set father_module_id={$_POST['father_module_id']},module_name='{$_POST['module_name']}',info='{$_POST['info']}',member_id={$_POST['member_id']},sort={$_POST['sort']} where id={$_GET['id']}";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip('son_module.php','ok','修改成功！');
		}else{
			skip('son_module.php','Error','修改失敗,請重試！');
		}
	}
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">修改子版塊 - <?php echo $data['module_name']?></div>
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
								if($data['father_module_id']==$data_father['id']){
									echo "<option selected='selected' value='{$data_father['id']}'>{$data_father['module_name']}</option>";
								}else{
									echo "<option value='{$data_father['id']}'>{$data_father['module_name']}</option>";
								}
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
				<td><input name="module_name" value="<?php echo $data['module_name']?>" type="text" /></td>
				<td>
                    版塊名稱不得為空，最大不得超過64個字符
				</td>
			</tr>
			<tr>
				<td>版塊簡介</td>
				<td>
					<textarea name="info"><?php echo $data['info']?></textarea>
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
				<td><input name="sort"  value="<?php echo $data['sort']?>" type="text" /></td>
				<td>
                    填寫一個數字即可
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="修改"  class="button edit">
	</form>
</div>
<?php include 'inc/footer.inc.php'?>