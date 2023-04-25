<?php
    function getRandomImage($dir_path){
        if(!empty($dir_path)){
            $files = scandir($dir_path);
            $count = count($files);
            if($count > 2){
                $index = rand(2, ($count-1));
                $filename = $files[$index];
                return ''.$dir_path."/".$filename.'" alt="'.$filename.'';
            } else {
                return "目錄為空";
            }
        } else {
            return "請輸入圖片目錄的有效路徑！";
        }
    }
?>

<div class="bg">
    <div>
        <img src="<?php echo getRandomImage("image/bg/"); ?>">
    </div>

    <div>
        <img src="<?php echo getRandomImage("image/bg/"); ?>">
    </div>

    <div>
        <img src="<?php echo getRandomImage("image/bg/"); ?>">
    </div>

    <div>
        <img src="<?php echo getRandomImage("image/bg/"); ?>">
    </div>

    <div>
        <img src="<?php echo getRandomImage("image/bg/"); ?>">
    </div>
</div>