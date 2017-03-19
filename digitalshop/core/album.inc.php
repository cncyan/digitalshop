<?php
function addablum($arr1){
	insert("cyan_album",$arr1);
	}
/*获取商品图片*/
function getallproimg($id){
	$sql="select * from cyan_album where pid={$id}";
	$imgs=fetchall($sql);
	return $imgs;
	}
function getproimgbypid($id){
	$sql="select * from cyan_album where pid={$id} limit 1";
	$imgs=fetchone($sql);
	return $imgs;
	}