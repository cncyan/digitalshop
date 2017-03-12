<?php
/*
数据库的连接
*/
function connect(){
	$link=mysqli_connect(DB_HOST, DB_USER, DB_PWD)or die("数据库连接失败".mysqli_error($link).":".mysqli_error($link));
    mysqli_set_charset($link, DB_CHARSET);
    mysqli_select_db($link, "cyanshop")or die("指定数据库打开失败");
    return $link;	
}
/*数据库的插入*/
function insert($table,$arrsy){
	$keys=join(",",array_keys($array));
	$vals="'".join(",",array_values($array))."'";
    $sql="insert {$table}({$keys}) values({$vals})";
	mysql_query($sql);
	return mysql_insert_id();	
}
/*数据库更新*/
function update($table,$array,$where=null){
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str=$sep.$key."='".$val."'";
	}
	$sql="update {$table} set {$str}".(where==null?null:"where".$where);
	mysql_query($sql);
	mysql_affected_rows();
}
/*数据库删除*/
function delt($table,$where){
	$where=$where==null?null:"where".$where;
	$sql="delete from {$table} {$where}";
	mysql_query($sql);
	mysql_affected_rows();
}
/*查询单条数组*/
function fetchone($sql){
	$result=mysqli_query(connect(),$sql);
    $row=mysqli_fetch_assoc($result);	
	return $row;
}
/*多条数组查询*/
function fetchall($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	while(@$row=mysql_fetch_array($result,$result_type)){
		$row[]=$row;
	}
	return $row;
}
/*查询到的条数*/
function getresultnum($sql){
	$result=mysql_query($sql);
	return mysql_num_rows($result);
}