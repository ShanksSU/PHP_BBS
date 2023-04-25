<?php
    $_POST=escape($link,$_POST);
    $query="select * from ntc_member where name='{$_POST['name']}'";
    $result=execute($link, $query);
    if(empty($_POST['name'])){
        skip('register.php', 'error', '用戶名不得為空！');
    }
    else if(mb_strlen($_POST['name'])>32){
        skip('register.php', 'error', '用戶名長度不要超過32個字符！');
    }
    else if(mb_strlen($_POST['pw'])<6){
        skip('register.php', 'error','密碼不得少於6位！');
    }
    else if($_POST['pw']!=$_POST['confirm_pw']){
        skip('register.php', 'error','兩次密碼輸入不一致！');
    }
    else if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
        skip('register.php', 'error','驗證碼輸入錯誤！');
    }
    else if(mysqli_num_rows($result)){
        skip('register.php', 'error', '這個用戶名已經被別人註冊了！');
    }
?>