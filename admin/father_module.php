<?php 
    include_once '../inc/config.inc.php';
    include_once '../inc/mysql.inc.php';
    include_once '../inc/tool.inc.php';
    $link=connect();
    if(isset($_POST['submit'])){
        foreach ($_POST['sort'] as $key=>$val){
            if(!is_numeric($val) || !is_numeric($key)){
                skip('father_module.php','Error','排序參數錯誤！');
            }
            $query[]="update ntc_father_module set sort={$val} where id={$key}";
        }
        if(execute_multi($link,$query,$error)){
            skip('father_module.php','ok','排序修改成功！');
        }else{
            skip('father_module.php','Error',$error);
        }
    }
    $template['title']='父板塊列表頁面';
    $template['css']=array('style/public.css');
?>

<?php include_once 'inc/header.inc.php';?>
<div id="main">
    <div class="title">父板塊列表</div>
    <form method="post">
    <table class="list">
        <tr>
            <th>排序</th>	 	 	
            <th>模塊名稱</th>
            <th>ID</th>
            <th>操作</th>
        </tr>

        <?php
            $query="select * from ntc_father_module";
            $result=execute($link, $query);
            while($data=mysqli_fetch_assoc($result)){
                $url=urlencode("father_module_delete.php?id={$data['id']}");
                $return_url=urlencode($_SERVER['REQUEST_URI']);
                $message="你真的要刪除父版塊 {$data['module_name']} ID:{$data['id']} 嗎？";
                $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";

                $html=<<<EOT
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
                            <input type="button" value="訪問" onclick="location.href='#'" class="button visit">
                                &nbsp;&nbsp;
                            <input type="button" value="編輯" onclick="location.href='father_module_update.php?id={$data['id']}'" class="button edit">
                                &nbsp;&nbsp;
                            <input type="button" value="刪除" onclick="location.href='$delete_url'" class="button del">
                        </td>
                    </tr>
EOT;
                echo $html;
                //var_dump($data);
            }
        ?>
    </table>
        <input type="submit" name="submit" value="排序"  class="button edit">
    </form>
</div>
<?php include_once 'inc/footer.inc.php';?>