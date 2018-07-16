<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>验证码</title>
 	<script src="/thinkphp 03/xiangmu1/Public/jquery-1.8.3.min.js"></script>
 	<style>
 		*{text-decoration:none;}
		#img{width:130px;height:35px;border:1px solid black;}
			
		span{color:red;margin:5px; position:relative;top:-5px;}
		
		input[type="submit"]{width:70px;height:40px;background:blue;
			border-radius:10px 10px 10px 10px;}
		.yzm{width:400px;height:300px;border:5px solid pink;}
		
 	</style>
 </head>
 <body>
 	<center>
 	<h2>用户注册</h2>
 	<div class="yzm">
 	<form action="/thinkphp 03/xiangmu1/index.php/Home/Ajax/add"  method="get">
		 	用&nbsp;户&nbsp;名:	<input type="text" class="na" name="name" value=""><br><br>
		 	
		 	密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:<input type="password" value="" name="pwd1"><br><br>

		 	确认密码:<input type="password" value="" name="pwd2"><br><br>

		验&nbsp;证&nbsp;码:<input type="text" name="code" value=""><br><br>
		<img src="/thinkphp 03/xiangmu1/index.php/Home/Ajax/code" id="img" onclick="this.src='/thinkphp 03/xiangmu1/index.php/Home/Ajax/code/'+Math.random()">

		<a href="##" onclick="img.src='/thinkphp 03/xiangmu1/index.php/Home/Ajax/code/'+Math.random()"><span >刷新</span></a><br><br>
		<input type="submit" value="注册">
 	</form>
 	</div>
 	</center>

 	<script>
 		// alert($);// 是jquery 中的对象 function(e,t){return new v.fn.init(e,t,n)

 		// $("input[name='code']").bind('input',function()
 		// {
 		// 	// console.log($(this).val());//bind每次输入每次写入
 		// 	//获取code的值
 		// 	var code=$(this).val();
 			
 		// 	$.get("/thinkphp 03/xiangmu1/index.php/Home/Ajax/ajaxcode",{code:code},function(data)
 		// 	{
 		// 		console.log(data);
 		// 		// var span = "<span>对</span>";
 		// 	})
 		// })
 		//设置两个变量 用于控制form 表单提交
 		var c =false;
 		var n =false;
 		$("input[name='code']").blur(function(){
 			var code=$(this).val();
 			$.get("/thinkphp 03/xiangmu1/index.php/Home/Ajax/ajaxcode",{code:code},function(data)
 			{
 				
 				if(data){
 					c=true;//验证码正确时 执行下面代码
 					var span ="<span style='color:green position:relative;top:4px;'>对</span>";
 					$("input[name='name']").nextAll("span").empty();
 					$("input[name='code']").after(span);
 					// console.log ("true");
 				}else{
 					c=false;
 					// console.log ( "false");
 					var span ="<span style='color:red position:relative;top:4px;'>错误</span>";
 					$("input[name='name']").nextAll("span").empty();
 					$("input[name='code']").after(span);
 				}
 			})
 		})
 		//设置用户名的检测方法
 		$("input[name='name']").blur(function()
 		{
 			var name = $(this).val();
 			$.get("/thinkphp 03/xiangmu1/index.php/Home/Ajax/ajaxuser",{name:name},function(data){
 				if(data.error)
 				{
 					n = true;
 				}
 				var span ="<span>"+data.info+"</span>";
 				$("input[name='name']").nextAll("span").empty();
 				$("input[name='name']").after(span);
 			})
 		})
 		//设置密码的检测方法
 		// $("input[name='pwd1']").blur(function(){

 		// })
 		//阻止表单提交事件
 		$("form").submit(function(){
 			if(c & n)//如果用户名和验证码都为真时
 			{
 				return true;
 			}else{
 				return false;
 			}
 		})
 	</script>
 </body>
 </html>