<?php 
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';
	$template['title']='父版塊-修改';
	$template['css']=array('style/public.css');

	$link=connect();

	if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
		skip('father_module.php','error','id參數錯誤！');
	}

	$query="select * from ntc_father_module where id={$_GET['id']}";
	$result=execute($link,$query);
	$data=mysqli_fetch_assoc($result);
	if(!mysqli_num_rows($result)){
		skip('father_module.php','error','這條版塊信息不存在！');
	}

	if(isset($_POST['submit'])){
		//驗證
		$check_flag='update';
		include 'inc/check_father_module.inc.php';
		$query="update ntc_father_module set module_name='{$_POST['module_name']}',sort={$_POST['sort']} where id={$_GET['id']}";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip('father_module.php','ok','修改成功！');
		}else{
			skip('father_module.php','error','修改失敗,請重試！');
		}
	}
	
?>

<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">修改父版塊 - <?php echo $data['module_name']?></div>
	<form method="post">
		<table class="au">
			<tr>
				<td>版塊名稱</td>
				<td><input name="module_name" value="<?php echo $data['module_name']?>" type="text" /></td>
				<td>
					版塊名稱不得為空，最大不得超過64個字符
				</td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input name="sort" value="<?php echo $data['sort']?>" type="text" /></td>
				<td>
					填寫一個數據即可
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="修改"  class="button edit">
	</form>
</div>
<?php include 'inc/footer.inc.php'?>