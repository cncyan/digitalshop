<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册</title>
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
<div class="headerBar">
	<div class="logoBar red_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="img/logo.jpg" alt="慕课网"></a>
			</div>
			<h3 class="welcome_title">欢迎注册</h3>
		</div>
	</div>
</div>

<div class="regBox">
	<div class="login_cont">
      <form method="post" action="doaction.php?act=reg" enctype="multipart/form-data">
		<ul class="login">
			<li><span class="reg_item"><i>*</i>账户名：</span><div class="input_item">
            <input type="text" name="username" placeholder="请输入用户名" class="login_input user_icon"></div></li>
			<li><span class="reg_item"><i>*</i>密码：</span><div class="input_item">
            <input type="password" name="password" class="login_input user_icon"></div></li>
			<li><span class="reg_item"><i>*</i>邮箱：</span><div class="input_item">
            <input type="email" class="login_input user_icon"></div></li>
			<li><span class="reg_item"><i>*</i>性别：</span><div class="input_item">
            <input type="radio" name="sex" value="0" checked="checked" >boy
            <input type="radio" name="sex" value="1" >girl
            <input type="radio" name="sex" value="2" >serect
            </div></li>
            <li><span class="reg_item"><i>*</i>邮箱：</span><div class="input_item">
            <input type="file" name="myface"></div></li>
			<li><span class="reg_item">&nbsp;</span><input type="submit" value="" class="login_btn"></li>
		</ul>
        </form>		
	</div>
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">慕课简介</a><i>|</i><a href="#">慕课公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 慕课版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="img/webLogo.jpg" alt="logo"></a><a href="#"><img src="img/webLogo.jpg" alt="logo"></a><a href="#"><img src="img/webLogo.jpg" alt="logo"></a><a href="#"><img src="img/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>
