<?php
    // header('Content-type:text/html; charset=utf-8');
    // $link=@mysqli_connect('localhost', 'root', '123456', 'ntc_php', 3306);
    // var_dump(mysqli_connect_errno());

    // if(mysqli_connect_errno()){
    //     exit(mysqli_connect_error());
    // }

    // var_dump(mysqli_set_charset($link, 'utf8'));

    // var_dump(mysqli_select_db($link, 'ntc_php'));
    $a1=0;
    $an=40;
    $d=5;
    $i=$a1;

    while($i<=$an){
        //echo "$i ";
        $i+=$d;
    }

    echo $_COOKIE["userinfo"];
?>
<html>
    <body bgcolor=#0080B0>
        <table align='center'>
            <tr>
                <td align=center>
                        <input type="submit" name="OK" class="button button1" id="clickIt" value="確定">
                        <input type="submit" name="NO" class="button button2" value="取消">
                </td>

                <td align=center width="500" height="500">
                    <img src="pn.png" class="image"></a> 
                </td>
            </tr>
        </table>
        div class="main"> 
		
		<div class="login-form"> 
			<h2>SignIn Form</h2> 
			<div class="agileits-top">
				<form action="#" method="post">
					<div class="styled-input">
						<input type="text" name="User Name" required=""/>
						<label>User Name</label>
						<span></span>
					</div>
					<div class="styled-input">
						<input type="password" name="Password" required=""> 
						<label>Password</label>
						<span></span>
					</div> 
					<div class="wthree-text"> 
						<ul> 
							<li>
								<input type="checkbox" id="brand" value="">
								<label for="brand"><span></span> Remember me ?</label>  
							</li>
							<li> <a href="#">Forgot password?</a> </li>
						</ul>
						<div class="clear"> </div>
					</div>  
				</form>
			</div>
			<div class="agileits-bottom">
				<form action="#" method="post">
					<input type="submit" value="Sign In">
				</form>
			</div>	
		</div>	
	</div>	
        <!-- <button id="clickIt">Click here</button>  -->
        <script>
            const x = document.getElementById("clickIt");
            x.addEventListener("click", RespondClick); 
            function RespondClick() { 
                alert("Click Event123"); 
            } 
        </script> 
    </body>
</html>


<style>
    table, td {
        border:1px solid rgb(255, 0, 200);
        background-color:rgb(255, 107, 132);
        vertical-align:middle;
    }
    .image {
    width: auto;
    height: auto;
    max-width: 80%;
    max-height: 80%;
    
    }    

    .button {
        border: none;
        color: rgb(47, 0, 255);
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 24px;
        font-family: "標楷體";
        margin: 4px 2px;
        cursor: pointer;
        transition-duration: 0.4s;
    }

    .button1 {
        background-color: #4abdff; 
        color: black; 
        border: 2px solid #4abdff;
    }

    .button1:hover {
        background-color: white;
        color: block;
    }

    .button2 {
        background-color: #9e9e9e; 
        color: black; 
        border: 2px solid #9e9e9e;
    }

    .button2:hover {
        background-color: white;
        color: block;
    }
</style>