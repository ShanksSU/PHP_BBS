<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $template['title'] ?></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <!-- <link rel="stylesheet" type="text/css" href="style/public.css" />
        <link rel="stylesheet" type="text/css" href="style/register.css" /> -->
        <?php 
            foreach ($template['css'] as $val){
                echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
            }
        ?>
    </head>

    <body>
        <div class="header_wrap">
            <div id="header" class="auto">
                <div class="logo">NTC</div>
                <div class="nav">
                    <a class="hover" href="index.php">首頁</a>
                </div>
                <!-- <div class="serarch">
                    <form>
                        <input class="keyword" type="text" name="keyword" placeholder="搜索其實很簡單" />
                        <input class="submit" type="submit" name="submit" value="" />
                    </form>
                </div> -->
                <div class="login">
                    <?php 

                    if(isset($member_id)&&$member_id ){
                        $str=<<<A
                        <a href="member.php?id={$member_id}" target="_blank">您好 {$_COOKIE['ntc']['name']}</a> 
                        <a href="logout.php">登出</a>
A;
                        echo $str;		
                    }else{
                        $str=<<<A
                            <a href="./login.php">登入</a>&nbsp;
                            <a href="./register.php">註冊</a>
A;
                        echo $str;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div style="margin-top:55px;"></div>

        <!-- is_login($link) -->