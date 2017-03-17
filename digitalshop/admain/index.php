<?php
require_once '../include.php';
checklogin();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="css/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">慕课电子商务后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href="#">慕课</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>
        <div class="link fr">
            <b>欢迎您，
			<?php
			if(isset($_SESSION["adminname"])){
			   echo $_SESSION["adminname"];
			}elseif(isset($_COOKIE["adminname"])){
				echo $_COOKIE["adminname"];
			}			
			?>
			</b>&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doadminaction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span>-</span>类别管理</h3>
                        <dl>
                            <dd><a href="addcate.php" target="myframe">添加类别</a></dd>
                            <dd><a href="catelist.php" target="myframe">类别列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>+</span>商品管理</h3>
                        <dl>
                            <dd><a href="addpro.php" target="myframe">添加商品</a></dd>
                            <dd><a href="prolist.php" target="myframe">商品列表</a></dd>
                            <dd><a href="#">订单总是修改</a></dd>
                            <dd><a href="#">测试内容你看着改</a></dd>
                        </dl>
                    </li>
					 <li>
                        <h3><span>-</span>管理员管理</h3>
                        <dl>
                            <dd><a href="addadmin.php" target="myframe">添加管理员</a></dd>
                            <dd><a href="adminlist.php" target="myframe">管理员列表</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
		<div class="main">           
         <iframe name="myframe" src="main.php" width="100%" id="myframe" scrolling=no height="500" class="mian_con"></frame>
        </div>

    </div>
</body>
</html>