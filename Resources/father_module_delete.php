<?php 
    include_once '../inc/config.inc.php';
    include_once '../inc/mysql.inc.php';
    $link=connect();
    //var_dump($_GET);
    $query="DELETE FROM ntc_father_module WHERE id={$_GET['id']}";
    execute($link, $query);
    //echo $_GET['module_name'];
    //echo $_GET['id'];
    if(mysqli_affected_rows($link)==true){
        $html=<<<EOT
            已刪除{$_GET['module_name']} {$_GET['id']}!!!
        EOT;
        echo $html;
    }
?>