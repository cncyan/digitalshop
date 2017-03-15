<?php
require_once '../lib/string.func.php';
header("content-type=text/htme;charset=utf-8");
//print_r($_FILES);
$filename=$_FILES['file']['name'];
$filetype=$_FILES['file']['type'];
$filetmpname=$_FILES['file']['tmp_name'];
$fileerror=$_FILES['file']['error'];
$filesize=$_FILES['file']['size'];
$allowtype=array("jpg","png","gif","txt");
$maxsize=512000;
$imgflag=true;

//判断错误(此处在PHP配置文件php.ini文件File Uploads处修改)
if($fileerror==0){
	if($imgflag){                     //判断是否为真正图片类型,传图片可用
		@$info=getimagesize($filetmpname);
		if(!$info){
			exit("不是真正图片");
			}
		}
	
	$ext=getext($filename);
	if(!in_array($ext,$allowtype)){
		exit("文件格式错误");
		}
	if($filesize>$maxsize){
		exit("文件过大");
		}
	$filename=getunidstr().".".$ext;
	//判断是不是通过http post上传的
	if(is_uploaded_file($filetmpname)){
		$path="upload";                                          //如果文件夹不存在先创建文件夹
		if(!file_exists($path)){
			mkdir($path,0777,true);
			}
		$destination=$path.'/'.$filename;
		 if(move_uploaded_file($filetmpname,$destination)){
			 $mes="文件上传成功";			 
			 }else{
				 $mes="文件移动失败";
				 }
		}else{
			$mes="文件非HTTP POST方式上传";
			}
	}else{
		switch($fileerror){
			case(1):$mes="文件超出配置要求大小";break;  //UPLOAD_ERR_INI_SIZE
			case(2):$mes="文件超出表单要求大小";break;  //UPLOAD_ERR_FORM_SIZE
			case(3):$mes="文件超出部分被上传";break;    //UPLOAD_ERR_PARTICAL
			case(4):$mes="没有文件被上传";break;  //UPLOAD_ERR_NO_SIZE
			case(6):$mes="没有找到临时文件夹";break;  //UPLOAD_ERR_NO_TMP_DIR
			case(7):$mes="文件不可写";break;    //UPLOAD_ERR_CANT_WRITE
			case(8):$mes="由于php的扩展程序中断上传";break;    //UPLOAD_ERR_EXTENTION
			}
		}
	echo $mes;