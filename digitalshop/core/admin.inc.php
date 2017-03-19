<?php
error_reporting(E_ALL || ~E_NOTICE);
function checkadmin($sql){
	return fetchone($sql);//数据库查询
}
/*检查管理员登录*/
function checklogin(){
if($_SESSION['adminid']==null&&$_COOKIE['adminid']==null){
		alertmsg("请先登录","login.php");
	}
}
/*管理员退出*/
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE["adminid"])){
		setcookie("adminname","",time()-1);
	}
	if(isset($_COOKIE[session_name()])){
		setcookie("adminname","",time()-1);
	}
	session_destroy();
	header('location:login.php');
}
/*管理员添加*/
function addadmin(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(insert("cyan_admin",$arr)){
		$mes="添加成功， |  <a href='addmin.php'>继续添加</a>  |  <a href='adminlist.php'>查看管理员列表</a>  |";
		}else{
			$mes="添加失败， |  <a href='addadmin.php'> 点击重新添加</a>  |";
			}
	return $mes;
	}
/*管理员列表*/
function getalladmin(){
	$sql="select id,password,username,email from cyan_admin";
	$row=fetchall($sql);
	return $row;
	}
function getalladminbypage($pagesize){        //加分页显示
	$sql="select * from cyan_admin";
	global $totalrows;
	$totalrows=getresultnum($sql);
	global $totalpage,$page;
	$totalpage=ceil($totalrows/$pagesize);
	$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
		}
	if($page>$totalpage){
		$page=$totalpage;
		}
	$offset=($page-1)*$pagesize;
	$sql="select * from cyan_admin limit {$offset},{$pagesize}";
	$rows=fetchall($sql);
	return $rows;
	}
/*编辑管理员*/
function editadmin($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("cyan_admin",$arr,"id={$id}")){
		
		$mes="更新成功，  |  <a href='adminlist.php'>查看管理员列表</a>  |";
		}else{
			$mes="更新失败，  |  <a href='adminlist.php'>重新编辑</a>  |";
			}
	return $mes;
	}
/*删除管理员*/
function deladmin($id){
	$arr=$_POST;
	if(delt("cyan_admin","id={$id}")){
		
		$mes="删除成功，  |  <a href='adminlist.php'>查看管理员列表</a>  |";
		}else{
			$mes="删除失败 ，|   <a href='adminlist.php'>重新删除管理员</a>  |";
			}
	return $mes;
	}
	
	
	
	
/*添加用户*/
function adduser(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regtime']=time();
	$uploadfile=douploade("../upload");
	if($uploadfile&&is_array($uploadfile)){
		$arr['face']=$uploadfile[0]['name'];
		}else{
			return "未上传头像";
			}
	if(insert("cyan_user",$arr)){
		$mes="添加成功 |  <a href='adduser.php'> 点击继续添加</a>  |  <a href='userlist.php'>查看列表</a>";
		}else{
			$facefile="../upload/".$uploadfile[0]['name'];
			if(file_exists($facefile)){
				unlink($facefile);
				}
			$mes="添加失败， |  <a href='adduser.php'> 点击重新添加</a>  |  <a href='userlist.php'>返回列表</a>";
			}
	return $mes;
	}
/*用户列表*/
function getalluserbypage($pagesize){        //加分页显示
	$sql="select * from cyan_user";
	global $totalrows;
	$totalrows=getresultnum($sql);
	global $totalpage,$page;
	$totalpage=ceil($totalrows/$pagesize);
	$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
		}
	if($page>$totalpage){
		$page=$totalpage;
		}
	$offset=($page-1)*$pagesize;
	$sql="select * from cyan_user limit {$offset},{$pagesize}";
	$rows=fetchall($sql);
	return $rows;
	}
/*编辑用户*/
function edituser($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("cyan_user",$arr,"id={$id}")){
		
		$mes="更新成功，  |  <a href='userlist.php'>查看管理员列表</a>  |";
		}else{
			$mes="更新失败，  |  <a href='userlist.php'>重新编辑</a>  |";
			}
	return $mes;
	}
/*删除用户*/
function deluser($id){
	$sql="select face from cyan_user where id={$id}";
	$row=fetchone($sql);
	$res=$row['face'];
	if(file_exists("../upload/".$res)){
		unlink("../upload/".$res);
		}
	if(delt("cyan_user","id={$id}")){
		
		$mes="删除成功，  |  <a href='userlist.php'>查看管理员列表</a>  |";
		}else{
			$mes="删除失败 ，|   <a href='userlist.php'>重新删除管理员</a>  |";
			}
	return $mes;
	}