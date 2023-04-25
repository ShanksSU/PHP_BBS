<?php
    function vcode($width=120, $height=40, $fontSize=20, $countElement=5, $countPixel=100, $countLine=4){
        header('Content-type: image/jpeg');
        // $width=120;
        // $height=40;
        // $fontSize=14;
        // $countElement=5;
        // $countPixel=100;
        // $countLine=4;
        $element=array(
                        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
                        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w', 'x', 'y', 'z',
                        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V','w', 'x', 'y', 'z',
                    );
        
        //創建圖片
        $img=imagecreatetruecolor($width, $height);

        //線顏色
        $colorline=imagecolorallocate($img, rand(100, 200), rand(100, 200), rand(200, 255));

        //圖片底色
        $colorBg=imagecolorallocate($img, rand(150, 255), rand(150, 255), rand(150, 255));

        //矩形(空心/邊框)顏色
        $colorBorder=imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));

        //文字顏色
        $colorString=imagecolorallocate($img, rand(10, 100), rand(10, 100), rand(10, 100));

        //填充顏色
        imagefill($img, 0, 0,$colorBg);

        //畫一個矩形(空心/邊框)
        imagerectangle($img, 0, 0, $width-1, $height-1, $colorBorder);

        //增加文字
        $outputstring='';
        for($i=0; $i<$countElement; $i++){
            $outputstring .= $element[rand(0, count($element)-1)];
        }

        //輸出 點
        for($i=0; $i<$countPixel; $i++){
            imagesetpixel($img, rand(0, $width-1), rand(0, $height-1), imagecolorallocate($img, rand(100, 200), rand(100, 200), rand(200, 255)));
        }

        //輸出 線
        for($i=0; $i<$countLine; $i++){
            imageline($img, rand(0, $width/2), rand(0, $height), rand($width/2, $width), rand(0, $height), $colorline);
        }
        
        //輸出 文字
        // imagestring($img, 5, 0, 0, 'dada', $colorString);
        imagettftext($img, $fontSize, rand(-5, 5), rand(10, 15), rand(25, 35), $colorString, 'E:/wamp/www/PHPSQL/font/zh-cn.ttf', $outputstring);
        
        //驗證碼輸出
        imagejpeg($img);
        imagedestroy($img);
        return $outputstring;
    }
?>