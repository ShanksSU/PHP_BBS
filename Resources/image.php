<?php
    function getRandomImage($dir_path = NULL){
        if(!empty($dir_path)){
            $files = scandir($dir_path);
            $count = count($files);
            if($count > 2){
                $index = rand(2, ($count-1));
                $filename = $files[$index];
                return ''.$dir_path."/".$filename.'" alt="'.$filename.'';
            } else {
                return "The directory is empty!";
            }
        } else {
            return "Please enter valid path to image directory!";
        }
    }
?>

<?php
    echo getRandomImage("../image/bg/");
?>
