<?php
function checkadmin($sql){
	return fetchone($sql);//数据库查询
}
function checklogin(){
	if($_SESSION['Id']==""){
		alertmsg("请先登录","login.php");
	}
}