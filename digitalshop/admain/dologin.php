<?php
require_once '../include.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoflog=$_POST['autoFlag'];
if($verify==$verify1){
	$sql="select * from `cyan_admin` where `username`='{$username}' and `password`='{$password}'";
    $row=checkadmin($sql);
	if($row){
		if($autoflog){
			setcookie("adminid",$row['id'],time()+3600*2);
			setcookie("adminname",$row['username'],time()+3600*2);
		}
		$_SESSION['adminname']=$row['username'];
		$_SESSION['adminid']=$row['id'];
		alertmsg("登录成功","index.php");
	}else{
		alertmsg("账户或密码错误","login.php");
	}
}else{
		alertmsg("验证码错误","login.php");
}