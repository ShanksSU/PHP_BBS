<?php 
    include_once 'inc/config.inc.php';
    include_once 'inc/mysql.inc.php';
    if(!isset($_GET['message']) || !isset($_GET['url']) || !isset($_GET['return_url'])){
        exit();
    }
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
        <meta charset="utf-8" />
        <title>確認頁面</title>
        <meta name="keywords" content="確認頁面" />
        <meta name="description" content="確認頁面" />
		<link rel="stylesheet" type="text/css" href="admin/style/remind.css" />
        <link rel="stylesheet" type="text/css" href="admin/style/father_module_delete.css" />
	</head>

	<body>
        <?php 
            // echo $_GET['message'];
            // echo $_GET['url'];
            // echo $_GET['module_name'];
            // echo "id" .$_GET['id'];
        ?>
        <p>&nbsp</p><p>&nbsp</p>
        <p>&nbsp</p><p>&nbsp</p>
        <table align='center'>
            <tr>
                <th colspan="4"><?php echo $_GET['message']?></th>
            </tr>
            <tr>
                <td align=center width="200" height="auto"></td>

                <td align=right>
                    <input type="submit" class="button button1" onclick="location.href='<?php echo $_GET['url']?>'" value="確定">
                    <input type="submit" class="button button2" onclick="location.href='<?php echo $_GET['return_url']?>'" value="取消">
                </td>

                <td align=center>
                    <img src="admin/image/anime04.png" class="image"></a> 
                </td>

                <td align=center width="200"></td>
            </tr>
        </table>
    </body>
</html>



<!-- <script>
        const x = document.getElementById("clickIt");
        x.addEventListener("click", RespondClick); 
        function RespondClick() {
            if(alert('已刪除 確定鍵(返回首頁)')!=true){
                execute($link, $query);
                window.location.href='father_module.php';
            }
            window.event.returnValue=false;
        }

        const y = document.getElementById("clickIt2");
        y.addEventListener("click", RespondClick2); 
        function RespondClick2() {
            window.location.href='father_module.php';
            window.event.returnValue=false;
        }
</script> -->

