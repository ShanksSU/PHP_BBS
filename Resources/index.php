<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CSS特殊效果</title>
        <link rel="stylesheet" type="text/css" href="windows.css" />
        <script type="text/javascript" src="windows.js"></script>
    </head>

    <body>
        <div id="dialog-face" class="none"></div>
        <div id="dialog" class="none">
            <div id="dialog-wrapper">
                <div class="dialog-header">
                    <span>彈窗效果</span>
                </div>
                <div class="dialog-content">
                    <p>123</p>
                </div>

                <div class="dialog-footer">
                    <button onclick="toggleDialog(false)">關閉</button>
                </div>
            </div>
        </div>

        <?php
            echo "<script type='text/javascript'>toggleDialog(1);</script>";
        ?>
    </body>
</html>