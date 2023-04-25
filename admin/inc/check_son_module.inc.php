<?php 
    if(!is_numeric($_POST['father_module_id'])){
        skip('son_module_add.php','error','所屬父版塊不得為空！');
    }

    $query="select * from ntc_father_module where id={$_POST['father_module_id']}";
    $result=execute($link,$query);

    if(mysqli_num_rows($result)==0){
        skip('son_module_add.php','error','所屬父版塊不存在！');
    }

    if(empty($_POST['module_name'])){
        skip('son_module_add.php','error','子版塊叫不得為空！');
    }

    if(mb_strlen($_POST['module_name'])>66){
        skip('son_module_add.php','error','子版塊名稱多餘66個字符！');
    }

    $_POST=escape($link,$_POST);
    switch ($check_flag){
        case 'add':
            $query="select * from ntc_son_module where module_name='{$_POST['module_name']}'";
            break;

        case 'update':
            $query="select * from ntc_father_module where module_name='{$_POST['module_name']}' and id!={$_GET['id']}";
            break;
            
        default:
            skip('father_module_add.php','error','$check_flag參數錯誤！');
    }

    $result=execute($link,$query);
    if(mysqli_num_rows($result)){
        skip('son_module_add.php','error','這個子版塊已經有了！');
    }

    if(mb_strlen($_POST['info'])>255){
        skip('son_module_add.php','error','子版塊簡介不擴展於255個字符！');
    }

    if(!is_numeric($_POST['sort'])){
        skip('son_module_add.php','error','排名唯一是數字！');
    }

?>