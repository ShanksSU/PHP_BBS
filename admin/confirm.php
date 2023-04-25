<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8" />
            <title>確認頁面</title>
            <meta name="keywords" content="確認頁面" />
            <meta name="description" content="確認頁面" />
            <link rel="stylesheet" type="text/css" href="style/remind.css" />
            <link rel="stylesheet" type="text/css" href="style/confirm.css" />
            <link rel="stylesheet" type="text/css" href="style/father_module_delete.css" />
        </head>

    <body>
        <div class="box">
            <div class="left"></div>
            <div class="right">
                <h4><?php echo $_GET['message']?></h4>
                    <input type="submit" class="submit" onclick="location.href='<?php echo $_GET['url']?>'" value="確定">
                    <input type="submit" class="submit" onclick="location.href='<?php echo $_GET['return_url']?>'" value="取消">
            </div>
        </div>
    </body>
</html>