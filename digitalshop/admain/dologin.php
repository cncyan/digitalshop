<?php
require_once '../include.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if($verify==$verify1){
	$sql="select * from `cyan_admin` where `username`='{$username}' and `password`='{$password}'";
    $row=checkadmin($sql);
	if($row){
		$_SESSION['admiName']=$row['username'];
		$_SESSION['Id']=$row['id'];
		alertmsg("登录成功","index.php");
	}else{
		alertmsg("账户或密码错误","login.php");
	}
}else{
		alertmsg("验证码错误","login.php");
}