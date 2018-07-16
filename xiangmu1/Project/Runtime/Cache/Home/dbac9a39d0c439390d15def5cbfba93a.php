<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>验证码</title>
 </head>
 <body>
 	<div>
 	<form action="/thinkphp 03/xiangmu1/index.php/Home/Index/result"  method="get">
 	<input type="text" name="code" value=""> <br><br>
		<img src="/thinkphp 03/xiangmu1/index.php/Home/Index/code" id="img" onclick="this.src='/thinkphp 03/xiangmu1/index.php/Home/Index/code'+Math.random()  >
		<a href="##" onclick="img.src='/thinkphp 03/xiangmu1/index.php/Home/Index/code'+Math.random()">刷新</a><br><br>
		<input type="submit" value="注册">
 	</form>
 	</div>
 </body>
 </html>