<?php
/*添加类别*/
function addcate(){
	$arr=$_POST;
	if(insert("cyan_cate",$arr)){
		$mes=" 添加成功, |  <a href='addcate.php'>继续添加</a>  |   <a href='catelist.php'>查看列表</a>";
		}else{
			$mes=" 添加失败, |  <a href='addcate.php'>重新添加</a>  |   <a href='catelist.php'>查看列表</a>";
			}
		return $mes;
	}
/*类别列表（分页展示）*/
function getallcate(){
	$sql="select id,cname from cyan_cate";
	$rows=fetchall($sql);
	return $rows;
	}
function getallcatebypage($pagesize){
	$sql="select * from cyan_cate";
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
	$sql="select * from cyan_cate limit {$offset},{$pagesize}";
	$rows=fetchall($sql);
	return $rows;
	}
/*编辑类别*/
function editcate($id){
	$arr=$_POST;
	if(update("cyan_cate",$arr,"id={$id}")){
		$mes=" 更新成功,  |   <a href='catelist.php'>查看列表</a>";
		}else{
			$mes=" 更新失败,  |   <a href='catelist.php'>查看列表</a>";
			}
		return $mes;
	}
/*删除类别*/
function delcate($id){
	if(delt("cyan_cate","id={$id}")){
		$mes=" 删除成功,  |   <a href='catelist.php'>查看列表</a>";
		}else{
			$mes=" 删除失败,  |   <a href='catelist.php'>查看列表</a>";
			}
		return $mes;
	}