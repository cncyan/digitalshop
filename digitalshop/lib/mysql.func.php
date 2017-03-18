<?php
/*
数据库的连接
*/
function connect(){
	global $link;
	$link=mysqli_connect(DB_HOST, DB_USER, DB_PWD)or die("数据库连接失败:".mysqli_error($link));
    mysqli_set_charset($link, DB_CHARSET);	
    mysqli_select_db($link, "cyanshop")or die("指定数据库打开失败");
    return $link;	
}
/*数据库的插入*/
function insert($table,$array){
	global $link;
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
    $sql="insert {$table}({$keys}) values({$vals})";
	$result=mysqli_query($link,$sql);
	return mysqli_insert_id($link);	
}
/*数据库更新*/
function update($table,$array,$where=null){
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
	$sql="update {$table} set {$str}".(where==null?null:" where ".$where);
	$result=mysqli_query(connect(),$sql);
	return $result;
}
/*数据库删除*/
function delt($table,$where){
	$where=$where==null?null:"where ".$where;
	$sql="delete from {$table} {$where}";
	$result=mysqli_query(connect(),$sql);
	return $result;
}
/*查询单条数组*/
function fetchone($sql){
	$result=mysqli_query(connect(),$sql);
    $row=mysqli_fetch_assoc($result);
	return $row;
}
/*多条数组查询*/
function fetchall($sql){
	$result=mysqli_query(connect(),$sql);
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}
/*查询到的条数*/
function getresultnum($sql){
	$result=mysqli_query(connect(),$sql);
	$rows=mysqli_num_rows($result);
	return $rows;
}
