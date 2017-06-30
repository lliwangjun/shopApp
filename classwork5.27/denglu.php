<?php
header("Content-Type:text/html;charset=utf-8");
?>
		<form action='caozuo.php' method='post'>
			<label>
				用户名：
				<input type="text" name="user" id="zhanghao" value="" />
			</label>
			<br><br>
			<label>
				密码：
				<input type="password" name="password" id="mima" value="" />
			</label>
			<br>
			<br>
			
			<input type="submit" value="登录">
			<input type="button" id="btn"value="注册">
		</form>
		<script type="text/javascript">
    		var btn=document.getElementById('denglu');
    		var btn1=document.getElementById('zhuce');
    		btn1.onclick=function(){
    			location="zhuce.php";
    		}
		</script>