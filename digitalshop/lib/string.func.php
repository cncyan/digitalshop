<?php
function buildrandomstring($type=1,$length=4){
if($type==1){
	$chars=join("",range(0,9));	
	}elseif($type==2){
		$chars=join("",array_merge(range("a","z"),range("A","Z")));
		}elseif($type==3){
			$chars=join("",array_merge(range("a","z"),range("A","Z"),range(0,9)));
			}
if($length>strlen($chars)){
	exit("字符段不够长");
	}
$chars=str_shuffle($chars);
return substr($chars,0,$length);
}

//获得唯一字符串
function getunidstr(){
	return md5(uniqid(microtime(true),true));
	}
//获取扩展名
function getext($filename){
	$tep_name=explode(".",$filename);
	return strtolower(end($tep_name));
	}