<?php 
    include_once '../inc/config.inc.php';
    include_once '../inc/mysql.inc.php';
    include_once '../inc/tool.inc.php';
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        skip('son_module.php','error','id參數錯誤！');
    }
    $link=connect();
    $query="delete from ntc_son_module where id={$_GET['id']}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1){
        skip('son_module.php','ok','恭喜你刪除成功！');
    }else{
        skip('son_module.php','error','刪除失敗，請重試！');
    }
?>