<?php 
    date_default_timezone_set('Asia/Taipei');//設定時區
    session_start();
    header('Content-type:text/html;charset=utf-8');
    define('ASD_HOST','localhost');
    define('ASD_USER','root');
    define('ASD_PASSWORD','');
    define('ASD_DATABASE','ntc_php');
    define('ASD_PORT',3306);

    //我們的專案（程式），在伺服器上的絕對路徑
    define('SA_PATH',dirname(dirname(__FILE__)));
    //我們的專案在web根目錄下面的位置（哪個目錄裡面）
    define('SUB_URL',str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\','/',SA_PATH)).'/');
?>
