<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $template['title'] ?></title>
        <meta name="keywords" content="後台界面" />
        <meta name="description" content="後台界面" />
        
        <?php 
            foreach($template['css'] as $val){
                echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
            }
        ?>
    </head>

    <body>
        <div id="top">
            <div class="logo">
                管理中心
            </div>

            <ul class="nav">
                <li><a href="http://www.sifangku.com" target="_blank">安安</a></li>
                <li><a href="http://www.sifangku.com" target="_blank">安安</a></li>
            </ul>
            
            <div class="login_info">
                <a href="../index.php" style="color:#fff;">首頁</a>&nbsp;|&nbsp;
                管理員：admin <a href="#">[登出]</a>
            </div>
        </div>

        <div id="sidebar">
            <ul>
                <li>
                    <div class="small_title">系統</div>
                    <ul class="child">
                        <li><a class="current" href="#">系統訊息</a></li>
                        <li><a href="#">管理員</a></li>
                        <li><a href="#">添加管理員</a></li>
                        <li><a href="#">網站設定</a></li>
                    </ul>
                </li>

                <li><!--  class="current" -->
                    <div class="small_title">內容管理</div>
                    <ul class="child">
                        <li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module.php'){echo 'class="current"';}?> href="./father_module.php">父模塊列表</a></li>
                        <li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module_add.php'){echo 'class="current"';}?> href="./father_module_add.php">添加父板塊</a></li>
                        <?php 
                            if(basename($_SERVER['SCRIPT_NAME'])=='father_module_update.php'){
                                echo '<li><a class="current">編輯父版塊</a></li>';
                            }
					    ?>
                        <li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='son_module.php'){echo 'class="current"';}?> href="son_module.php">子板塊列表</a></li>
                        <li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='son_module_add.php'){echo 'class="current"';}?> href="son_module_add.php">添加子板塊</a></li>
                        <?php 
                            if(basename($_SERVER['SCRIPT_NAME'])=='son_module_update.php'){
                                echo '<li><a class="current">编辑子版块</a></li>';
                            }
                        ?>
                        <li><a href="#">貼文管理</a></li>
                    </ul>
                </li>

                <li>
                    <div class="small_title">用戶管理</div>
                    <ul class="child">
                        <li><a href="#">用戶列表</a></li>
                    </ul>
                </li>
            </ul>
        </div>