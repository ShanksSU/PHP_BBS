<?php 
    if(mb_strlen($_POST['content'])<3){
        skip($_SERVER['REQUEST_URI'], 'error', '對不起回复內容不得少於3個字');
    }
?>