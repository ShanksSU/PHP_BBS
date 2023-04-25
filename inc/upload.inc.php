<?php 
function upload($save_path,$custom_upload_max_filesize,$key,$type=array('jpg','jpeg','gif','png')){
    $return_data=array();
    //獲取phpini設定檔裡面的upload_max_filesize值
    //$phpini=ini_get('upload_max_filesize');
    $phpini="200M";
    //獲取phpini設定檔裡面的upload_max_filesize值的單位
    $phpini_unit=strtoupper(substr($phpini,-1));
    //獲取phpini設定檔裡面的upload_max_filesize值的數位部分
    $phpini_number=substr($phpini,0,-1);
    //計算出轉換成位元組應該乘以的倍數
    $phpini_multiple=get_multiple($phpini_unit);
    //轉換成位元組
    $phpini_bytes=$phpini_number*$phpini_multiple;

    $custom_unit=strtoupper(substr($custom_upload_max_filesize,-1));
    $custom_number=substr($custom_upload_max_filesize,0,-1);
    $custom_multiple=get_multiple($custom_unit);
    $custom_bytes=$custom_number*$custom_multiple;

    if($custom_bytes>$phpini_bytes){
        $return_data['error']='傳入的$custom_upload_max_filesize大於PHP設定檔裡面的'.$phpini;
        $return_data['return']=false;
        return $return_data;
    }
    $arr_errors=array(
            1=>'上傳的文件超過了 php.ini中 upload_max_filesize 選項限制的值',
            2=>'上傳檔的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指定的值',
            3=>'檔只有部分被上傳',
            4=>'沒有檔被上傳',
            6=>'找不到暫存檔案夾',
            7=>'檔寫入失敗'
    );
    if(!isset($_FILES[$key]['error'])){
        $return_data['error']='由於未知原因導致，上傳失敗，請重試！';
        $return_data['return']=false;
        return $return_data;
    }
    if ($_FILES[$key]['error']!=0) {
        //$return_data['error']=$arr_errors[$_FILES['error']];
        $return_data['error']='由於未知原因導致，上傳失敗，請重試！';
        $return_data['return']=false;
        return $return_data;
    }
    if(!is_uploaded_file($_FILES[$key]['tmp_name'])){
        $return_data['error']='您上傳的檔不是通過 HTTP POST方式上傳的！';
        $return_data['return']=false;
        return $return_data;
    }
    if($_FILES[$key]['size']>$custom_bytes){
        $return_data['error']='上傳檔的大小超過了程式作者限定的'.$custom_upload_max_filesize;
        $return_data['return']=false;
        return $return_data;
    }
    $arr_filename=pathinfo($_FILES[$key]['name']);
    if(!isset($arr_filename['extension'])){
        $arr_filename['extension']='';
    }
    if(!in_array($arr_filename['extension'],$type)){
        $return_data['error']='上傳檔的尾碼名必須是'.implode(',',$type).'這其中的一個';
        $return_data['return']=false;
        return $return_data;
    }
    if(!file_exists($save_path)){
        if(!mkdir($save_path,0777,true)){
            $return_data['error']='上傳檔保存目錄創建失敗，請檢查許可權!';
            $return_data['return']=false;
            return $return_data;
        }
    }
    $new_filename=str_replace('.','',uniqid(mt_rand(100000,999999),true));
    if($arr_filename['extension']!=''){
        $new_filename.=".{$arr_filename['extension']}";
    }
    $save_path=rtrim($save_path,'/').'/';
    if(!move_uploaded_file($_FILES[$key]['tmp_name'],$save_path.$new_filename)){
        $return_data['error']='暫存檔案移動失敗，請檢查許可權!';
        $return_data['return']=false;
        return $return_data;
    }
    $return_data['save_path']=$save_path.$new_filename;
    $return_data['filename']=$new_filename;
    $return_data['return']=true;
    return $return_data;
}
function get_multiple($unit){
    switch ($unit){
        case 'K':
            $multiple=1024;
            return $multiple;
        case 'M':
            $multiple=1024*1024;
            return $multiple;
        case 'G':
            $multiple=1024*1024*1024;
            return $multiple;
        default:
            return false;
    }
}
?>


