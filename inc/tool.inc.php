<?php 
    function skip($url, $pic, $message){
        $html=<<<A01
                <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="refresh" content="3; URL={$url}" />
                    <link rel="stylesheet" type="text/css" href="style/windows.css" />
                    <script type="text/javascript" src="js/windows.js"></script>
                </head>

                <body>
                    <div id="dialog-face" class="none"></div>
                    <div id="dialog" class="none">
                        <div id="dialog-wrapper">
                            <div class="dialog-header">
                                <span>$pic</span>
                            </div>
                            
                            <div class="dialog-content">
                                <p>$message</p>
                                <p>本網頁將會自動跳轉<p>
                            </div>

                            <div class="dialog-footer">
                                <button onclick="toggleDialog(false)">關閉</button>
                            </div>
                        </div>
                    </div>  
                </body>
            </html>
A01;
        echo $html;
        echo "<script type='text/javascript'>toggleDialog(true);</script>";
        exit();
    }

    function is_login($link){
        if(isset($_COOKIE['ntc']['name']) && isset($_COOKIE['ntc']['pw'])){
            $query="select * from ntc_member where name='{$_COOKIE['ntc']['name']}' and sha1(pw)='{$_COOKIE['ntc']['pw']}'";
            $result=execute($link,$query);
            if(mysqli_num_rows($result)==1){
                $data=mysqli_fetch_assoc($result);
                return $data['id'];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    function check_user($member_id,$content_member_id){
        if($member_id==$content_member_id){
            return true;
        }else{
            return false;
        }
    }
?>