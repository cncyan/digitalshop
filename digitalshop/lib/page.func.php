<?php
/*require_once '../include.php';
$sql="select * from cyan_admin";
$totalrows=getresultnum($sql);
$pagesize=1;
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
foreach($rows as $row){
	echo "<hr/>";
	echo "管理员编号：".$row['id'],"<br/>";
	echo "管理员名称：".$row['username'],"<hr/>";
	}
	*/
function showpage($page,$totalpage,$where=null,$sep="&nbsp;"){
$where=($where==null)?null:"&".$where;
$url=$_SERVER['PHP_SELF'];
$index=($page==1)?" 首页 ":"<a href='{$url}?page=1{$where}'> 首页 </a>";
$last=($page==$totalpage)?" 尾页 ":"<a href='{$url}?page={$totalpage}{$where}'> 尾页 </a>";
$prev=($page==1)?" 上一页 ":"<a href='{$url}?page=".($page-1)."{$where}'> 上一页 </a>";
$next=($page==$totalpage)?" 下一页 ":"<a href='{$url}?page=".($page+1)."{$where}'> 下一页 </a>";
$str="总共{$totalpage}页/当前是第{$page}页  ";
for($i=1;$i<=$totalpage;$i++){
	if($page==$i){
		$p.=" [{$i}] ";
		}else{
			$p.="<a href='{$url}?page={$i}{$where}'> [{$i}] </a>";
			}
	}
	$pagestr=$str.$sep.$index.$sep.$prev.$sep.$p.$sep.$next.$sep.$last;
	return $pagestr;
}