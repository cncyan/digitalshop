<?php
require_once 'include.php';
$cates=getallcate();
if(!($cates&&is_array($cates))){
	echo "<script> alert '无商品分类';</script>";
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="#" class="collection">收藏cyan</a>
			</div>
            <?php if($_SESSION['loginflag']!=1):?>
			<div class="rightArea">
				欢迎来到CyanScikit！<a href="login.php">[登录]</a><a href="registe.php">[免费注册]</a>
			</div>
            <?php endif; if($_SESSION['loginflag']==1):?>
            <div class="rightArea">
				欢迎来到CyanScikit！ <?php echo $_SESSION['username'];?>  <a href="doaction.php?act=out">  [退出登录]</a>
			</div>
            <?php endif;?>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="img/logo.jpg" alt="CyanScikit"></a>
			</div>
			<div class="search_box fl">
				<input type="text" class="search_text fl">
				<input type="button" value="搜 索" class="search_btn fr">
			</div>
			<div class="shopCar fr">
				<span class="shopText fl">购物车</span>
				<span class="shopNum fl">0</span>
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h3>全部商品分类<i class="shopClass_icon"></i></h3>
				<div class="shopClass_show">
                 <dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a></dt>
					</dl>		
                
				<div class="shopClass_list" style="z-index:9999; display:none">
					<div class="shopClass_cont">
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<div class="shopList_links">
							<a href="#">文字测试内容等等<span></span></a><a href="#">文字容等等<span></span></a>
						</div>
					</div>                    
                    </div>
				</div><!--showclass_show-->
                
                <div class="shopClass_show">
                 <dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a></dt>
					</dl>              
				<div class="shopClass_list" style="display:none">
					<div class="shopClass_cont">
						<dl class="shopList_item">
							<dt>电机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<div class="shopList_links">
							<a href="#">文字测试内容等等<span></span></a><a href="#">文字容等等<span></span></a>
						</div>
					</div>                    
                    </div>
				</div><!--showclass_show-->
                
			</div>
			<ul class="nav fl">
				<li><a href="#" class="active">数码城</a></li>
				<li><a href="#">天黑黑</a></li>
				<li><a href="#">团购</a></li>
				<li><a href="#">发现</a></li>
				<li><a href="#">二手特卖</a></li>
				<li><a href="#">名品会</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="banner comWidth clearfix">
	<div class="banner_bar banner_big">
		<div class="imgBox" id="box">
			 <ul class="list">
                    <li class="current"><img src="img/banner/banner_sm_02.jpg"/></li>
                    <li><img src="img/banner/banner_sm_01.jpg"/></li>
                    <li><img src="img/banner/banner_sm_02.jpg"/></li>
                    <li><img src="img/banner/banner_sm_01.jpg"/></li>
                    <li><img src="img/banner/banner_sm_02.jpg"/></li>
                </ul>
                <ul class="count">
                    <li class="current">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                </ul>
		</div>
	</div>
</div>
<?php foreach($cates as $cate):?>
<div class="shopTit comWidth">
	<span class="icon"></span><h3><?php echo $cate['cname']?></h3>
	<a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
			<ul class="imgBox">
				<li><a href="#"><img src="img/banner/banner_sm_01.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="img/banner/banner_sm_02.jpg" alt="banner"></a></li>
			</ul>
			<div class="imgNum">
				<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
			</div>
		</div>
	</div>
	<div class="rightArea">
		<div class="shopList_top clearfix">
           <?php
               $pros=getprobycid($cate['id']);
			   if(($pros&&is_array($pros))):
			   foreach($pros as $pro):
			   $proimg=getproimgbypid($pro['id']);
		   ?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="prodetail.php?id=<?php echo $pro['id'];?>" target="_blank">
                    <img width="187" height="200"  src="img_220/<?php echo $proimg['albumpath'];?>" alt=""></a>
				</div>
				<h3><?php echo $pro['pname'];?></h3>
				<p><?php echo $pro['cprice'];?></p>
			</div>
		   <?php 
		   endforeach;
		   endif;?>
		</div>
		<div class="shopList_sm clearfix">
            <?php
               $prosms=getprobysmcid($cate['id']);
			   if(($prosms&&is_array($prosms))):
			   foreach($prosms as $prosm):
			   $prosmimg=getproimgbypid($prosm['id']);
		   ?>
			<div class="shopItem_sm">
				<div class="shopItem_smImg">
					<a href="prodetail.php?id=<?php echo $prosm['id'];?>" target="_blank">
                    <img src="img_220/<?php echo $prosmimg['albumpath'];?>" alt=""></a>
				</div>
				<div class="shopItem_text">
					<p><?php echo $prosm['pname'];?></p>
					<h3>￥<?php echo $prosm['cprice'];?></h3>
				</div>
			</div>
           <?php 
		   endforeach;
		   endif;?>
		</div>
	</div>
</div>
<?php endforeach;?>
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">CyanScikit简介</a><i>|</i><a href="#">CyanScikit公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 cyanscikit版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B234-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="img/webLogo.jpg" alt="logo"></a><a href="#"><img src="img/webLogo.jpg" alt="logo"></a><a href="#"><img src="img/webLogo.jpg" alt="logo"></a><a href="#"><img src="img/webLogo.jpg" alt="logo"></a></p>
</div>
<script type="text/javascript" src="admain/js/jquery-1.6.4.js"></script>
<script src="js/slider.js"></script>
<script type="text/javascript">
 $(function(){
	 $("div.shopClass_show").hover(function(){
		 $(this).find(".shopClass_list").stop().animate({left:"190",opacity:1},"fast").css({"display":"block","z-index":"9999"});
		 $(this).find(">dl.shopClass_item dt a").addClass("aLink");
		 },function(){
			 $(this).find(".shopClass_list").stop().animate({opacity:0},"fast").css("z-index","-1");
		     $(this).find(">dl.shopClass_item dt a").removeClass("aLink");
			 })
	 });
</script>
</body>
</html>
