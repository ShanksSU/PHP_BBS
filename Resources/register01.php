<?php 
    include_once 'inc/config.inc.php';
    include_once 'inc/mysql.inc.php';
    include_once 'inc/tool.inc.php';
    $link=connect();
    if(is_login($link)){
        skip('index.php','error','你已經登錄，請不要重複註冊！');
    }
    if(isset($_POST['submit'])){
        $link=connect();
        include 'inc/check_register.inc.php';
        $query="insert into ntc_member(name,pw,register_time) values('{$_POST['name']}',md5('{$_POST['pw']}'),now())";
        execute($link,$query);
        if(mysqli_affected_rows($link)==1){
            setcookie('ntc[name]',$_POST['name']);
            setcookie('ntc[pw]',sha1(md5($_POST['pw'])));
            skip('index.php','ok','註冊成功！');
        }else{
            skip('register.php','eror','註冊失敗,請重試！');
        }
    }
    $template['title']='歡迎註冊';
    $template['css']=array('style/public.css','style/register.css');
?>
<?php include 'inc/header.inc.php'?>
        <div id="register" class="auto">
            <h2>歡迎註冊成為 NTC會員</h2>
            <form method="post">
                <label>用戶名：<input type="text" name="name"  /><span>*用戶名不得為空，並且長度不得超過32個字符</span></label>
                <label>密碼：<input type="password" name="pw"  /><span>*密碼不得少於6位</span></label>
                <label>確認密碼：<input type="password" name="confirm_pw"  /><span>*請輸入與上面一致</span></label>
                <label>驗證碼：<input name="vcode" name="vocode" type="text"  /><span>*請輸入下方驗證碼</span></label>
                <img class="vcode" src="show_code.php" />
                <div style="clear:both;"></div>
                <!-- <input class="btn" name="submit" type="submit" value="確定註冊" /> -->
                <input type="submit" name="submit" value="確定註冊" onclick="location.href='$delete_url'" class="btn button edit">
            </form>
        </div>
        
        <div id="footer" class="auto">
            <div class="bottom">
                <a>NTC</a>
            </div>
            <div class="copyright">12313</div>
        </div>
    </body>
</html>