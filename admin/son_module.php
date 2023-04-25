<?php 
    include_once '../inc/config.inc.php';
    include_once '../inc/mysql.inc.php';
    include_once '../inc/tool.inc.php';
    $link=connect();

    if(isset($_POST['submit'])){
        foreach ($_POST['sort'] as $key=>$val){
            if(!is_numeric($val) || !is_numeric($key)){
                skip('son_module.php','Error','排序參數錯誤！');
            }
            $query[]="update ntc_son_module set sort={$val} where id={$key}";
        }
        if(execute_multi($link,$query,$error)){
            skip('son_module.php','ok','排序修改成功！');
        }else{
            skip('son_module.php','Error',$error);
        }
    }
    $template['title']='子版塊列表頁';
    $template['css']=array('style/public.css');
?>

<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title">子版塊列表</div>
    <form method="post">
	<table class="list">
		<tr>
            <th>排序</th>	 	 	
            <th>模塊名稱</th>
            <th>ID</th>
			<th>所屬父版塊</th>
			<th>版主</th>
			<th>操作</th>
		</tr>
		<?php 
            $query="select ssm.id, ssm.sort, ssm.module_name, sfm.module_name father_module_name,ssm.member_id from ntc_son_module ssm,ntc_father_module sfm where ssm.father_module_id=sfm.id order by sfm.id";
            $result=execute($link,$query);
            while ($data=mysqli_fetch_assoc($result)){
                $url=urlencode("son_module_delete.php?id={$data['id']}");
                $return_url=urlencode($_SERVER['REQUEST_URI']);
                $message="你真的要刪除子版塊 {$data['module_name']} ID:{$data['id']}嗎？";
                $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
                
                $html=<<<A
                <tr>
                    <td>
                        <input class="sort" type="text" name="sort[{$data['id']}]" value="{$data['sort']}" />
                    </td>

                    <td>
                        {$data['module_name']}
                    </td>

                    <td>
                        {$data['id']}
                    </td>

                    <td>
                        {$data['father_module_name']}
                    </td>

                    <td>
                        {$data['member_id']}
                    <td>
                        <input type="button" value="訪問" onclick="location.href='#'" class="button visit">
                            &nbsp;&nbsp;
                        <input type="button" value="編輯" onclick="location.href='son_module_update.php?id={$data['id']}'" class="button edit">
                            &nbsp;&nbsp;
                        <input type="button" value="刪除" onclick="location.href='$delete_url'" class="button del">
                    </td>
                </tr>
A;
                echo $html;
            }
		?>
		
	</table>
        <input type="submit" name="submit" value="排序"  class="button edit">
    </form>
</div>
<?php include 'inc/footer.inc.php'?>